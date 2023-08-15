<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\SentenceRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class SentenceController extends Controller
{
    protected SentenceRepository $sentenceRepository;

    /**
     * Constructor method.
     *
     * @param SentenceRepository $sentenceRepository
     */
    public function __construct(SentenceRepository $sentenceRepository)
    {
        $this->sentenceRepository = $sentenceRepository;
    }


    /**
     * Return the list of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->sentenceRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'sentence_id' => 'required',
            'positionX' => 'required',
            'positionY' => 'required',
            'content' => 'required|max:255'
        ]);
        return $this->sentenceRepository->store($request->all());
    }


    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->sentenceRepository->find($id);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'page_id' => 'required',
            'positionX' => 'required',
            'positionY' => 'required',
            'content' => 'required|max:255',
        ]);
        return $this->sentenceRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->sentenceRepository->delete($id);
}
}
