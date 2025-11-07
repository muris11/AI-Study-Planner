<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister() { return view('auth.register'); }
    public function showLogin() { return view('auth.login'); }

    public function register(Request $r) {
        $r->validate([
            'name'=>'required', 'email'=>'required|email|unique:users,email', 'password'=>'required|min:6'
        ]);
        $user = User::create([
            'name'=>$r->name,
            'email'=>$r->email,
            'password_hash'=>password_hash($r->password, PASSWORD_BCRYPT),
            'role'=>'student',
            'timezone'=>'Asia/Jakarta'
        ]);
        $r->session()->put('user_id', $user->id);
        $r->session()->put('user_name', $user->name);
        return redirect()->route('planner.dashboard');
    }

    public function login(Request $r) {
        $r->validate(['email'=>'required|email','password'=>'required']);
        $u = User::where('email',$r->email)->first();
        if(!$u || !password_verify($r->password, $u->password_hash)) {
            return back()->withErrors(['email'=>'Email atau password salah.']);
        }
        $r->session()->put('user_id', $u->id);
        $r->session()->put('user_name', $u->name);
        return redirect()->route('planner.dashboard');
    }

    public function logout(Request $r) {
        $r->session()->flush();
        return redirect()->route('welcome');
    }
}
