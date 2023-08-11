<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\User;
use App\Repositories\StoryRepository;
use Illuminate\Http\Request;

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
        $stories = $this->storyRepository->getAll();
        return view('pages.stories.index')->with('stories', $stories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $story = new Story();
        $story->name = $request->input('name');
        $story->cover = $request->input('cover');
        $story->pages = 0;
        $story->reward = $request->input('reward');
        if ($story->isValid()) {
            Story::create([
                'name' => $story->name,
                'cover' => $story->cover,
                'pages' => $story->pages,
                'reward' => $story->reward,
            ]);
            return redirect('/stories');
        } else {
            return redirect('/stories/create')->withErrors($story->errors);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $story = $this->storyRepository->find($id);

        return view('pages.stories.story')->with('story', $story);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $story = $this->storyRepository->find($id);

        return view('pages.stories.edit')->with('story', $story);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover' => 'required',
            'reward' => 'required',
        ]);
        $story = $this->storyRepository->find($id);
        if ($story->name != $request->input('name')) {
            $story->name = $request->input('name');
        }
        if ($story->cover != $request->input('cover')) {
            $story->cover = $request->input('cover');
        }
        if ($story->reward != $request->input('reward')) {
            $story->reward = $request->input('reward');
        }
        $story->save();
        return view('pages.stories.story')->with('story', $story);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = $this->storyRepository->find($id);
        $story->delete();
//        return 'Delete';
        return redirect('/stories')->with('success', 'Story removed');
    }
}
