<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class AdminDashController extends Controller
{
    public function dashboard() {
    	$users = User::where('type', '!=', 'admin')
    		->with('todays_entries')->get();
    	return view('admin/dashboard', compact('users'));
    }
}
