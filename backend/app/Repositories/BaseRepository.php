<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterfaces\AbstractRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;

abstract class BaseRepository implements AbstractRepositoryInterface
{
    protected $model;

    /**
     * Constructor method.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get the model of the corresponding repository.
     *
     * @return mixed
     */
    abstract public function getModel();

    /**
     * Set the model of the corresponding repository.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function setModel(): void
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all resource in storage.
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $data = $this->model->paginate(10);
        return response()->json($data);
    }

    /**
     * Find resource in storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function find($id): JsonResponse
    {
        $data = $this->model->find($id);
        return response()->json($data);
    }

    /**
     * Create new resource in storage.
     *
     * @param $attributes
     * @return JsonResponse
     */
    public function store($attributes = []): JsonResponse
    {
        $this->model->create($attributes);
        return response()->json([
           'status' => 200,
           'message' => 'Data is successfully created.',
        ], 200);
    }

    /**
     * Update resource in storage.
     *
     * @param int $id
     * @param array $attributes
     * @return JsonResponse
     */
    public function update(int $id, array $attributes = []): JsonResponse
    {
        $target = $this->model->find($id);
        if ($target) {
            $target->update($attributes);
            return response()->json([
                'status' => 200,
                'message' => 'Data is successfully updated.',
            ], 200);
        } else {
            return response()->json([
               'status' => 422,
                'message' => 'Failed to update data, cannot find the requested $id.'
            ]);
        }
    }

    /**
     * Delete resource in storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        $target = $this->model->find($id);
        if ($target) {
            $target->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data is successfully deleted.',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Failed to delete data, cannot find the requested $id.'
            ]);
        }
    }
}
