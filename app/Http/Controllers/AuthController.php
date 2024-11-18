<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formlogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $petugas = \App\Models\Petugas::where('username', $request->username)->first();

        if ($petugas && Hash::check($request->password, $petugas->password)) {
            Log::info('Password is correct');
        } else {
            Log::error('Password is incorrect');
        }
    
        Log::info('Login attempt', ['username' => $request->username]);
    
        if(auth()->attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            Log::info('Login successful', ['username' => $request->username]);
            return redirect()->intended('/admin');
        }        
    
        Log::error('Login failed', ['username' => $request->username]);
        return back()->with('error', 'Login failed');
    }

   public function logout(){
    auth()->logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();
    return redirect('/login');
   }
}
