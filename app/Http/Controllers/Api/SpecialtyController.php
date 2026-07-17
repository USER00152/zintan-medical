<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    // عرض كل التخصصات
    public function index()
    {
        $specialties = Specialty::all();

        return response()->json($specialties);
    }

    // عرض تخصص واحد بالتفصيل
    public function show($id)
    {
        $specialty = Specialty::find($id);

        if (! $specialty) {
            return response()->json(['message' => 'التخصص غير موجود'], 404);
        }

        return response()->json($specialty);
    }
}
