<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class WordController extends Controller
{
    protected WordRepository $wordRepository;

    /**
     * Constructor method.
     *
     * @param WordRepository $wordRepository
     * @return void
     */
    public function __constructor(WordRepository $wordRepository): void
    {
        $this->wordRepository = $wordRepository;
    }

    /**
     * Return the list of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->wordRepository->getAll();
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
            'content' => 'required|max:25',
            'order' => 'required',
            'timing' => 'required',
        ]);
        return $this->wordRepository->store($request->all());
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->wordRepository->find($id);
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
            'sentence_id' => 'required',
            'content' => 'required|max:25',
            'order' => 'required',
            'timing' => 'required',
        ]);
        return $this->wordRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->wordRepository->delete($id);
    }
}
