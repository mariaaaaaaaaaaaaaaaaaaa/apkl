<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Exports\AAchievements;
use Illuminate\Validation\Rule;
use App\Exports\AAchievementsSLB;
use App\Exports\AAchievementsSMA;
use App\Exports\AAchievementsSMK;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Database\Query\JoinClause;

class AdminController extends Controller
{

    // public function profile()
    // {
    //     return view('admin.profile');
    // }

    public function reset(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find($request->id);
            $user->password = bcrypt('cabdindikwil1');

            $user->update();

            DB::commit();

            return redirect()->route('admin.users')->with('success','Password Berhasil Direset!');
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function excelAchievements()
    {
        return Excel::download(new AAchievements, 'cetak_prestasi_all_'. date('d-m-Y').'.xlsx');
    }

    public function excelAchievementsSMA()
    {
        return Excel::download(new AAchievementsSMA, 'cetak_prestasi_sma_'. date('d-m-Y').'.xlsx');
    }

    public function excelAchievementsSMK()
    {
        return Excel::download(new AAchievementsSMK, 'cetak_prestasi_smk_'. date('d-m-Y').'.xlsx');
    }

    public function excelAchievementsSLB()
    {
        return Excel::download(new AAchievementsSLB, 'cetak_prestasi_slb_'. date('d-m-Y').'.xlsx');
    }

    public function pdfUsers()
    {
        $pdf = User::get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.users.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_akun_all_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfAdmin()
    {
        $pdf = User::where('role','=',0)->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.users.admin.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_akun_admin_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfSMA()
    {
        $pdf = User::where('role','=',1)->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.users.sma.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_akun_sma_'. date('d-m-Y') .'_pdf');

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfSMK()
    {
        $pdf = User::where('role','=',2)->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.users.smk.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_akun_smk_'. date('d-m-Y') .'_pdf');

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfSLB()
    {
        $pdf = User::where('role','=',3)->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.users.slb.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_akun_slb_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfAchievements()
    {
        $pdf = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn');
        })
        ->orderBy('achievements.updated_at', 'desc')->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.achievements.all.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_prestasi_all_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfAchievementsSMA()
    {
        $pdf = Achievement::join('users', function(JoinClause $join){
                $join->on('users.npsn', '=', 'achievements.npsn')
                    ->where('users.role', '=', 1);
            })
            ->orderBy('achievements.updated_at', 'desc')->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.achievements.sma.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_prestasi_sma_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfAchievementsSMK()
    {
        $pdf = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
                ->where('users.role', '=', 2);
        })
        ->orderBy('achievements.updated_at', 'desc')->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.achievements.smk.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_prestasi_smk_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    public function pdfAchievementsSLB()
    {
        $pdf = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
                ->where('users.role', '=', 3);
        })
        ->orderBy('achievements.updated_at', 'desc')->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('admin.achievements.slb.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_prestasi_slb_'. date('d-m-Y'));

        // return view('admin.users.print',compact('pdf'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role',0)->count();
        $sma = User::where('role',1)->count();
        $smk = User::where('role',2)->count();
        $slb = User::where('role',3)->count();
        $latest_entries=Achievement::orderBy('updated_at','desc')->limit(5)->get();
        return view('admin.dashboard',compact('admin','sma','smk','slb','latest_entries'));
    }

    public function indexUsers(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $alls = User::where([
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.users.all',compact('alls'));
    }

    public function indexUsersAdmin(Request $request)
    {
        // $admins = User::where('role',0)->orderBy('updated_at','desc')->paginate(10);

        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $admins = User::where([
            ['role','=',0],
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.users.admin.index',compact('admins'));
    }

    public function indexUsersSMA(Request $request)
    {
        // $admins = User::where('role',0)->orderBy('updated_at','desc')->paginate(10);

        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $smas = User::where([
            ['role','=',1],
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.users.sma.index',compact('smas'));
    }

    public function indexUsersSMK(Request $request)
    {
        // $admins = User::where('role',0)->orderBy('updated_at','desc')->paginate(10);

        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $smks = User::where([
            ['role','=',2],
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.users.smk.index',compact('smks'));
    }

    public function indexUsersSLB(Request $request)
    {
        // $admins = User::where('role',0)->orderBy('updated_at','desc')->paginate(10);

        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $slbs = User::where([
            ['role','=',3],
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.users.slb.index',compact('slbs'));
    }

    public function indexAchievements(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $acvs = Achievement::where([
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('nama_siswa', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('admin.achievements.all.index',compact(('acvs')));
    }

    public function indexAchievementsSMA(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $acvmas = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('users.role', '=', 1);
        })
        ->where([
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('nama_siswa', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('achievements.updated_at','desc')->paginate(10);

        return view('admin.achievements.sma.index',compact(('acvmas')));
    }

    public function indexAchievementsSMK(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $acvmks = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('users.role', '=', 2);
        })
        ->where([
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('nama_siswa', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('achievements.updated_at','desc')->paginate(10);

        return view('admin.achievements.smk.index',compact(('acvmks')));
    }

    public function indexAchievementsSLB(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $acvlbs = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('users.role', '=', 3);
        })
        ->where([
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('nama_siswa', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('achievements.updated_at','desc')->paginate(10);

        return view('admin.achievements.slb.index',compact(('acvlbs')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAdmin()
    {
        return view('admin.users.admin.create');
    }
    
    public function createSMA()
    {
        return view('admin.users.sma.create');
    }
    
    public function createSMK()
    {
        return view('admin.users.smk.create');
    }
    
    public function createSLB()
    {
        return view('admin.users.slb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAdmin(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                // 'npsn' => ['required', 'string', 'min:8', 'max:8', Rule::unique('users')->ignore($request->npsn, 'npsn')],
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->email, 'email')],
            ]);
            $user = new User();
            $user->id = random_int(1000000000000000, 9999999999999999);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('cabdindikwil1');
            $user->role = 0;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.admin')->with('success', 'Data Berhasil Disimpan!');
                    
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function storeSMA(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'npsn' => ['required', 'string', 'min:8', 'max:8', Rule::unique('users')->ignore($request->npsn, 'npsn')],
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->email, 'email')],
            ]);
            $user = new User();
            $user->id = random_int(1000000000000000, 9999999999999999);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('cabdindikwil1');
            $user->role = 1;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.sma')->with('success', 'Data Berhasil Disimpan!');
                
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function storeSMK(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'npsn' => ['required', 'string', 'min:8', 'max:8', Rule::unique('users')->ignore($request->npsn, 'npsn')],
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->email, 'email')],
            ]);
            $user = new User();
            $user->id = random_int(1000000000000000, 9999999999999999);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('cabdindikwil1');
            $user->role = 2;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.smk')->with('success', 'Data Berhasil Disimpan!');
                    
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function storeSLB(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'npsn' => ['required', 'string', 'min:8', 'max:8', Rule::unique('users')->ignore($request->npsn, 'npsn')],
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->email, 'email')],
            ]);
            $user = new User();
            $user->id = random_int(1000000000000000, 9999999999999999);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt('cabdindikwil1');
            $user->role = 3;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.slb')->with('success', 'Data Berhasil Disimpan!');
                        
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editAdmin($id)
    {
        $admins = User::find($id);
        return view('admin.users.admin.edit', compact('admins'));
    }

    public function editSMA($id)
    {
        $smas = User::find($id);
        return view('admin.users.sma.edit', compact('smas'));
    }

    public function editSMK($id)
    {
        $smks = User::find($id);
        return view('admin.users.smk.edit', compact('smks'));
    }

    public function editSLB($id)
    {
        $slbs = User::find($id);
        return view('admin.users.slb.edit', compact('slbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAdmin(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            // $user->role = 0;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.admin')->with('success', 'Data Berhasil Disimpan!');
                
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function updateSMA(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find($request->id);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            // $user->role = 1;
            $user->status = $request->status;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.sma')->with('success', 'Data Berhasil Disimpan!');
                
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function updateSMK(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find($request->id);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            // $user->role = 2;
            $user->status = $request->status;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.smk')->with('success', 'Data Berhasil Disimpan!');
                
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    public function updateSLB(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find($request->id);
            $user->npsn = $request->npsn;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            // $user->role = 3;
            $user->status = $request->status;

            $user->save();

            DB::commit();

            return redirect()->route('admin.users.slb')->with('success', 'Data Berhasil Disimpan!');
                
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Data Berhasil Dihapus!');
    }
}
