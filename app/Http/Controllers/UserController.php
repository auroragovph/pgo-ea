<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([

            'name'     => [
                'first'  => $request->post('first_name'),
                'last'   => $request->post('last_name'),
                'middle' => $request->post('middle_name'),
            ],

            'office'   => $request->post('office'),
            'username' => $request->post('username'),
            'password' => bcrypt($request->post('password')),

        ]);

        return response()->json([
            'message' => 'User has been saved.',
            'intended' => route('user.index')
        ]);
    }
}
