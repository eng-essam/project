<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

  


class Authcontroller extends Controller
{
    public function register_admin()
    {
        $data['loggedUser'] = Auth::user();
        if (!$data['loggedUser']) {
            return abort(404);
        }
        $idunion = $data['loggedUser']->union_id;
        $data['union'] = Union::find($idunion);
        return view('admin.register_admin')->with($data);
    }

    public function admin_register(Request $request)
    {
        $loggedUser = Auth::user();

        if ($loggedUser->union_id == '1') {
            $union_id = '1';
        } elseif ($loggedUser->union_id == '2') {
            $union_id = '2';
        } elseif ($loggedUser->union_id == '3') {
            $union_id = '3';
        } elseif ($loggedUser->union_id == '4') {
            $union_id = '4';
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'ssn' => 'required|unique:users,ssn|numeric',
            'phone' => 'required|numeric',
            'sex' => 'required',
            'union_number' => 'required|unique:users,union_number',
        ]);

        User::create([
            'name' => $request->name,
            'union_number' => $request->union_number,
            'ssn' => $request->ssn,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'union_id' => $union_id,
            'role_id' => '3',
        ]);
        return redirect(url('/register/admin'));
    }
    //////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////// 
    public function register_member()
    {
        return view('web.register_member');
    }

    public function member_register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|confirmed|min:5|max:30',
            'ssn' => 'required|numeric',
            'union_number' => 'required|numeric',

        ]);

        $user = User::where('ssn', '=', $request->ssn)
            ->where('union_number', '=', $request->union_number)
            ->where('role_id', '=', '3')->first();

        if ($user !== null) {
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return view('all.login');
        } else {
            request()->session()->flash('error-msg', 'انت لست مسجل في النقابة');
            return back();
        }
    }


   public function requestPassword()
   {
      return view("all.forgot-password");
   }





}
