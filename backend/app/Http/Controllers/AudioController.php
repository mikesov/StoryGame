<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Repositories\AudioRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class AudioController extends Controller
{
    protected AudioRepository $audioRepository;

    /**
     * Constructor method.
     *
     * @param AudioRepository $audioRepository
     */
    public function __construct(AudioRepository $audioRepository) {
        $this->audioRepository = $audioRepository;
    }

    /**
     * Return the list of resource in storage.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->audioRepository->getAll();
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'sentence_id' => 'required',
            'word_id' => 'required_without:sentence_id',
            'audio' => 'required',
        ]);
        return $this->audioRepository->store($request->all());
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->audioRepository->find($id);
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
            'word_id' => 'required_without:sentence_id',
            'audio' => 'required',
        ]);
        return $this->audioRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->audioRepository->delete($id);
    }
}
