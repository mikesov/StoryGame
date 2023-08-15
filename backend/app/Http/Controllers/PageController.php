<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class PageController extends Controller
{
    protected PageRepository $pageRepository;

    /**
     * Constructor method.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display the listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return $this->pageRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $request->validate($request, [
            'story_id' => 'required',
            'page_number' => 'required',
        ]);
        return $this->pageRepository->store($request->all());
//        Page::create([
//            'story_id' => $request->input('story_id'),
//            'page_number' => $request->input('page_number'),
//        ]);
//        return redirect('/stories')->with('success', 'Page created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->pageRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $page = $this->pageRepository->find($id);

        return view('stories.edit')->with('story', $page);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'story_id' => 'required',
            'page_number' => 'required',
        ]);
        return $this->pageRepository->update($id, $request->all());
//        $page = $this->pageRepository->find($id);
//        if ($page->story_id != $request->input('story_id')) {
//            $page->story_id = $request->input('story_id');
//        }
//        if ($page->page_number != $request->input('page_number')) {
//            $page->page_number = $request->input('page_number');
//        }
//        $page->save();
//        return view('pages.page')->with('page', $page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return $this->pageRepository->delete($id);
    }
}
