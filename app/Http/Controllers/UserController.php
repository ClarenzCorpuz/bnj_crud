<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->input('search'),
            function ($query, $search) {
                $query->where('firstname', 'like', "%{$search}%")
                      ->orWhere('lastname', 'like', "%{$search}%")
                      ->orWhere('middlename', 'like', "%{$search}%")
                      ->orWhere('gender', 'like', "%{$search}%")
                      ->orWhere('age', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            }
        )->paginate(5);

        $users->appends($request->query()); 

        return view('users.index', compact('users'));
    }

    public function addSave(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required|date',
            'age' => 'required|integer|min:0',
        ]);

        User::create($request->all());

        return redirect('/')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function editSave(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'birthdate' => 'required|date',
            'age' => 'required|integer|min:0',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect('/')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'User deleted successfully');
    }
}
