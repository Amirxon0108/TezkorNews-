<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\WebUser; // Modelni ulash shart

class WebController extends Controller
{
    public function showLogin() {
        return view('TezkorNews.auth.login'); 
    }

    public function user_login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web_user')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email yoki parol noto‘g‘ri']);
    }

    public function showRegister() {
       return view('TezkorNews.auth.register');
    }

    public function user_register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:web_users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = WebUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('web_user')->login($user);

        return redirect('/')->with('success', 'Ro‘yxatdan muvaffaqiyatli o‘tdingiz!');
    }

    public function user_logout(Request $request) { 
        Auth::guard('web_user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Tizimdan chiqdingiz');
    }
}