<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{

    //validate logoin
    public function guest_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->password != null || $request->email != null) {
                        $islogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                        if (!$islogin) {
                            $fail('البريد الالكتروني او كلمة السر غير صحيح');
                        }
                    }
                },
            ],
        ]);

        $uesrunion = Auth::user()->union_id;
        if (Auth::user()->role_id == '1') {
            return redirect(url('/all/member'));
        } elseif (Auth::user()->role_id == '2') {
            return redirect(url('/register/admin'));
        } elseif (Auth::user()->role_id == '3') {
            return redirect(url("/union/showservice/$uesrunion"));
        }
    }

    // logout
    public function member_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('login');
    }

    //تسجيل عضو ف الموقع لاول مره
    public function register_member()
    {
        return view('all.register_member');
    }

    //validate تسجيل عضو ف الموقع لاول مره
    public function member_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'ssn' => 'required|numeric|digits:14',
            'union_number' => 'required|numeric',
        ]);

        $user = User::where('ssn', '=', $request->ssn)
            ->where('union_number', '=', $request->union_number)
            ->where('role_id', '=', '3')
            ->first();

        $user->update([
            'email' => $request->email,
            'password' =>Hash::make($request->password) ,
        ]);


        request()->session()->flash('success-msg', 'تم التسجيل بنحاج');
        return view('all.login');
    }

    // صفحة نسيت كلمة السر
    public function requestPassword()
    {
        return view("all.forgot-password");
    }

    //عرض صفحة مشكلة في التسجيل
    public function problem()
    {
        return view("all.problem");
    }

}
