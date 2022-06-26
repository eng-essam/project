<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(Request $request){

        $user = $request->user();
        if ($user->hasVerifiedEmail()){
            return response()->jason([
                'status'=> false,
                'message'=> 'تم تأكيد البريد الإلكترونى بالفعل'
            ]);
        }
        $user->sendEmailVerificationNotification();
        return response()->jason([
            'status'=> true,
            'message'=> 'تم إرسال لينك تأكيد البريد الإلكترونى'
        ]);

    } ////////////////////////////

    public function Verify(Request $request){

        $user = $request->user();
        if ($user->hasVerifiedEmail()){
            return response()->jason([
                'status'=> false,
                'message'=> 'تم تأكيد البريد الإلكترونى بالفعل'
            ]);
        }

        if ($user->markEmailAsVerified()){
              event(new Verified($user));
        }

        return response()->jason([
            'status'=> true,
            'message'=> 'تم تأكيد البريد الإلكترونى'
        ]);

    } ////////////////////////////


}
