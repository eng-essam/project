<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 404);
        }
        $user = User::where('email', $request->email)->where('role_id', '=', 3)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'البريد الالكترونى أو كلمة السر خطأ',
            ], 404);
        }
        $token = $user->createToken('auth-token')->plainTextToken;
        $reponse = [
            'status' => true,
            'message' => 'تم الدخول بنجاح',
            'data' => new UserResource($user),
            'token' => $token,
        ];
        return response($reponse, 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|confirmed|min:8|max:30',
            'ssn' => 'required|numeric|digits:14',
            'union_number' => 'required|numeric|digits:8',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 404);
        }

        $user = User::where('ssn', '=', $request->ssn)
            ->where('union_number', '=', $request->union_number)
            ->where('role_id', '=', 3)->first();

        if ($user == null) {
            return response()->json([
                'status' => false,
                'message' => 'أنت غير مسجل فى النقابة',
            ], 404);
        }

        $user->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;
        $reponse = [
            'status' => true,
            'message' => 'تم تسجيل الدخول بنجاح',
            'data' => new UserResource($user),
            'token' => $token,
        ];
        return response($reponse, 200);
    }
    

}
