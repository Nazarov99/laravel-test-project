<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use app\User;

class UserController extends Controller
{
    public function user(Request $request)
    {
        return $request->user();
    }

    public function getUserList(Request $request)
    {
        $pageSize = $request->input('pageSize');
        $name = $request->input('name');

        $users = User::where(function ($query) use ($name) {
            if ($name) {
                $query->where('name', 'like', $name . '%');
            }
        })
        ->paginate($pageSize);

        return response($users, 200);
    }

    public function addUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $add_user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return response($add_user, 200);
    }

    public function updateUser(Request $request, $id)
    {
        $updateUser = User::where('id', $id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return response($updateUser, 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return response($user, 200);
    }
}
