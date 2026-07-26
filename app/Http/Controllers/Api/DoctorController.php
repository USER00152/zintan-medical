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

    public function store(Request $request)
    {
        $request->validate([
            'specialty_id' => 'required|exists:specialties,id',
            'years_experience' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
        ]);

        $doctor = DoctorProfile::create([
            'user_id' => $request->user()->id,
            'specialty_id' => $request->specialty_id,
            'years_experience' => $request->years_experience ?? 0,
            'bio' => $request->bio,
            'is_active' => true,
        ]);

        return response()->json($doctor->load('user', 'specialty'), 201);
    }

    public function destroy($id)
    {
        $doctor = DoctorProfile::find($id);
        if (! $doctor) {
            return response()->json(['message' => 'الطبيب غير موجود'], 404);
        }
        $doctor->delete();
        return response()->json(['message' => 'تم حذف الطبيب بنجاح']);
    }
}