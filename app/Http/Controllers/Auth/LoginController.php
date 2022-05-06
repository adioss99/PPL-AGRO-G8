<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dotenv\Util\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $input = $request->all();

        Validator::make($input, [
            'email' => 'required|email:dns',
            'password' => 'required'
        ])->validate();
        // dd($isValid);
        
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            
            if(auth()->user()->roles == "ADMIN"){
                return redirect()->route('admin-dashboard')->with('toast_success','Login berhasil');
            }elseif(auth()->user()->roles == "USER"){
                return redirect()->route('dashboard')->with('toast_success','Login berhasil');
            }
        }else{
            return redirect()->route('login')->with('error','Data yang anda inputkan tidak valid')->withInput();
            // dd($input);
            // return redirect()->refresh();
        }
    }
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function redirectTo(){
        if(Auth()->user->roles == 'ADMIN'){
            return route('pages.admin-dashboard');
        }
        elseif(Auth()->user->roles == 'USER'){
            return route('pages.admin-dashboard');
        }
    }
    public function logout()
    {
        Auth::logout();
        
        request()->session()->invalidate();
        
        request()->session()->regenerateToken();
        
        return redirect('/');
    }
}