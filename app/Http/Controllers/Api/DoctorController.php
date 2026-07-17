<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $query = DoctorProfile::with('user', 'specialty', 'clinics');

        if ($request->has('specialty_id')) {
            $query->where('specialty_id', $request->specialty_id);
        }

        $doctors = $query->get();

        return response()->json($doctors);
    }

    public function show($id)
    {
        $doctor = DoctorProfile::with('user', 'specialty', 'clinics', 'schedules', 'reviews')->find($id);

        if (! $doctor) {
            return response()->json(['message' => 'الطبيب غير موجود'], 404);
        }

        return response()->json($doctor);
    }
}
