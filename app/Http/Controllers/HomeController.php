<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->user()->role == 0) {
            return redirect()->route('admin.dashboard');
        }
        else if (auth()->user()->role == 1) {
            return redirect()->route('school.dashboard');
        }
        else if (auth()->user()->role == 2) {
            return redirect()->route('school.dashboard');
        }
        else if (auth()->user()->role == 3) {
            return redirect()->route('school.dashboard');
        }
    }
}
