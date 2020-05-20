<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required|regex:/^09[0-9]{9}$/|unique:users',
            'password' => 'required|min:6|max:32',
            'first_name' => 'required|min:2|max:32',
            'last_name' => 'required|min:2|max:32',
            'roles' => 'array',
            'is_active' => 'boolean',
            'description' => 'string|max:255',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'mobile' => ['required', 'regex:/^09[0-9]{9}$/', Rule::unique('users')->ignore($id)],
            'password' => 'sometimes|required|min:6|max:32',
            'first_name' => 'required|min:2|max:32',
            'last_name' => 'required|min:2|max:32',
            'roles' => 'array',
            'is_active' => 'boolean',
            'description' => 'string|max:255',
        ]);
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::create($data);
        return $user;
    }
}
