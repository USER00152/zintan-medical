<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\DoctorProfile;
use App\Models\Specialty;

class HomeController extends Controller
{
    public function index()
    {
        $specialties = Specialty::withCount('doctorProfiles')->get();

        $featuredDoctors = DoctorProfile::with(['user', 'specialty', 'clinics'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(6)
            ->get();

        $clinics = Clinic::withCount('doctorProfiles')->latest()->take(6)->get();

        $stats = [
            'doctors' => DoctorProfile::count(),
            'clinics' => Clinic::count(),
            'specialties' => Specialty::count(),
        ];

        return view('home', compact('specialties', 'featuredDoctors', 'clinics', 'stats'));
    }
}
