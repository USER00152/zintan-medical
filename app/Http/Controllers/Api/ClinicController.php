<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();

        return response()->json($clinics);
    }

    public function show($id)
    {
        $clinic = Clinic::with('doctorProfiles.user', 'doctorProfiles.specialty')->find($id);

        if (! $clinic) {
            return response()->json(['message' => 'العيادة غير موجودة'], 404);
        }

        return response()->json($clinic);
    }
}
