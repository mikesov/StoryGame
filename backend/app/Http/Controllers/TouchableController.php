<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Touchable;
use App\Repositories\TouchableRepository;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use function Symfony\Component\Translation\t;

class TouchableController extends Controller
{
    protected TouchableRepository $touchableRepository;

    /**
     * Constructor method.
     *
     * @param TouchableRepository $touchableRepository
     */
    public function __construct(TouchableRepository $touchableRepository) {
        $this->touchableRepository = $touchableRepository;
    }

    /**
     * Return the list of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->touchableRepository->getAll();
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
            'word_id' => 'required',
            'coordinateX' => 'required',
            'coordinateY' => 'required',
            'vertices' => 'required',
        ]);
        return $this->touchableRepository->store($request->all());
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->touchableRepository->find($id);
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
            'word_id' => 'required',
            'coordinateX' => 'required',
            'coordinateY' => 'required',
            'vertices' => 'required',
        ]);
        return $this->touchableRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->touchableRepository->delete($id);
    }
}
