<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\ReviewsController;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function all_member()
    {
        $data['user'] = Auth::user();
        $data['allusers'] = User::where('union_id', $data['user']->union_id)->where('role_id', '3')->paginate(15);
        return view("admin.allmember")->with($data);

    }

    public function add_member()
    {
        $data['loggedUser'] = Auth::user();
        if (!$data['loggedUser']) {
            return abort(404);
        }
        $idunion = $data['loggedUser']->union_id;
        $data['union'] = Union::find($idunion);
        return view('admin.addmember')->with($data);
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
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($loggedUser) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة الاسم صحيح بالغة العربية');
                    }
                },
            ],
            'union_number' => 'required|numeric|unique:users,union_number',
            'ssn' => 'required|unique:users,ssn|numeric|digits:14',
            'phone' => 'required|unique:users,phone|digits:11|numeric',
            'sex' => 'required',
        ], [
            'name.string' => "يرجي ادخال اسم العضو",
            'name.required' => "يرجي ادخال اسم العضو ",
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
        return redirect(url('/admin/all/member'));
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
        $keyword = $request->keyword;

        if (is_numeric($keyword)) {
            $data['allusers'] = User::where('union_id', $unionid)
                ->where('role_id', "3")
                ->where('union_number', $keyword)->get();

            if (!$data['allusers']) {
                $request->session()->flash('error_keyword', 'لا يوجد عضو بهذا الرقم النقابي');
                return back();
            }
        } elseif (is_string($keyword)) {
            $data['allusers'] = User::where('union_id', $unionid)
                ->where('role_id', "3")
                ->where('name', 'like', "%$keyword%")->get();
        }

        return view("admin.search-member")->with($data);
    }

    public function info()
    {
        $data['user'] = Auth::user();
        return view('admin.my_info')->with($data);
    }

    public function form_info()
    {
        $data['user'] = Auth::user();
        return view('admin.edit-info')->with($data);
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
            'name' => [
                function ($attribute, $value, $fail) use ($userdata) {
                    if ($value == null) {
                        $value = $userdata->name;
                    } elseif (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة الاسم صحيح');
                    }
                },
            ],
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
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        return redirect(url('/admin/info'));

    }

    public function form_password()
    {
        return view('admin.edit_password');
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

        $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        return redirect(url('/admin/info'));
    }

    public function operation()
    {
        $super = User::find(Auth::user()->id);
        $user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();
        $union = Union::find($super->union_id);
        $data['services'] = $union->services;
        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();
        return view('admin.operation')->with($data);
    }

    public function search_member_operation(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ], [
            'keyword.required' => "يرجي ادخال اسم العضو او الكود النقابي",
            'keyword.string' => "يرجي ادخال اسم العضو او الكود النقابي",
        ]);

        if (is_numeric($request->keyword)) {
            $user = User::select('id')
                ->where('union_id', Auth::user()->union_id)
                ->where('role_id', '3')
                ->where('union_number', $request->keyword)->first();

            if (!$user) {
                $request->session()->flash('error_keyword', 'لا يوجد طلبات لعضو بهذا الرقم النقابي');
                return back();
            }
        } elseif (is_string($request->keyword)) {
            $user = User::select('id')
                ->where('union_id', Auth::user()->union_id)
                ->where('role_id', '3')
                ->where('name', 'like', "%$request->keyword%")->get();

        }

        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();

        return view('admin.search-member-operation')->with($data);
    }

    public function review($member, $service ,ReviewsController $revi)
    {
        return $revi->reviews($service, $member);
    }

/*
public function one_service(Request $request, $id)
{
$super = User::find(Auth::user()->id);
$user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();
$union = Union::find($super->union_id);
$data['services'] = $union->services;

$data['all_users'] = Service::with('users')->find(1);

//return  $data['all_users'];

for ($i = 0; $i < count($data['all_users']['users']); $i++) {

echo $data['all_users']['users'][$i]['pivot']['user1_id'] . "*******" .
$data['all_users']['users'][$i]['namear'] . "*********" .
$data['all_users']['users'][$i]['pivot']['created_at'] . "*********" . "<pre>";
}

//return view('admin.one_service')->with($data);
}
 */

}
