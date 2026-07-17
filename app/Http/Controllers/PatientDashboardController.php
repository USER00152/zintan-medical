<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientDashboardController extends Controller
{
    public function index(Request $request)
    {
        $appointments = $request->user()
            ->appointments()
            ->with(['doctorProfile.user', 'doctorProfile.specialty', 'clinic', 'review'])
            ->orderByDesc('appointment_date')
            ->orderByDesc('appointment_time')
            ->paginate(10);

        return view('patient.dashboard', compact('appointments'));
    }
}
