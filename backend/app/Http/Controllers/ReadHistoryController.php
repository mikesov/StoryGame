<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ReadHistoryRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class ReadHistoryController extends Controller
{
    protected ReadHistoryRepository $readHistoryRepository;

    /**
     * Constructorr method.
     *
     * @param ReadHistoryRepository $readHistoryRepository
     */
    public function __construct(ReadHistoryRepository $readHistoryRepository)
    {
        $this->readHistoryRepository = $readHistoryRepository;
    }

    /**
     * Return the list of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->readHistoryRepository->getAll();
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
            'user_id' => 'required',
            'story_id' => 'required',
            'finish' => 'required',
        ]);
        return $this->readHistoryRepository->store($request->all());
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->readHistoryRepository->find($id);
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
            'user_id' => 'required',
            'story_id' => 'required',
            'finish' => 'required',
        ]);
        return $this->readHistoryRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->readHistoryRepository->delete($id);
    }
}
