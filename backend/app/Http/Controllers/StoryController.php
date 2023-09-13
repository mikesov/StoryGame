<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryCreateRequest;
use App\Http\Requests\StoryUpdateRequest;
use App\Models\Story;
use App\Models\User;
use App\Repositories\StoryRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StoryController extends Controller
{
    protected StoryRepository $storyRepository;

    /**
     * Constructor method.
     *
     * @param StoryRepository $storyRepository
     */
    public function __construct(StoryRepository $storyRepository)
    {
        $this->storyRepository = $storyRepository;
//        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Return the list of the resource.
     */
    public function index(): JsonResponse
    {
//        return view('stories.index')->with('stories', $stories);
        return $this->storyRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoryCreateRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(StoryCreateRequest $request): JsonResponse
    {
        $data = $request->validated();

        return $this->storyRepository->store($data);
//        Story::create([
//            'name' => $request->input('name'),
//            'cover' => $request->input('cover'),
//            'pages' => 0,
//            'reward' => $request->input('reward'),
//        ]);
//        return redirect('/stories')->with('success', 'Story created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->storyRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(int $id): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $story = $this->storyRepository->find($id);

        return view('stories.edit')->with('story', $story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoryUpdateRequest $request
     * @param int $id
     * @return JsonResponse|null
     */
    public function update(StoryUpdateRequest $request, int $id): ?JsonResponse
    {
        $data = $request->validated();

        return $this->storyRepository->update($id, $data);
//        $story = $this->storyRepository->find($id);
//        if ($story->name != $request->input('name')) {
//            $story->name = $request->input('name');
//        }
//        if ($story->cover != $request->input('cover')) {
//            $story->cover = $request->input('cover');
//        }
//        if ($story->reward != $request->input('reward')) {
//            $story->reward = $request->input('reward');
//        }
//        $story->save();
//        return view('stories.story')->with('story', $story);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|null
     */
    public function destroy(int $id): ?JsonResponse
    {
        return $this->storyRepository->delete($id);
//        $story = $this->storyRepository->find($id);
//        if ($story != null) {
//            $story->delete();
//            return redirect('/stories')->with('success', 'Story removed');
//        } else {
//            return redirect('/stories')->with('errors', ['Story not found']);
//        }
    }
}
