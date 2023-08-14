<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        return view('stories.index')->with('stories', $stories);
        return $this->storyRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate($request, [
           'name' => 'required|max:255',
           'cover' => 'required',
           'pages' => 'required',
           'reward' => 'required',
        ]);
        return $this->storyRepository->store($request->all());
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
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return $this->storyRepository->find($id);
//        return view('stories.story')->with('story', $story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $story = $this->storyRepository->find($id);

        return view('stories.edit')->with('story', $story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return JsonResponse|null
     * @throws ValidationException
     */
    public function update(Request $request, string $id): ?JsonResponse
    {
        $request->validate($request, [
            'name' => 'required|max:255',
            'cover' => 'required',
            'pages' => 'required',
            'reward' => 'required',
        ]);
        return $this->storyRepository->update($id, $request->all());
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
     * @param string $id
     * @return JsonResponse|null
     */
    public function destroy(string $id): ?JsonResponse
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
