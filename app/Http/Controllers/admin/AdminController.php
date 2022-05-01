<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Clinicscert;
use App\Models\Condition;
use App\Models\Consultantcard;
use App\Models\Disease;
use App\Models\Educationfee;
use App\Models\Evictioncert;
use App\Models\Experiencecert;
use App\Models\Nowork;
use App\Models\Privateclinic;
use App\Models\Professionlicen;
use App\Models\Professionlicense;
use App\Models\Recruitment;
use App\Models\Renewal;
use App\Models\Service;
use App\Models\Specialistcard;
use App\Models\Specialiststable;
use App\Models\Treatment;
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

    public function review($member, $service)
    {
        $data['user'] = User::find($member)->first();
        $data['service'] = Service::find($service)->first();

        include_once("app/Http/Controllers/admin/reviews.php");
        /*
        if ($service == 1) {
            $data['img'] = Renewal::where('user_id', $member)->first();
            return view('admin.reviews.Renewal')->with($data);
        } elseif ($service == 2) {
            $data['img'] = Alternative::where('user_id', $member)->first();
            return view('admin.reviews.Alternative')->with($data);
        } elseif ($service == 3) {
            $data['img'] = Treatment::where('user_id', $member)->first();
            return view('admin.reviews.Treatment')->with($data);
        } elseif ($service == 4) {
            $data['img'] = Educationfee::where('user_id', $member)->first();
            return view('admin.reviews.Educationfee')->with($data);
        } elseif ($service == 5) {
            $data['img'] = Disease::where('user_id', $member)->first();
            return view('admin.reviews.Disease')->with($data);
        } elseif ($service == 6) {
            $data['img'] = Condition::where('user_id', $member)->first();
            return view('admin.reviews.Condition')->with($data);
        } elseif ($service == 7) {
            $data['img'] = Nowork::where('user_id', $member)->first();
            return view('admin.reviews.Nowork')->with($data);
        } elseif ($service == 8) {
            $data['img'] = Evictioncert::where('user_id', $member)->first();
            return view('admin.reviews.Evictioncert')->with($data);
        } elseif ($service == 9) {
            $data['img'] = Experiencecert::where('user_id', $member)->first();
            return view('admin.reviews.Experiencecert')->with($data);
        } elseif ($service == 10) {
            $data['img'] = Clinicscert::where('user_id', $member)->first();
            return view('admin.reviews.Clinicscert')->with($data);
        } elseif ($service == 11) {
            $data['img'] = Recruitment::where('user_id', $member)->first();
            return view('admin.reviews.Recruitment')->with($data);
        } elseif ($service == 12) {
            $data['img'] = Consultantcard::where('user_id', $member)->first();
            return view('admin.reviews.Consultantcard')->with($data);
        } elseif ($service == 13) {
            $data['img'] = Specialistcard::where('user_id', $member)->first();
            return view('admin.reviews.Specialistcard')->with($data);
        } elseif ($service == 14) {
            $data['img'] = Professionlicense::where('user_id', $member)->first();
            return view('admin.reviews.Professionlicense')->with($data);
        } elseif ($service == 15) {
            $data['img'] = Privateclinic::where('user_id', $member)->first();
            return view('admin.reviews.Privateclinic')->with($data);
        } elseif ($service == 16) {
            $data['img'] = Specialiststable::where('user_id', $member)->first();
            return view('admin.reviews.Specialiststable')->with($data);
        } elseif ($service == 17) {
            $data['img'] = Professionlicen::where('user_id', $member)->first();
            return view('admin.reviews.Professionlicen')->with($data);
        }
        */
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
