<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\MovementRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MovementController extends Controller
{
    protected MovementRepository $movementRepository;

    /**
     * Constructor method.
     *
     * @param MovementRepository $movementRepository
     */
    public function __construct(MovementRepository $movementRepository) {
        $this->movementRepository = $movementRepository;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Return the list of the resource in storage.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->movementRepository->getAll();
    }

    /**
     * Store the resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'touchable_id' => 'required',
            'coordinateX' => 'required',
            'coordinateY' => 'required',
        ]);
        return $this->movementRepository->store($request->all());
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->movementRepository->find($id);
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
            'touchable_id' => 'required',
            'coordinateX' => 'required',
            'coordinateY' => 'required',
        ]);
        return $this->movementRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->movementRepository->delete($id);
    }
}
