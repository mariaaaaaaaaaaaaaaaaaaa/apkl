<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $admin = User::where('role',0)->count();
        $sma = User::where('role',1)->count();
        $smk = User::where('role',2)->count();
        $slb = User::where('role',3)->count();
        $latest_entries=Achievement::orderBy('updated_at','desc')->limit(5)->get();
        return view('admin.dashboard',compact('admin','sma','smk','slb','latest_entries'));
    }

    public function school()
    {
        $chart = Achievement::select(Achievement::raw("COUNT(*) as count"), Achievement::raw("MONTHNAME(waktu) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(Achievement::raw("Month(waktu)"))
                    ->pluck('count', 'month_name');
 
        $labels = $chart->keys();
        $data = $chart->values();

        $latest_entries=Achievement::orderBy('created_at','desc')->limit(5)->get();
              
        return view('school.dashboard', compact('labels', 'data', 'latest_entries'));
    }
}
