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
        $users = $this->userRepository->getAll();
        return $users;
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
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
//        $user = new User();
//        $user->name = $request->input('name');
//        $user->email = $request->input('email');
//        $user->password = $request->input('password');
//        $user->coins = 0;
//        $user->stories_read = 0;
//
//        if ($user->isValid()) {
//            User::create([
//                'name' => $user->name,
//                'email' => $user->email,
//                'password' => password_hash($user->password, PASSWORD_DEFAULT),
//                'coins' => 0,
//                'stories_read' => 0,
//            ]);
//            return redirect('/users');
//        } else {
//            return redirect('/users/create')->with('errors', $user->errors);
//        }
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|size:6,20',
            'coins' => 'required',
        ]);
        return  $this->userRepository->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->userRepository->find($id);
    }

    /**
     * Show the form for editing specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $user = $this->userRepository->find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
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
     * @return Response
     */
    public function destroy(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
