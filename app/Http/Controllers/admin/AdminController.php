<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Union;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\admin\ReviewsController;
use Storage;

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
        } elseif($loggedUser->union_id == '5') {
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
        $data['status'] = "جاري مراجعة البيانات";

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

    public function review($member, $service, ReviewsController $revi)
    {
        return $revi->reviews($service, $member);
    }

    public function reviewservice($member, $service, Request $request)
    {
        $request->validate([
            'text' => [
                function ($attribute, $value, $fail) {
                    if ($value == null) {
                        $fail('برجاء كتابة ملاحظات المشرف');
                    } elseif (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي الكتابة بالغة العربية');
                    }
                },
            ],
        ]);

        $admin = Auth::user();
        $mamber = User::where('id', $member)->first();
        $service_id = $service;

        $mamber->services()->updateExistingpivot(
            $service_id, [
                'admin_name' => $admin->name,
                'user2_id' => $admin->id,
                'message' => $request->text,
                'status' => $request->check,
            ]
        );
        return redirect('/admin/operation');
    }

    ///////////////////////////////////

    public function information(){

            $data['user'] = Auth::user();
            $data['information'] = Information::where('union_id', $data['user']->union_id)->where('admin_id', $data['user']->id)->paginate(15);
            return view("admin.all-information")->with($data);
        }
        /////////////////////////////////////

        public function oneinformation($id)
        {
            $data['user'] = Auth::user();
            $data['information'] = Information::where('union_id', $data['user']->union_id)->where('admin_id', $data['user']->id)->where('id', $id)->first();
            return view("admin.one-information")->with($data);
        }
        ///////////////////////////////////

        public function add_information(){

            $data['loggedUser'] = Auth::user();
            $unionid = $data['loggedUser']->union_id;
            $data['union'] = Union::find($unionid);
            return view('admin.add-information')->with($data);
        }
        //////////////////////////////////////

        public function store_information(Request $request){

        $loggedUser = Auth::user();
        $adminid = $loggedUser->id;
        $adminname = $loggedUser->name;

        if ($loggedUser->union_id == '1') {
            $union_id = '1';
        } elseif ($loggedUser->union_id == '2') {
            $union_id = '2';
        } elseif ($loggedUser->union_id == '3') {
            $union_id = '3';
        } elseif ($loggedUser->union_id == '4') {
            $union_id = '4';
        } elseif($loggedUser->union_id == '5') {
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

            $pathimg = Storage::disk('uploads')->put('information',$request->img);
            Information::create([
                'header'=>$request->header,
                'titel'=>$request->titel,
                'img' => $pathimg,
                'admin_id' => $adminid,
                'admin_name' => $adminname,
                'union_id' => $union_id,
            ]);

            $request->session()->flash('success_edit', 'تم إضافة خبر جديد بنجاح');
            return redirect(url('/admin/all/information'));
        }
        /////////////////////////////////////////

        public function delete_information($id, Request $request){

            $loggedUser = Auth::user();
            $user = User::findOrfail($loggedUser->id);
            $informationdata = Information::where('union_id', $user->union_id)->where('admin_id', $user->id)->where('id', $id)->first();
            Storage::disk('uploads')->delete($informationdata->img);
            $informationdata->delete();
            $request->session()->flash('success_delet', 'تم حذف بيانات الخبر بنجاح');
            return redirect(url('admin/all/information'));
        }
        /////////////////////////////////////

        public function edit_information($id){

            $loggedUser = Auth::user();
            $user = User::findOrfail($loggedUser->id);
            $data['information'] = Information::where('union_id', $user->union_id)->where('admin_id', $user->id)->where('id', $id)->first();
            if($data['information']){
            return view("admin.edit-information")->with($data);
            }
            else {
                return abort('403');
            }

        }
        /////////////////////////////////////

        public function update_information($id, Request $request){

            $loggedUser = Auth::user();
            $user = User::findOrfail($loggedUser->id);
            $adminid = $user->id;
            $informationdata = Information::where('union_id', $user->union_id)->where('admin_id', $adminid)->where('id', $id)->first();
            if ($request->header == null ){
                $request->header = $informationdata->header;
            }
            else {
            $request->validate([
                'header' => [
                    function ($attribute, $value, $fail) {
                            if(!preg_match('/\p{Arabic}/u', $value)) {
                                $fail('يرجي كتابة عنوان الخبر بالغة العربية');
                            }
                    },
                 ],
              ]);
            }
            if ($request->titel == null ){
                $request->titel = $informationdata->titel;
            }
            else {
              $request->validate([
                'titel' => [
                    function ($attribute, $value, $fail){
                       if(!preg_match('/\p{Arabic}/u', $value)) {
                            $fail('يرجي كتابة محتوى الخبر بالغة العربية');
                        }
                    },
                 ],
                'img' => 'nullable|image',
             ]);
           }

            $pathimg = $informationdata ->img;
            if ($request->hasFile('img')) {
                Storage::disk('uploads')->delete($pathimg);
                $pathimg = Storage::disk('uploads')->put('information',$request->img);
            }
            $informationdata->update([
                'header'=>$request->header,
                'titel'=>$request->titel,
                'img' => $pathimg,
            ]);

            $request->session()->flash('success_edit', 'تم تعديل الخبر بنجاح');
            return redirect(url('/admin/all/information'));
        }
        /////////////////////////////////////

}
