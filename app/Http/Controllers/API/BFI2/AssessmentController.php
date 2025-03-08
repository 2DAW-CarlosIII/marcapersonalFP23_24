<?php

namespace App\Http\Controllers\Api\BFI2;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Models\BFI2\Assessment;
use App\Models\BFI2\Domain;
use App\Models\BFI2\Facet;
use App\Models\BFI2\Question;
use App\Models\BFI2\Response;
use App\Models\BFI2\Result;
use App\Providers\BFI2ServiceProvider as BFI2Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    protected $bfi2Service;

    public $modelclass = Assessment::class;

    public function __construct(BFI2Service $bfi2Service)
    {
        $this->bfi2Service = $bfi2Service;
    }

    /**
     * Get list of all assessments for the current user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $campos = ['status', 'language'];
        $otrosFiltros = ['user_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $query->where('user_id', Auth::id());
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return JsonResource::collection($queryOrdered->paginate($request->perPage));

/*         $assessments = Assessment::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($assessments); */
    }

    /**
     * Get an assessments by id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($assessmentId) : JsonResource
    {
        $assessment = Assessment::where('id', $assessmentId)
            ->where('user_id', Auth::id())
            ->first();

        abort_if(!$assessment, 404, 'Assessment not found or unauthorized');

        return new JsonResource($assessment);
    }

    /**
     * Create a new assessment
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAssessment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language' => 'required|string|in:en,es'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $assessment = new Assessment();
        $assessment->user_id = Auth::id();
        $assessment->status = 'in_progress';
        $assessment->language = $request->input('language');
        $assessment->save();

        return new JsonResource($assessment);

/*         return response()->json([
            'success' => true,
            'assessment' => $assessment
        ]); */
    }

    /**
     * Submit responses for an assessment
     *
     * @param Request $request
     * @param int $assessmentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitResponses(Request $request, $assessmentId)
    {
        $validator = Validator::make($request->all(), [
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.value' => 'required|integer|between:1,5'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Verificar que la evaluación existe y pertenece al usuario
        $assessment = Assessment::where('id', $assessmentId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found or unauthorized'
            ], 404);
        }

        // Verificar que la evaluación está en progreso
        if ($assessment->status !== 'in_progress') {
            return response()->json([
                'success' => false,
                'message' => 'Assessment is not in progress'
            ], 400);
        }

        // Procesar y guardar cada respuesta
        $responses = [];
        foreach ($request->input('responses') as $responseData) {
            $response = Response::updateOrCreate(
                [
                    'assessment_id' => $assessmentId,
                    'question_id' => $responseData['question_id'],
                    'user_id' => Auth::id()
                ],
                [
                    'value' => $responseData['value']
                ]
            );

            $responses[] = $response;
        }

        // Verificar si todas las preguntas han sido respondidas
        $totalResponses = Response::where('assessment_id', $assessmentId)->count();
        $totalQuestions = Question::count();

        if ($totalResponses >= $totalQuestions) {
            // Marcar la evaluación como completada
            $assessment->status = 'completed';
            $assessment->completed_at = now();
            $assessment->save();

            // Calcular resultados
            $calculationResult = $this->bfi2Service->calculateResults($assessmentId);

            if (!$calculationResult['success']) {
                return response()->json([
                    'success' => false,
                    'message' => $calculationResult['message']
                ], 500);
            }
        }

        return response()->json([
            'success' => true,
            'assessment' => $assessment,
            'total_responses' => $totalResponses,
            'total_questions' => $totalQuestions,
            'completed' => $totalResponses >= $totalQuestions
        ]);
    }

    /**
     * Get results for a specific assessment
     *
     * @param int $assessmentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getResults(Request $request, $assessmentId)
    {
        // Verificar que la evaluación existe y pertenece al usuario
        $assessment = Assessment::where('id', $assessmentId)
            ->where('user_id', Auth::id())
            ->first();

        abort_if (!$assessment, 404, 'Assessment not found or unauthorized');

        // Verificar que la evaluación está completada
        abort_if ($assessment->status !== 'completed', 400, 'Assessment is not completed');

        // Obtener resultados
        $domainResults = Result::where('assessment_id', $assessmentId)
            ->where('type', 'domain')
            ->get();

        $facetResults = Result::where('assessment_id', $assessmentId)
            ->where('type', 'facet')
            ->get();

        // Obtener información de dominios y facetas
        $domains = Domain::all()->keyBy('id');
        $facets = Facet::all()->keyBy('id');

        // Preparar resultados con nombres y descripciones
        $formattedDomainResults = $domainResults->map(function ($result) use ($domains, $assessment) {
            $domain = $domains[$result->trait_id] ?? null;

            return [
                'id' => $result->id,
                'trait_id' => $result->trait_id,
                'score' => $result->score,
                'percentile' => $result->percentile,
                'name' => $domain ? ($assessment->language === 'en' ? $domain->name_en : $domain->name_es) : null,
                'description' => $domain ? ($assessment->language === 'en' ? $domain->description_en : $domain->description_es) : null
            ];
        });

        $formattedFacetResults = $facetResults->map(function ($result) use ($facets, $domains, $assessment) {
            $facet = $facets[$result->trait_id] ?? null;
            $domain = $facet ? ($domains[$facet->domain_id] ?? null) : null;

            return [
                'id' => $result->id,
                'trait_id' => $result->trait_id,
                'score' => $result->score,
                'percentile' => $result->percentile,
                'name' => $facet ? ($assessment->language === 'en' ? $facet->name_en : $facet->name_es) : null,
                'description' => $facet ? ($assessment->language === 'en' ? $facet->description_en : $facet->description_es) : null,
                'domain_id' => $facet ? $facet->domain_id : null,
                'domain_name' => $domain ? ($assessment->language === 'en' ? $domain->name_en : $domain->name_es) : null
            ];
        });

        return response()->json([
            'success' => true,
            'assessment' => $assessment,
            'domain_results' => $formattedDomainResults,
            'facet_results' => $formattedFacetResults
        ]);
    }

    /**
     * Mark an assessment as abandoned
     *
     * @param int $assessmentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function abandonAssessment($assessmentId)
    {
        // Verificar que la evaluación existe y pertenece al usuario
        $assessment = Assessment::where('id', $assessmentId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found or unauthorized'
            ], 404);
        }

        // Verificar que la evaluación está en progreso
        if ($assessment->status !== 'in_progress') {
            return response()->json([
                'success' => false,
                'message' => 'Assessment is not in progress'
            ], 400);
        }

        // Marcar como abandonada
        $assessment->status = 'abandoned';
        $assessment->save();

        return response()->json([
            'success' => true,
            'assessment' => $assessment
        ]);
    }
}
