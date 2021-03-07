<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminUsersController extends Controller
{
	public function users() {
    	$users = User::all();
    	return view('admin/users', compact('users'));
    }

    public function register(Request $request) {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'type' => 'required'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type')
        ]);

        return redirect()->back()->with('success', 'User has been created');
    }

    public function remove(Request $request) {
    	User::destroy($request->input('id'));
    	return redirect()->back()->with('success', 'User has been removed');
    }
}
