<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('fullname')->get();

        return inertia('users/Index', compact('users'));
    }

    public function create() {
        return inertia('users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'designation'=>'required',
            'department'=>'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'designation' => $request->designation,
            'department' => $request->department,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/users')->with('message','A new user has been created.');
    }

    public function edit(User $user) {
        return inertia('users.Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user){
        $fields = $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'designation'=>'required',
            'department'=>'required',
        ]);

        $user->update($fields);

        return redirect('/users')->with('message', 'User updated successfully!');
    }
}
