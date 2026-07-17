<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_profile_id' => 'required|exists:doctor_profiles,id',
            'clinic_id' => 'required|exists:clinics,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $exists = AppointmentModel::where('doctor_profile_id', $request->doctor_profile_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'هذا الموعد محجوز من قبل، اختر وقت آخر'], 409);
        }

        $appointment = AppointmentModel::create([
            'user_id' => $request->user()->id,
            'doctor_profile_id' => $request->doctor_profile_id,
            'clinic_id' => $request->clinic_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return response()->json([
            'message' => 'تم حجز الموعد بنجاح',
            'appointment' => $appointment,
        ], 201);
    }

    public function myAppointments(Request $request)
    {
        $appointments = AppointmentModel::with('doctorProfile.user', 'clinic')
            ->where('user_id', $request->user()->id)
            ->orderBy('appointment_date', 'desc')
            ->get();

        return response()->json($appointments);
    }

    public function cancel(Request $request, $id)
    {
        $appointment = AppointmentModel::find($id);

        if (! $appointment) {
            return response()->json(['message' => 'الموعد غير موجود'], 404);
        }

        if ($appointment->user_id !== $request->user()->id) {
            return response()->json(['message' => 'غير مصرح لك بإلغاء هذا الموعد'], 403);
        }

        $appointment->update(['status' => 'cancelled']);

        return response()->json(['message' => 'تم إلغاء الموعد بنجاح']);
    }
}
