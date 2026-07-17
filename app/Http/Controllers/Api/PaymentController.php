<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppointmentModel;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    // تسجيل دفع لموعد معين
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appointment_id' => 'required|exists:appointment_models,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|in:cash,card,bank_transfer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $appointment = AppointmentModel::find($request->appointment_id);

        if ($appointment->user_id !== $request->user()->id) {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }

        $payment = Payment::create([
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'method' => $request->method,
            'status' => $request->method === 'cash' ? 'pending' : 'paid',
            'paid_at' => $request->method === 'cash' ? null : now(),
        ]);

        return response()->json([
            'message' => 'تم تسجيل الدفع بنجاح',
            'payment' => $payment,
        ], 201);
    }
}
