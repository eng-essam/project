<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Sanctum;


class ApiAuthController extends Controller
{
   public function login(Request $request){
     $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'password' => 'required|string',
     ]);

     if ($validator->fails()) {
        return response()->json([
            'status'=> false,
            'message'=> $validator->errors(),
        ]);
    }
    $user= User:: where('email',$request->email)->where('role_id','=' ,3)->first();
    if(!$user||!Hash::check($request->password, $user->password)){
        return response()->json([
           'status'=> false,
           'message'=> 'البريد الالكترونى أو كلمة السر خطأ',
        ]);
    }
    $token = $user->createToken('auth-token')->plainTextToken;
    return response()->json([
      'status'=> true,
      'message'=> 'تم تسجيل الدخول بنجاح',
      'data'=> new UserResource($user),
      'token'=>$token,
     ],200);
    }
  //////////////////////////////////////////////////////

    public function register(Request $request){
             $validator= Validator::make($request->all(),[
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|confirmed|min:8|max:30',
                'ssn' => 'required|numeric|digits:14',
                'union_number' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'=>false,
                    'message' => $validator->errors(),
                ]);
            }

        $user = User::where('ssn', '=', $request->ssn)
        ->where('union_number', '=', $request->union_number)
        ->where('role_id', '=', 3)->first();

        if($user == null){
            return response()->json([
               'status'=> false,
               'message'=> 'أنت غير مسجل فى النقابة',
            ]);
         }

        $user->update([
            'email' => $request->email,
            'password' => Hash:: make($request->password),
        ]);

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
          'status'=> true,
          'message'=> 'تم إنشاء الحساب بنجاح',
          'data'=> new UserResource($user),
          'token'=>$token,
        ] ,200);
    }
   ////////////////////////////////////////
   public function logout(Request $request){
     $user = $request->user();
     $user->tokens()->delete();
      return response()->json([
      'status'=> true,
      'message'=> 'تم تسجيل الخروج بنجاح',
     ], 200);
   }

}









