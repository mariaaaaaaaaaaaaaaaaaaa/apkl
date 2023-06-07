<?php

namespace App\Exports;

use Auth;

use App\Models\Achievement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Query\JoinClause;

class SAchievements implements FromView
{
    /**
    * @return Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        $excels = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('achievements.npsn', Auth::user()->npsn);
        })->get();
        return view('excel', compact('excels'));
    }
}
