<?php

namespace App\Http\Controllers;

use App\Models\AppointmentModel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingWebController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_profile_id' => 'required|exists:doctor_profiles,id',
            'clinic_id' => 'required|exists:clinics,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $exists = AppointmentModel::where('doctor_profile_id', $request->doctor_profile_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'هذا الموعد محجوز من قبل، فضلاً اختر وقتًا آخر.')->withInput();
        }

        AppointmentModel::create([
            'user_id' => $request->user()->id,
            'doctor_profile_id' => $request->doctor_profile_id,
            'clinic_id' => $request->clinic_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('dashboard')->with('success', 'تم حجز موعدك بنجاح! سنتواصل معك لتأكيد الموعد.');
    }

    public function cancel(Request $request, AppointmentModel $appointment)
    {
        if ($appointment->user_id !== $request->user()->id) {
            abort(403);
        }

        $appointment->update(['status' => 'cancelled']);

        return back()->with('success', 'تم إلغاء الموعد بنجاح.');
    }

    public function review(Request $request, AppointmentModel $appointment)
    {
        if ($appointment->user_id !== $request->user()->id) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        Review::updateOrCreate(
            ['appointment_id' => $appointment->id],
            [
                'user_id' => $request->user()->id,
                'doctor_profile_id' => $appointment->doctor_profile_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );

        return back()->with('success', 'شكرًا لتقييمك!');
    }
}
