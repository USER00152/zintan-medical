<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
        return response()->json($specialties);
    }

    public function show($id)
    {
        $specialty = Specialty::find($id);
        if (! $specialty) {
            return response()->json(['message' => 'التخصص غير موجود'], 404);
        }
        return response()->json($specialty);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
        ]);

        $specialty = Specialty::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);

        return response()->json($specialty, 201);
    }

    public function destroy($id)
    {
        $specialty = Specialty::find($id);
        if (! $specialty) {
            return response()->json(['message' => 'التخصص غير موجود'], 404);
        }
        $specialty->delete();
        return response()->json(['message' => 'تم حذف التخصص بنجاح']);
    }
}