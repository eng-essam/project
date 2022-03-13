<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Union;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperController extends Controller
{

    public function add_member()
    {
        $data['loggedUser'] = Auth::user();
        if (!$data['loggedUser']) {
            return abort(404);
        }
        $idunion = $data['loggedUser']->union_id;
        $data['union'] = Union::find($idunion);
        return view('superadmin.addmember')->with($data);
    }

    public function update_member(Request $request)
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
            'name' => 'required|string',
            'union_number' => 'required|numeric|unique:users,union_number',
            'ssn' => 'required|unique:users,ssn|numeric|digits:14',
            'phone' => 'required|unique:users,phone|numeric',
            'sex' => 'required',
        ], [
            'name.string' => "يرجي ادخال اسم المشرف",
            'name.required' => "يرجي ادخال اسم المشرف ",
            'union_number.required' => "يرجي ادخال الكود النقابي للعضو ",
            'union_number.numeric' => "يرجي ادخال كود نقابي صحيح",
            'union_number.unique' => " الكود النقابي موجود بالفعل",
            'union_number.numeric' => "يرجي ادخال كود نقابي صحيح",
            'ssn.required' => "يرجي ادخال رقم قومي",
            'ssn.unique' => "الرقم القومي موجود بالفعل ",
            'ssn.numeric' => "يرجي ادخال رقم قومي صحيح",
            'ssn.digits' => " يرجي ادخال رقم قومي صحيح",
            'phone.required' => "يرجي ادخال رقم الهاتف",
            'phone.unique' => "رقم الهاتف موجود بالفعل",
            'phone.numeric' => "يرجي ادخل رقم هاتف صحيح",
        ]);

        User::create([
            'name' => $request->name,
            'union_number' => $request->union_number,
            'ssn' => $request->ssn,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'union_id' => $union_id,
            'role_id' => '3',
        ]);

        $request->session()->flash('success_edit', 'تم اضافة عضو جديد بنجاح');
        return redirect(url('/all/member'));
    }

    public function all_member()
    {
        $data['user'] = Auth::user();
        $data['allusers'] = User::where('union_id', $data['user']->id)->where('role_id', '3')->paginate(15);

        return view("superadmin.allmember")->with($data);
    }

    public function search_member(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ], [
            'keyword.required' => "يرجي ادخال اسم العضو او الكود النقابي",
            'keyword.string' => "يرجي ادخال اسم العضو او الكود النقابي",
        ]);

        $user = Auth::user();
        $unionid = $user->union_id;
        $keyword =  $request->keyword;

        if (is_numeric($keyword)) {
            $data['allusers'] = User::where('union_id', $unionid)
                ->where('role_id', "3")
                ->where('union_number', $keyword)->get();
        } elseif (is_string($keyword)) {
            $data['allusers'] = User::where('union_id', $unionid)
                ->where('role_id', "3")
                ->where('name', 'like', "%$keyword%")->get();
        }

        return view("superadmin.search-member")->with($data);
    }

    public function delet_member($id, Request $request)
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $delet_user = User::where('union_id', $unionid)->where('id', $id)->delete();
        $request->session()->flash('success', 'تم حذف بيانات العضو بنجاح');
        return redirect(url('/all/member'));
    }


    public function edit_member($id, Request $request)
    {
        $user = Auth::user();
        $unionid = $user->union_id;

        $data['member'] = User::where('union_id', $unionid)->where('id', $id)->first();
        if ($data['member']) {
            return view("superadmin.edit-member")->with($data);
        } else {
            return abort('403');
        }
    }

    public function edit_update($id, Request $request)
    {

        $request->validate([
            'name' => "required|string",
            'ssn' => "required|unique:users,ssn,$id|numeric|digits:14",
            'union_number' => "required|unique:users,union_number,$id|numeric",
        ], [
            'name.string' => "يرجي اخال اسم العضو",
            'name.required' => "يرجي ادخال اسم العضو ",
            'ssn.unique' => "الرقم القومي موجود بالفعل",
            'ssn.numeric' => "يرجي ادخال رقم قومي صحيح",
            'ssn.required' => "يرجي ادخال رقم قومي ",
            'ssn.digits' => "يرجي ادخال رقم قومي صحيح",
            'union_number.unique' => "كود النقابة موجود بالفعل موجود بالفعل",
            'union_number.numeric' => "يرجي ادخال كود نقابي صحيح",
            'union_number.required' => "يرجي ادخال الكود النقابي ",
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'ssn' => $request->ssn,
            'union_number' => $request->union_number,
        ]);

        $request->session()->flash('success_edit', 'تم تعديل البيانات بنجاح');

        return redirect(url('/all/member'));
    }

    public function add_admin()
    {
        $data['loggedUser'] = Auth::user();
        if (!$data['loggedUser']) {
            return abort(404);
        }
        $idunion = $data['loggedUser']->union_id;
        $data['union'] = Union::find($idunion);
        return view('superadmin.addadmin')->with($data);
    }

    public function update(Request $request)
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'ssn' => 'required|unique:users,ssn|numeric|max:14',
            'phone' => 'required|unique:users,phone|numeric',
            'sex' => 'required',
        ], [
            'name.string' => "يرجي ادخال اسم المشرف",
            'name.required' => "يرجي ادخال اسم المشرف ",
            'email.required' => "يرجي ادخال بريد الكتروني ",
            'email.email' => "يرجي ادخال بريد الكتروني صحيح",
            'email.unique' => "البريد الالكتروني موجود بالفعل",
            'password.required' => "يرجي ادخال كلمة سر ",
            'password.confirmed' => "كلمة السر غير متطابقة ",
            'password.min' => "ادخل كلمة سر اكبر من 6 احرف",
            'ssn.required' => "يرجي ادخال رقم قومي",
            'ssn.unique' => "الرقم القومي موجود بالفعل ",
            'ssn.numeric' => "يرجي ادخال رقم قومي صحيح",
            'ssn.max' => "يرجي ادخال رقم قومي صحيح",
            'phone.required' => "يرجي ادخال رقم الهاتف",
            'phone.unique' => "رقم الهاتف موجود بالفعل",
            'phone.numeric' => "يرجي ادخل رقم هاتف صحيح",
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ssn' => $request->ssn,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'union_id' => $union_id,
            'role_id' => '2',
        ]);

        $request->session()->flash('success_edit', 'تم اضافة مشرف جديد بنجاح');
        return redirect(url('/all/admin'));
    }
    public function all_admin()
    {
        $data['user'] = Auth::user();
        $data['allusers'] = User::where('union_id', $data['user']->id)->where('role_id', '2')->paginate(15);

        return view("superadmin.alladmin")->with($data);
    }

    public function search_admin(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ], [
            'keyword.required' => "يرجي ادخال اسم المشرف",
            'keyword.string' => "يرجي ادخال اسم المشرف",
        ]);

        $user = Auth::user();
        $unionid = $user->union_id;
        $keyword =  $request->keyword;


        $data['allusers'] = User::where('union_id', $unionid)
            ->where('role_id', "2")
            ->where('name', 'like', "%$keyword%")->get();


        return view("superadmin.search-admin")->with($data);
    }

    public function delet_admin($id, Request $request)
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $delet_user = User::where('union_id', $unionid)->where('id', $id)->delete();
        $request->session()->flash('success_delet', 'تم حذف بيانات المشرف بنجاح');
        return redirect(url('all/admin'));
    }

    public function edit_admin($id, Request $request)
    {
        $user = Auth::user();
        $unionid = $user->union_id;

        $data['member'] = User::where('union_id', $unionid)->where('id', $id)->first();
        if ($data['member']) {
            return view("superadmin.edit-admin")->with($data);
        } else {
            return redirect(url('/all/admin'));
        }
    }

    public function update_admin($id, Request $request)
    {
        $request->validate([
            'name' => "required|string",
            'ssn' => "required|unique:users,ssn,$id|numeric|digits:14",
        ], [
            'name.string' => "يرجي اخال اسم المشرف",
            'name.required' => "يرجي ادخال اسم المشرف ",
            'ssn.unique' => "الرقم القومي موجود بالفعل",
            'ssn.numeric' => "يرجي ادخال رقم قومي صحيح",
            'ssn.required' => "يرجي ادخال رقم قومي ",
            'ssn.digits' => "يرجي ادخال رقم قومي صحيح",
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'ssn' => $request->ssn,
        ]);

        $request->session()->flash('success_edit', 'تم تعديل البيانات بنجاح');
        return redirect(url('all/admin'));
    }

    public function showservice()
    {
        $loggedUser = Auth::user();
        $union_data = Union::find($loggedUser->union_id);
        $data['services'] = $union_data->services;
        return view("superadmin.showservice")->with($data);
    }

    public function cost_service($id)
    {
        $loggedUser = Auth::user();
        $union_data = Union::find($loggedUser->union_id);
        $data['services'] = $union_data->services()->where('service_id', $id)->first();
        if (!$data['services']) {
            return redirect(url('/admin/service'));
        }
        return view("superadmin.edit_service")->with($data);
    }

    public function cost($id, Request $request)
    {

        $rules = [
            'service_cost' => "required|numeric",
        ];

        $message = [
            'service_cost.numeric' => "يرجي ادخال ارقام فقط",
            'service_cost.required ' => "يرجي ادخال تكلفة الخدمة",
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $loggedUser = Auth::user();
        $union_data = Union::find($loggedUser->union_id);

        $union_data->services()->where('union_id', $union_data->id)->where('service_id', $id)->updateExistingPivot($id, [
            'service_cost' => $request->service_cost,
        ]);

        $request->session()->flash('success_edit', 'تم تعديل تكلفة الخدمة بنجاح');
        return redirect(url('/admin/service'));
    }





    public function info()
    {
        $data['user'] = Auth::user();
        return view('superadmin.my_info')->with($data);
    }

    public function form_info()
    {
        $data['user'] = Auth::user();
        return view('superadmin.edit-info')->with($data);
    }

    public function update_info(Request $request)
    {
        $user = Auth::user();
        $userdata = User::where('id', '=', $user->id)->first();

        $request->validate([
            'name' => "required|string",
            'email' => "required|email|unique:users,email,$user->id",
            'phone' => "required|numeric|unique:users,phone,$user->id",
            'ssn' => "required|numeric|unique:users,ssn,$user->id|digits:14",
            'password' => "nullable|confirmed|min:6",
            'sex' => "required",
        ], [
            'name.string' => "يرجي ادخال الاسم صحيح",
            'name.required' => "يرجي ادخال الاسم  ",
            'email.required' => "يرجي ادخال بريد الكتروني ",
            'email.email' => "يرجي ادخال بريد الكتروني صحيح",
            'email.unique' => "البريد الالكتروني موجود بالفعل",
            'password.confirmed' => "كلمة السر غير متطابقة ",
            'password.min' => "ادخل كلمة سر اكبر من 6 احرف",
            'ssn.required' => "يرجي ادخال رقم قومي",
            'ssn.unique' => "الرقم القومي موجود بالفعل ",
            'ssn.numeric' => "يرجي ادخال رقم قومي صحيح",
            'ssn.digits' => "يرجي ادخال رقم قومي صحيح",
            'phone.required' => "يرجي ادخال رقم الهاتف",
            'phone.unique' => "رقم الهاتف موجود بالفعل",
            'phone.numeric' => "يرجي ادخل رقم هاتف صحيح",
        ]);

        if ($request->password == null) {
            $password = $user->password;
        }else{
            $password= Hash::make($request->password);
        }

        $userdata->update([
            'name' => $request->name,
            'ssn' => $request->ssn,
            'sex' => $request->sex,
            'email' => $request->email,
            'password' => $password,
            'phone' => $request->phone,
        ]);


        $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        return redirect(url('/super/info'));
    }
}
