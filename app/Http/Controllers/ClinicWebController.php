<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicWebController extends Controller
{
    public function index(Request $request)
    {
        $query = Clinic::withCount('doctorProfiles');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        }

        $clinics = $query->orderBy('name')->paginate(9);

        return view('clinics.index', compact('clinics'));
    }

    public function show(Clinic $clinic)
    {
        $clinic->load(['doctorProfiles.user', 'doctorProfiles.specialty', 'doctorProfiles.clinics'])
            ->loadCount(['doctorProfiles']);

        $clinic->doctorProfiles->each(function ($doctor) {
            $doctor->loadCount('reviews')->loadAvg('reviews', 'rating');
        });

        return view('clinics.show', compact('clinic'));
    }
}
