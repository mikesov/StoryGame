<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\PagesRouteRepository;
use Illuminate\Http\Request;

class PagesRouteController extends Controller
{
    protected $pagesRouteRepository;

    /**
     * Constructor method.
     *
     * @param PagesRouteRepository $pagesRouteRepository
     */
    public function __construct(PagesRouteRepository $pagesRouteRepository)
    {
        $this->pagesRouteRepository = $pagesRouteRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        return view('index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function stories() {
        return view('stories.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function account() {
        return view('pages.account');
    }
}
