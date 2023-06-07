<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function login(Request $request)
    {   
        $input = $request->all();
      
        $validator = $this->validator($input);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
      
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))//, 'status' => 'Aktif'
        {
            if (auth()->user()->role == 0) {
                return redirect()->route('admin.dashboard');
            }
            else if (auth()->user()->role == 1) {
                return redirect()->route('aschool.dashboard');
            }
            else if (auth()->user()->role == 2) {
                return redirect()->route('kschool.dashboard');
            }
            else if (auth()->user()->role == 3) {
                return redirect()->route('bschool.dashboard');
            }
        }else{
            dd($validator);
            return redirect()->route('login')->with('failed', 'Incorrect email or password');
        }
    }
}
