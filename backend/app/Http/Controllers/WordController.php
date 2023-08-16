<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'sentence_id' => 'required',
            'content' => 'required|max:25',
            'order' => 'required',
            'start' => 'required',
            'end' => 'required',
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
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'sentence_id' => 'required',
            'content' => 'required|max:25',
            'order' => 'required',
            'start' => 'required',
            'end' => 'required',
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
