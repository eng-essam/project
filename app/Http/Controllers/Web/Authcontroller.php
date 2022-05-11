<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\verify_email;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mail;

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
            return redirect(url('/admin/all/member'));
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

    /*validate تسجيل عضو ف الموقع لاول مره
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
            'password' => Hash::make($request->password),
        ]);


        //request()->session()->flash('success-msg', 'تم التسجيل بنحاج');
        return view('all.login');
    }*/

    // صفحة نسيت كلمة السر
    public function requestPassword()
    {
        return view("all.forgot-password");
    }

    //تغير كلمة السر
    public function forgot_password()
    {
        Auth::logout();
        return redirect(url("/requestPassword"));
    }

    public function info()
    {
        $data['user'] = Auth::user();
        return view('web.my_info')->with($data);
    }

    public function form_info()
    {
        $data['user'] = Auth::user();
        return view('web.edit-info')->with($data);
    }

    public function update_info(Request $request)
    {
        $user = Auth::user();
        $userdata = User::where('id', '=', $user->id)->first();

        //validate of email
        if ($request->email == null) {
            $request->email = $userdata->email;
        } else {

            $request->validate(['email' => "email|unique:users,email,$user->id",
            ]);

            $userdata->update([
                'email_verified_at' => NULL,
            ]);
        }

        //validate of phone
        if ($request->phone == null) {
            $request->phone = $userdata->phone;
        } else {
            $request->validate(['phone' => "numeric|digits:11|unique:users,phone,$user->id",
            ]);
        }

        //validate of name and oldpassword
        $request->validate([
            'password' => [
                'required',
                function ($attribute, $value, $fail) use ($userdata) {
                    if ($value != null) {
                        if (!Hash::check($value, $userdata->password)) {
                            $fail('كلمة السر غير صحيحة');
                        }
                    }
                },
            ],
        ]);

        $userdata->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        return redirect(url('/member/info'));

    }

    public function form_password()
    {
        return view('web.edit_password');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();
        $userdata = User::where('id', '=', $user->id)->first();

        $request->validate([
            'oldpassword' => [
                'required',
                function ($attribute, $value, $fail) use ($userdata) {
                    if (!Hash::check($value, $userdata->password)) {
                        $fail('كلمة السر غير صحيحة');
                    }
                }],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                function ($attribute, $value, $fail) use ($userdata) {
                    if (Hash::check($value, $userdata->password)) {
                        $fail('كلمة السر الجديدة تشبة كلمة السر الحالية');
                    }
                }],

        ]);

        $userdata->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success_edit', "تم تعديل كلمة السر بنجاح");
        return redirect(url('/member/info'));
    }

    //عرض صفحة مشكلة في التسجيل
    public function problem()
    {
        $data['unions']=Union::all();
        return view("all.problem")->with($data);
    }

}
