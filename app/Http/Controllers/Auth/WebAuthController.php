<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WebAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'يرجى إدخال البريد الإلكتروني',
            'password.required' => 'يرجى إدخال كلمة المرور',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->except('password'));
        }

        if (! Auth::attempt($request->only('email', 'password'), true)) {
            return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'])->withInput($request->except('password'));
        }

        $request->session()->regenerate();

        $redirect = $request->input('redirect');

        return $redirect ? redirect()->to($redirect) : redirect()->route('dashboard');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'هذا البريد الإلكتروني مستخدم من قبل',
            'phone.unique' => 'رقم الهاتف هذا مستخدم من قبل',
            'password.confirmed' => 'كلمتا المرور غير متطابقتين',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->except(['password', 'password_confirmation']));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        Auth::login($user, true);
        $request->session()->regenerate();

        $redirect = $request->input('redirect');

        return $redirect ? redirect()->to($redirect) : redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
