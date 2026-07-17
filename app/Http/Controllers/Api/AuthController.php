<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'role'  => 'required|in:patient,doctor',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->name . '_' . time() . '@zintanmed.ly',
            'phone'    => $request->phone,
            'password' => Hash::make($request->phone),
            'role'     => $request->role,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'تم إنشاء الحساب بنجاح',
            'user'    => $user,
            'token'   => $token,
        ], 201);
    }

    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // لو الاسم موجود، سجّل دخوله - لو مش موجود، انشئله حساب جديد تلقائياً
    $user = User::firstOrCreate(
        ['name' => $request->name],
        [
            'email'    => str_replace(' ', '_', $request->name) . '_' . time() . '@zintanmed.ly',
            'phone'    => '09' . rand(10000000, 99999999),
            'password' => bcrypt($request->name),
            'role'     => 'patient',
        ]
    );

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'أهلاً ' . $user->name,
        'user'    => $user,
        'token'   => $token,
    ]);
}

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}