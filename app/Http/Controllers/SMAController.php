<?php

namespace App\Http\Controllers;

use Auth;
use PDOException;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\SAchievements;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Database\Query\JoinClause;

class SMAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest_entries = Achievement::join('users', function(JoinClause $join){
            $join->on('users.npsn', '=', 'achievements.npsn')
            ->where('users.role', '=', 1);
        })
        ->orderBy('achievements.created_at','desc')->limit(5)->get();

        $chart = Achievement::select(Achievement::raw("COUNT(*) as count"), Achievement::raw("MONTHNAME(waktu) as month_name"))
                    ->join('users', function(JoinClause $join){
                        $join->on('users.npsn', '=', 'achievements.npsn')
                        ->where('users.role', '=', 1);
                    })
                    ->whereYear('waktu', date('Y'))
                    ->groupBy(Achievement::raw("Month(waktu)"))
                    ->pluck('count', 'month_name');
 
        $labels = $chart->keys();
        $data = $chart->values();

        return view('sma.dashboard', compact('latest_entries', 'labels', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sma.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'nama_siswa' => ['required', 'string', 'min:3', 'max:60'],
                'nama_lomba' => ['required', 'string', 'min:3', 'max:255'],
                'penyelenggara' => ['required', 'string', 'min:3', 'max:255'],
                'prestasi' => ['required', 'string', 'min:1', 'max:255'],
                'waktu' => ['required','date'],
                'tingkat' => ['required'],
                'jenis_lomba' => ['required'],
            ]);
            // $user = User::create([
            //     'name' => $request->nama_siswa,
            //     'email' => $request->nama_siswa . '@gmail.com',
            //     'password' => Hash::make('password'),
            //     'role' => 'siswa',
            // ]);
            // $achievement = Achievement::create([
            //     'user_id' => $user->id,
            //     'nama_lomba' => $request->nama_lomba,
            //     'penyelenggara' => $request->penyelenggara,
            //     'prestasi' => $request->prestasi,
            //     'waktu' => $request->waktu,
            //     'tingkat' => $request->tingkat,
            //     'jenis_lomba' => $request->jenis_lomba,
            // ]);
            // return redirect()->route('sma.index')->with('success', 'Data berhasil ditambahkan');

            $acvs = new Achievement();
            $id = Str::random(16);
            $acvs->id = $id;
            $acvs->npsn = Auth::user()->npsn;
            $acvs->nama_siswa = $request->nama_siswa;
            $acvs->nama_lomba = $request->nama_lomba;
            $acvs->penyelenggara = $request->penyelenggara;
            $acvs->prestasi = $request->prestasi;
            $acvs->waktu = $request->waktu;
            $acvs->tingkat = $request->tingkat;
            $acvs->jenis_lomba = $request->jenis_lomba;

            $acvs->save();

            DB::commit();

            return redirect()->route('aschool.achievements')->with('success', 'Data Berhasil Disimpan!');
            
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->validate([
            'search' => ['string', 'max:255']
        ]);
        $school = Auth::user()->npsn;
        $acvs = Achievement::where([
            ['npsn','=',$school],
            [function ($query) use ($request) {
                if (($qq = $request->search)) {
                    $query->orWhere('nama_siswa', 'LIKE', '%' . $qq . '%')
                        ->get();
                }
            }]
        ])->orderBy('updated_at','desc')->paginate(10);

        return view('sma.achievements',compact('acvs','school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acvs = Achievement::find($id);
        return view('sma.edit', compact('acvs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $acvs = Achievement::find($request->id);
            $acvs->nama_siswa = $request->nama_siswa;
            $acvs->nama_lomba = $request->nama_lomba;
            $acvs->penyelenggara = $request->penyelenggara;
            $acvs->prestasi = $request->prestasi;
            $acvs->waktu = $request->waktu;
            $acvs->tingkat = $request->tingkat;
            $acvs->jenis_lomba = $request->jenis_lomba;

            $acvs->save(); 

            DB::commit();

            return redirect()->route('aschool.achievements')->with('success', 'Data Berhasil Disimpan!');
            
        } catch (PDOException $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $acvs = Achievement::find($request->id);
        $acvs->delete();
        return redirect()->route('aschool.achievements')->with('success', 'Data Berhasil Dihapus!');
    }

    public function pdf()
    {
        $pdf = Achievement::where('npsn',Auth::user()->npsn)->get();
        
        view()->share('pdf',$pdf);
        $print = PDF::loadView('sma.pdf')
            ->setPaper('a4', 'landscape')
            // ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            // ->setWarnings(false)
            ;

        // return $print->stream();
        return $print->download('cetak_prestasi_'. date('d-m-Y'));

        // return view('school.pdf',compact('pdf'));
    }

    public function excel()
    {
        return Excel::download(new SAchievements, 'cetak_prestasi_'. date('d-m-Y').'.xlsx');
    }
}
