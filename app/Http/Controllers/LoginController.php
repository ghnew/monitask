<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check())
            return redirect('/');
    	return view('login');
    }

    // authentication handler
    public function handle(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

    	if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    		return redirect('/');
    	}
    	return redirect()->back()->withErrors(['Sorry username and password does not match.']);
    } 

    // check if its authenticated and redirect user based on type
    // ow redirect back to the login pages
    public function check() {
        if (Auth::check()) {
            if (Auth::user()->type == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/user/timesheet');
            }
        } else {
            return redirect('/login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}