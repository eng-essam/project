<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        } elseif ($loggedUser->union_id == '5') {
            $union_id = '5';
        } elseif ($loggedUser->union_id == '6') {
            $union_id = '6';
        } elseif ($loggedUser->union_id == '7') {
            $union_id = '7';
        } elseif ($loggedUser->union_id == '8') {
            $union_id = '8';
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
        return redirect(url('/all/member'));
    }

    public function all_member()
    {
        $data['user'] = Auth::user();
        $data['allusers'] = User::where('union_id', $data['user']->union_id)->where('role_id', '3')->paginate(15);

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
        $user = User::find($id);
        $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة الاسم صحيح بالغة العربية');
                    }
                },
            ],
            'ssn' => "required|unique:users,ssn,$id|numeric|digits:14",
            'union_number' => "required|unique:users,union_number,$id|numeric",
        ], [
            'name.string' => "يرجي اخال اسم العضو",
            'name.required' => "يرجي ادخال اسم العضو ",
        ]);

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
        } elseif ($loggedUser->union_id == '5') {
            $union_id = '5';
        } elseif ($loggedUser->union_id == '6') {
            $union_id = '6';
        } elseif ($loggedUser->union_id == '7') {
            $union_id = '7';
        } elseif ($loggedUser->union_id == '8') {
            $union_id = '8';
        }

        $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة الاسم صحيح بالغة العربية');
                    }
                },
            ],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'ssn' => 'required|unique:users,ssn|numeric|digits:14',
            'phone' => 'required|digits:11|unique:users,phone|numeric',
            'sex' => 'required',
        ], [
            'name.string' => "يرجي ادخال اسم المشرف",
            'name.required' => "يرجي ادخال اسم المشرف ",
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
        $keyword = $request->keyword;

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
        $user = User::find($id);

        $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة الاسم صحيح بالغة العربية');
                    }
                },
            ],
            'ssn' => "required|unique:users,ssn,$id|numeric|digits:14",
        ], [
            'name.string' => "يرجي اخال اسم المشرف",
            'name.required' => "يرجي ادخال اسم المشرف ",
        ]);

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

        //validate of email
        if ($request->email == null) {
            $request->email = $userdata->email;
        } else {
            $request->validate(['email' => "email|unique:users,email,$user->id",
            ]);

            $userdata->update([
                'email_verified_at' => null,
            ]);
        }

        //validate of phone
        if ($request->phone == null) {
            $request->phone = $userdata->phone;
        } else {
            $request->validate(['phone' => "numeric|digits:11|unique:users,phone,$user->id",
            ]);
        }

        //validate of ssn
        if ($request->ssn == null) {
            $request->ssn = $userdata->ssn;
        } else {
            $request->validate(['ssn' => "numeric|digits:14|unique:users,ssn,$user->id",
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
        if ($request->name == null) {
            $request->name = $userdata->name;
        }
        $userdata->update([
            'name' => $request->name,
            'ssn' => $request->ssn,
            'sex' => $request->sex,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        return redirect(url('/super/info'));

    }

    public function form_password()
    {
        return view('superadmin.edit_password');
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
        return redirect(url('/super/info'));
    }

    public function operation()
    {
        $super = User::find(Auth::user()->id);

        $user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();

        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();

        return view('superadmin.operation')->with($data);
    }

    public function accept_operation()
    {
        $super = User::find(Auth::user()->id);

        $user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();

        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();

        $data['status'] = "موافق";
        $data['namepage'] = "جميع الطلبات التي تم الموافقة عليها";

        return view('superadmin.types_of_operation')->with($data);
    }

    public function refuse_operation()
    {
        $super = User::find(Auth::user()->id);

        $user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();

        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();

        $data['status'] = "رفض";
        $data['namepage'] = "جميع الطلبات التي تم رفضها ";

        return view('superadmin.types_of_operation')->with($data);
    }

    public function check_operation()
    {
        $super = User::find(Auth::user()->id);

        $user = User::select('id')->where('union_id', $super->union_id)->where('role_id', '3')->get();

        $data['all_users'] = User::with('operations')
            ->select('id', 'name')
            ->whereIn('id', $user)
            ->where('role_id', '3')->get();

        $data['status'] = "جاري مراجعة البيانات";
        $data['namepage'] = "جميع الطلبات التي لم يتم مراجعتها";

        return view('superadmin.types_of_operation')->with($data);
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

        return view('superadmin.search-member-operation')->with($data);
    }

    public function union_setting()
    {
        $data['union'] = Union::where('id', Auth::user()->union_id)->first();
        return view('superadmin.union_data')->with($data);
    }

    public function union_setting_phone()
    {
        $data['union'] = Union::where('id', Auth::user()->union_id)->first();
        return view('superadmin.union_phone')->with($data);
    }

    public function setting_phone(Request $request)
    {
        $userdata = Auth::user();
        $union = Union::where('id', Auth::user()->union_id)->first();
        //validate of phone
        if ($request->phone == null) {
            $request->phone = $union->phone;
        } else {
            $request->validate(['phone' => "numeric|digits:11|unique:unions,phone,$union->phone",
            ]);
            $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        }

        //validate of  oldpassword
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

        $union->update([
            'phone' => $request->phone,
        ]);

        return redirect(url('/union/setting'));
    }

    public function union_setting_bank()
    {
        $data['union'] = Union::where('id', Auth::user()->union_id)->first();
        return view('superadmin.union_bank')->with($data);
    }

    public function setting_bank(Request $request)
    {
        $userdata = Auth::user();
        $union = Union::where('id', Auth::user()->union_id)->first();
        //validate of bank
        if ($request->bank == null) {
            $request->bank = $union->bank;
        } else {
            $request->validate(['bank' => "numeric|unique:unions,bank,$union->bank",
            ]);
            $request->session()->flash('success_edit', "تم تعديل البيانات بنجاح");
        }

        //validate of  oldpassword
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

        $union->update([
            'bank' => $request->bank,
        ]);

        return redirect(url('/union/setting'));
    }
    //////////////////////////////

    public function information()
    {

        $data['user'] = Auth::user();
        $data['information'] = Information::where('union_id', $data['user']->union_id)->paginate(15);
        return view('superadmin.all-information')->with($data);
    }
    /////////////////////////////////////

    public function oneinformation($id)
    {
        $data['user'] = Auth::user();
        $data['information'] = Information::where('union_id', $data['user']->union_id)->where('id', $id)->first();
        return view("superadmin.one-information")->with($data);
    }

    public function add_information()
    {

        $data['loggedUser'] = Auth::user();
        $unionid = $data['loggedUser']->union_id;
        $data['union'] = Union::find($unionid);
        return view('superadmin.add-information')->with($data);
    }
    //////////////////////////////////////

    public function store_information(Request $request)
    {

        $loggedUser = Auth::user();
        $superid = $loggedUser->id;
        $supername = $loggedUser->name;

        if ($loggedUser->union_id == '1') {
            $union_id = '1';
        } elseif ($loggedUser->union_id == '2') {
            $union_id = '2';
        } elseif ($loggedUser->union_id == '3') {
            $union_id = '3';
        } elseif ($loggedUser->union_id == '4') {
            $union_id = '4';
        } elseif ($loggedUser->union_id == '5') {
            $union_id = '5';
        } elseif ($loggedUser->union_id == '6') {
            $union_id = '6';
        } elseif ($loggedUser->union_id == '7') {
            $union_id = '7';
        } elseif ($loggedUser->union_id == '8') {
            $union_id = '8';
        }

        $request->validate([
            'header' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة عنوان الخبر بالغة العربية');
                    }
                },
            ],
            'titel' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة محتوى الخبر بالغة العربية');
                    }
                },
            ],
            'img' => 'required|image',
        ]);

        $pathimg = Storage::disk('uploads')->put('information', $request->img);
        Information::create([
            'header' => $request->header,
            'titel' => $request->titel,
            'img' => $pathimg,
            'admin_id' => $superid,
            'admin_name' => $supername,
            'union_id' => $union_id,
        ]);

        $request->session()->flash('success_edit', 'تم إضافة خبر جديد بنجاح');
        return redirect(url('/superadmin/all/information'));
    }
    /////////////////////////////////////////

    public function delete_information($id, Request $request)
    {

        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $informationdata = Information::where('union_id', $user->union_id)->where('id', $id)->first();
        Storage::disk('uploads')->delete($informationdata->img);
        $informationdata->delete();
        $request->session()->flash('success_delet', 'تم حذف بيانات الخبر بنجاح');
        return redirect(url('superadmin/all/information'));
    }
    /////////////////////////////////////

    public function edit_information($id)
    {

        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $data['information'] = Information::where('union_id', $user->union_id)->where('id', $id)->first();
        if ($data['information']) {
            return view("superadmin.edit-information")->with($data);
        } else {
            return abort('403');
        }

    }
    /////////////////////////////////////

    public function update_information($id, Request $request)
    {

        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $informationdata = Information::where('union_id', $user->union_id)->where('id', $id)->first();
        if ($request->header == null) {
            $request->header = $informationdata->header;
        } else {
            $request->validate([
                'header' => [
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/\p{Arabic}/u', $value)) {
                            $fail('يرجي كتابة عنوان الخبر بالغة العربية');
                        }
                    },
                ],
            ]);
        }
        if ($request->titel == null) {
            $request->titel = $informationdata->titel;
        } else {
            $request->validate([
                'titel' => [
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/\p{Arabic}/u', $value)) {
                            $fail('يرجي كتابة محتوى الخبر بالغة العربية');
                        }
                    },
                ],
                'img' => 'nullable|image',
            ]);
        }

        $pathimg = $informationdata->img;
        if ($request->hasFile('img')) {
            Storage::disk('uploads')->delete($pathimg);
            $pathimg = Storage::disk('uploads')->put('information', $request->img);
        }
        $informationdata->update([
            'header' => $request->header,
            'titel' => $request->titel,
            'img' => $pathimg,
        ]);

        $request->session()->flash('success_edit', 'تم تعديل الخبر بنجاح');
        return redirect(url('/superadmin/all/information'));
    }
    /////////////////////////////////////

}
