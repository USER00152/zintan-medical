<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentModel;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // عرض الأوقات المتاحة لطبيب معين في تاريخ معين
    public function availableSlots(Request $request, $doctorId)
    {
        $request->validate([
            'date' => 'required|date',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $date = Carbon::parse($request->date);
        $dayOfWeek = $date->dayOfWeek; // 0=الأحد ... 6=السبت

        // نجيب جدول دوام الطبيب في هذا اليوم وهذي العيادة
        $schedule = Schedule::where('doctor_profile_id', $doctorId)
            ->where('clinic_id', $request->clinic_id)
            ->where('day_of_week', $dayOfWeek)
            ->first();

        if (! $schedule) {
            return response()->json(['message' => 'الطبيب ما عندوش دوام في هذا اليوم', 'slots' => []]);
        }

        // نولد فترات كل 30 دقيقة من بداية الدوام لنهايته
        $slots = [];
        $start = Carbon::parse($schedule->start_time);
        $end = Carbon::parse($schedule->end_time);

        while ($start->lt($end)) {
            $slots[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        // نجيب المواعيد المحجوزة في هذا التاريخ لنفس الطبيب
        $bookedTimes = AppointmentModel::where('doctor_profile_id', $doctorId)
            ->where('appointment_date', $request->date)
            ->whereIn('status', ['pending', 'confirmed'])
            ->pluck('appointment_time')
            ->map(fn ($time) => Carbon::parse($time)->format('H:i'))
            ->toArray();

        // نطرح المحجوز من الكل، ونرجع الفاضي بس
        $availableSlots = array_values(array_diff($slots, $bookedTimes));

        return response()->json([
            'date' => $request->date,
            'doctor_profile_id' => $doctorId,
            'available_slots' => $availableSlots,
        ]);
    }
}
