<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Repositories\ImageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ImageController extends Controller
{
    protected ImageRepository $imageRepository;

    /**
     * Return the list of resource in storage.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository) {
        $this->imageRepository = $imageRepository;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Store the newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'image_id' => 'required',
            'touchable_id' => 'required',
            'image' => 'required',
        ]);
        return $this->imageRepository->store($request->all());
    }

    /**
     * Return the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->imageRepository->find($id);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public  function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'image_id' => 'required',
            'touchable_id' => 'required',
            'image' => 'required',
        ]);
        return $this->imageRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->imageRepository->delete($id);
    }
}
