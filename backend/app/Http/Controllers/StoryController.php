<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Story;
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
    public function index()
    {
        $stories = $this->storyRepository->getAll();
        return view('pages.stories')->with('stories', $stories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
        $story->reward = 0;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
