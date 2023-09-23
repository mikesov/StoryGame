<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected UserRepository $userRepository;

    /**
     * Constructor method.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the listing of the resources.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->userRepository->getAll();
//        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|size:6,20',
            'phone' => 'required|max:10',
        ]);
        return  $this->userRepository->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->userRepository->find($id);
    }

    /**
     * Show the form for editing specified resource.
     *
     * @param int $id
     * @return \Illuminate\Foundation\Application|Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $user = $this->userRepository->find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|size:6,20',
            'coins' => 'required',
        ]);
        return $this->userRepository->update($id, $request->all());
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->userRepository->delete($id);
    }
}
