<?php

namespace App\Http\Controllers;

use App\Models\AppointmentModel;
use App\Models\Clinic;
use App\Models\DoctorProfile;
use App\Models\Schedule;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorWebController extends Controller
{
    public function index(Request $request)
    {
        $query = DoctorProfile::with(['user', 'specialty', 'clinics'])
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        if ($request->filled('specialty_id')) {
            $query->where('specialty_id', $request->specialty_id);
        }

        if ($request->filled('clinic_id')) {
            $query->whereHas('clinics', function ($q) use ($request) {
                $q->where('clinics.id', $request->clinic_id);
            });
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $doctors = $query->orderByDesc('reviews_avg_rating')->paginate(9);

        $specialties = Specialty::orderBy('name_ar')->get();
        $clinics = Clinic::orderBy('name')->get();

        return view('doctors.index', compact('doctors', 'specialties', 'clinics'));
    }

    public function show(DoctorProfile $doctor)
    {
        $doctor->load(['user', 'specialty', 'clinics', 'schedules', 'reviews.patient']);

        return view('doctors.show', compact('doctor'));
    }

    public function slots(Request $request, DoctorProfile $doctor)
    {
        $request->validate([
            'date' => 'required|date',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $date = Carbon::parse($request->date);
        $dayOfWeek = $date->dayOfWeek;

        $schedule = Schedule::where('doctor_profile_id', $doctor->id)
            ->where('clinic_id', $request->clinic_id)
            ->where('day_of_week', $dayOfWeek)
            ->first();

        if (! $schedule) {
            return response()->json(['available_slots' => []]);
        }

        $slots = [];
        $start = Carbon::parse($schedule->start_time);
        $end = Carbon::parse($schedule->end_time);

        while ($start->lt($end)) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        $bookedTimes = AppointmentModel::where('doctor_profile_id', $doctor->id)
            ->where('appointment_date', $request->date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('appointment_time')
            ->map(fn ($time) => Carbon::parse($time)->format('H:i'))
            ->toArray();

        $isToday = $date->isToday();
        $now = Carbon::now()->format('H:i');

        $availableSlots = array_values(array_filter(
            array_diff($slots, $bookedTimes),
            fn ($slot) => ! $isToday || $slot > $now
        ));

        return response()->json([
            'date' => $request->date,
            'available_slots' => $availableSlots,
        ]);
    }
}
