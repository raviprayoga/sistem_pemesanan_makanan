<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kasir;

class authController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::user()->jabatan == 'kasir'){
                return redirect('/dashboard');
            }else{
                return redirect('/dashboard');
            }
            
        }
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
