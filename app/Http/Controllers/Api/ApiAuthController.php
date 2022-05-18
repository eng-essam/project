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
           'message'=> 'البريد الإلكترونى أو كلمة السر خطأ',
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
   /////////////////////////////////////////////

   public function userInfo(Request $request){

       $loggedUser = $request->user();
       $user = User::find($loggedUser->id);
       return response()->json([
          'status'=> true,
          'data'=> new UserResource($user),
       ],200);
   }
   ///////////////////////////////////////////////

   public function changePassword(Request $request){

      $loggedUser = $request->user();
      $user = User::where('id', '=', $loggedUser->id)->first();
      $validator = Validator::make($request->all(),[
        'Oldpassword'=>'required',
        'Newpassword'=>'required|confirmed|min:8',
      ]);

      if ($validator->fails()) {
        return response()->json([
            'status'=> false,
            'message'=> $validator->errors(),
        ]);
     }
      if(!Hash::check($request->Oldpassword, $user->password)){
        return response()->json([
           'status'=> false,
           'message'=> [
            'Oldpassword' => ['كلمة السر الحالية غير صحيحة'],
          ],
         ]);
       }

       if(Hash::check($request->Newpassword, $user->password)){
        return response()->json([
           'status' => false,
           'message' => [
               'Newpassword' => ['كلمة السر الجديدة تشبة كلمة السر الحالية'],
           ],
         ]);
       }
       $user->update([
         'password'=> Hash::make($request->Newpassword),
       ]);

       return response()->json([
        'status'=> true,
        'message'=> 'تم تعديل كلمة السر بنجاح',
     ],200);
   }
   ////////////////////////////////////////////////

   public function changeEmail(Request $request){

     $loggedUser = $request->user();
     $user = User::where('id', '=', $loggedUser->id)->first();
     $validator = Validator::make($request->all(),[
        'email' => "required|email|unique:users,email,$user->id",
        'password'=>'required',
     ]);

      if ($validator->fails()) {
        return response()->json([
            'status'=> false,
            'message'=> $validator->errors(),
         ]);
       }

      if(!Hash::check($request->password, $user->password)){
        return response()->json([
           'status' => false,
           'message' => [
            'password' => ['كلمة السر غير صحيحة'],
           ],
        ]);
       }
       $userE= User:: where('email',$request->email)->where('role_id','=' ,3)->first();
       if ($userE) {
          return response()->json([
             'status'=> false,
             'message'=> [
                 'email' => [' البريد الإلكترونى الجديد يشبه البريد الإلكترونى الحالى'],
             ],
          ]);
        }
       $user->update([
         'email'=> $request->email,
       ]);

       return response()->json([
        'status'=> true,
        'message'=> 'تم تعديل البريد الإلكترونى بنجاح',
        'email'=> $user->email,
     ],200);

   }
   ///////////////////////////////////////////

   public function changePhone(Request $request){

    $loggedUser = $request->user();
    $user = User::where('id', '=', $loggedUser->id)->first();
    $validator = Validator::make($request->all(),[
       'phone' => "required|numeric|digits:11|unique:users,phone,$user->id",
       'password'=>'required',
    ]);

     if ($validator->fails()) {
       return response()->json([
           'status'=> false,
           'message'=> $validator->errors(),
       ]);
      }
     if(!Hash::check($request->password, $user->password)){
       return response()->json([
          'status' => false,
          'message'=> [
              'password' => ['كلمة السر غير صحيحة'],
            ],
       ]);
      }
      $userE= User:: where('phone',$request->phone)->where('role_id','=' ,3)->first();
      if ($userE) {
         return response()->json([
            'status'=> false,
            'message'=> [
                'phone' => ['رقم الهاتف الجديد يشبه رقم الهاتف الحالى'],
            ],
          ]);
        }
      $user->update([
        'phone'=> $request->phone,
      ]);

      return response()->json([
       'status'=> true,
       'message'=> 'تم تعديل رقم الهاتف بنجاح',
       'phone'=> $user->phone,
      ],200);
   }

}
