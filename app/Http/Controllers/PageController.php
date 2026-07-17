<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function doctors()
    {
        return view('pages.doctors');
    }

    public function specialties()
    {
        return view('pages.specialties');
    }

    public function booking()
    {
        return view('pages.booking');
    }

    public function appointments()
    {
        return view('pages.appointments');
    }

    public function consultation()
    {
        return view('pages.consultation');
    }
    public function pharmacies()
{
    return view('pages.pharmacies');
}

public function join()
{
    return view('pages.join');
}

public function joinStore(\Illuminate\Http\Request $request)
{
    return redirect()->route('join')->with('success', 'تم استلام طلبك وسنتواصل معك قريباً! 💚');
}
}