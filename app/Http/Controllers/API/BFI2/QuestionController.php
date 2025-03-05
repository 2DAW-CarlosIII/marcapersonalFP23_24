<?php

namespace App\Http\Controllers\API\BFI2;

use App\Http\Controllers\Controller;
use App\Http\Resources\BFI2\QuestionResource;
use App\Models\BFI2\Question;
use Illuminate\Http\Request;
use App\Helpers\FilterHelper;

class QuestionController extends Controller
{
    public $modelclass = Question::class;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth:sanctum')->except(['index', 'show']);
         $this->authorizeResource(Question::class, 'question');
     }

    public function index(Request $request)
    {
        $campos = ['name_es', 'name_en', 'description_es', 'description_en', 'formula'];
        $otrosFiltros = ['domain_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return QuestionResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $question = json_decode($request->getContent(), true);

        $question = Question::create($question);

        return new QuestionResource($question);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $questionData = json_decode($request->getContent(), true);
        $question->update($questionData);

        return new QuestionResource($question);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
    }
}
