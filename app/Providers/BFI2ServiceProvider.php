<?php

namespace App\Providers;

use App\Models\BFI2\Assessment;
use App\Models\BFI2\Domain;
use App\Models\BFI2\Facet;
use App\Models\BFI2\Question;
use App\Models\BFI2\Response;
use App\Models\BFI2\Result;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BFI2ServiceProvider
{
    /**
     * Calculate results for a completed assessment
     *
     * @param int $assessmentId
     * @return array
     */
    public function calculateResults(int $assessmentId): array
    {
        try {
            // Obtener la evaluación
            $assessment = Assessment::findOrFail($assessmentId);

            // Verificar que la evaluación esté completa
            if ($assessment->status !== 'completed') {
                return [
                    'success' => false,
                    'message' => 'Assessment is not completed'
                ];
            }

            // Obtener todas las respuestas del usuario para esta evaluación
            $responses = Response::where('assessment_id', $assessmentId)->get();

            // Verificar que haya todas las respuestas necesarias (60 preguntas)
            if ($responses->count() < 60) {
                return [
                    'success' => false,
                    'message' => 'Assessment does not have all required responses'
                ];
            }

            // Calcular resultados por dominio
            $domains = Domain::all();
            $domainResults = [];

            foreach ($domains as $domain) {
                $formula = json_decode($domain->formula, true);
                $score = $this->calculateScoreFromFormula($formula, $responses);

                // Crear o actualizar el resultado para este dominio
                $result = Result::updateOrCreate(
                    [
                        'assessment_id' => $assessmentId,
                        'user_id' => $assessment->user_id,
                        'type' => 'domain',
                        'trait_id' => $domain->id
                    ],
                    [
                        'score' => $score,
                        // El percentil podría calcularse si se tienen datos normativos
                        'percentile' => null
                    ]
                );

                $domainResults[] = $result;
            }

            // Calcular resultados por faceta
            $facets = Facet::all();
            $facetResults = [];

            foreach ($facets as $facet) {
                $formula = json_decode($facet->formula, true);
                $score = $this->calculateScoreFromFormula($formula, $responses);

                // Crear o actualizar el resultado para esta faceta
                $result = Result::updateOrCreate(
                    [
                        'assessment_id' => $assessmentId,
                        'user_id' => $assessment->user_id,
                        'type' => 'facet',
                        'trait_id' => $facet->id
                    ],
                    [
                        'score' => $score,
                        // El percentil podría calcularse si se tienen datos normativos
                        'percentile' => null
                    ]
                );

                $facetResults[] = $result;
            }

            return [
                'success' => true,
                'domain_results' => $domainResults,
                'facet_results' => $facetResults
            ];

        } catch (\Exception $e) {
            Log::error('Error calculating BFI-2 results: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => 'Error calculating results: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Calculate score based on formula and responses
     *
     * @param array $formula
     * @param \Illuminate\Support\Collection $responses
     * @return float
     */
    private function calculateScoreFromFormula(array $formula, $responses): float
    {
        $items = $formula['items'] ?? [];
        $totalScore = 0;
        $count = 0;

        foreach ($items as $item) {
            $questionId = $item['question_id'];
            $weight = $item['weight'];

            // Buscar la respuesta para esta pregunta
            $response = $responses->firstWhere('question_id', $questionId);

            if ($response) {
                // Aplicar el peso (positivo o negativo) a la respuesta
                // Para los pesos negativos, se invierte la escala (6 - valor)
                $value = $response->value;

                if ($weight < 0) {
                    $value = 6 - $value; // Invertir escala de 5 puntos (1->5, 2->4, 3->3, 4->2, 5->1)
                }

                $totalScore += $value;
                $count++;
            }
        }

        // Calcular el promedio si hay respuestas
        return $count > 0 ? $totalScore / $count : 0;
    }
}
