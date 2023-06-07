<?php

namespace App\Exports;

use App\Models\Achievement;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Query\JoinClause;

class AAchievementsSMK implements FromView
{
    /**
    * @return Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        $excels = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('users.role','=',2)
            ;
        })->get();
        return view('admin.achievements.smk.excel', compact('excels'));
    }
}
