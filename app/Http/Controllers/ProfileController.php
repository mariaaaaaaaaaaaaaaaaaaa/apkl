<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin()
    {
        return view('admin.profile');
    }

    public function sma()
    {
        return view('sma.profile');
    }

    public function smk()
    {
        return view('smk.profile');
    }

    public function slb()
    {
        return view('slb.profile');
    }
}
