<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == '1' || Auth::user()->role_id=='2'){
            return view('admin.index');
        }
        if (Auth::user()->role_id == '3') {
            return view('user.home');
        }
        else{
            Auth::logout();
            return view('auth/login');
        }
    }
}
