<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentModel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    // إضافة تقييم بعد الزيارة
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appointment_id' => 'required|exists:appointment_models,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $appointment = AppointmentModel::find($request->appointment_id);

        if ($appointment->user_id !== $request->user()->id) {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }

        $review = Review::create([
            'appointment_id' => $request->appointment_id,
            'user_id' => $request->user()->id,
            'doctor_profile_id' => $appointment->doctor_profile_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return response()->json([
            'message' => 'تم إضافة تقييمك بنجاح',
            'review' => $review,
        ], 201);
    }

    // عرض كل تقييمات طبيب معين
    public function doctorReviews($doctorId)
    {
        $reviews = Review::with('patient')
            ->where('doctor_profile_id', $doctorId)
            ->get();

        return response()->json($reviews);
    }
}
