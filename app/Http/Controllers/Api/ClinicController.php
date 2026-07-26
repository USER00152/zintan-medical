<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        $clinic = Clinic::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return response()->json($clinic, 201);
    }

    public function destroy($id)
    {
        $clinic = Clinic::find($id);
        if (! $clinic) {
            return response()->json(['message' => 'العيادة غير موجودة'], 404);
        }
        $clinic->delete();
        return response()->json(['message' => 'تم حذف العيادة بنجاح']);
    }
}