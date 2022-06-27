<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\UserServiceController;
use App\Models\Service;
use App\Models\Union;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['information'] = $data['union']->information->take(10);
        $data['servicess'] = $data['union']->services->take(4);
        return view('web.unoin_home')->with($data);
    }

    public function information()
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['information'] = $data['union']->information->take(12);  //paginate()
        return view('web.all-information')->with($data);
    }
    /////////////////////////////

    public function oneinformation($id)
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['information'] = $data['union']->information->where('id', $id)->first();
        return view('web.one-information')->with($data);
    }
    ///////////////////////////////////

    public function showservice($id, Request $request)
    {
        $loggedUser = Auth::user();
        $union = Union::all();
        foreach ($union as $key) {
            $idunion[] = $key['id'];
        }
        if (in_array($id, $idunion)) {
            $data['union'] = Union::findOrfail($id);
            $data['servicess'] = $data['union']->services;
            $request->session()->put('union', $data['union']);
            if (!$loggedUser) {
                return view('web.services')->with($data);
            } elseif ($loggedUser->union_id == $id) {
                if ($loggedUser->role_id == 3) {
                    return view('web.services')->with($data);
                } else {
                    return abort('403');
                }
            } else {
                return abort('403');
            }
        } else {
            return abort('403');
        }
    }

    public function search(Request $request)
    {

        $data['keyword'] = $request->keyword;
        $data['union'] = $request->session()->get('union');
        $data['servicess'] = $data['union']->services;
        $row = [];
        for ($i = 0; $i < $data['servicess']->count(); $i++) {
            $row[] = $data['servicess'][$i]["id"];
        }

        $request->validate([
            'keyword' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/\p{Arabic}/u', $value)) {
                        $fail('يرجي كتابة اسم الخدمة صحيح بالغة العربية');
                    }
                },
            ],
        ], [
            'keyword.required' => 'يرجي كتابة اسم الخدمة',
        ]);

        $data['services'] = Service::where('namear', 'like', "%$request->keyword%")
            ->whereIn('id', $row)->get();

        $data['servicess'] = $data['union']->services;

        return view('web.servicessearch')->with($data);
    }

    public function servicedesc($id, UserServiceController $desc)
    {

        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['servicess'] = $data['union']->services;

        //علشان اجيب سعر الخدمة
        $data['services_cost'] = $data['union']->services()->where('service_id', $id)->first();

        //بجيب كل الخدمات اللي تبع نقابة واحده بس
        $row = [];
        for ($i = 0; $i < $data['servicess']->count(); $i++) {
            $row[] = $data['servicess'][$i]["id"];
        }

        //قبل مظهر فورم الخدمة لليوزر بروح اشوف هو مستخدم الخدمة دي قبل كده اما لا
        $user_services = $user->services;
        $services_arr = [];
        foreach ($user_services as $serviceid) {
            $services_arr[] = $serviceid->pivot->service_id;
        }
        if (in_array($id, $row)) {
            return $desc->servicedesc($id ,$unionid)->with($data);
        }else{
            return view('web.services')->with($data);
        }



    }

    public function serviceform($id, Request $request ,UserServiceController $form)
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);

        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['servicess'] = $data['union']->services;

        //بجيب كل الخدمات اللي تبع نقابة واحده بس
        $row = [];
        for ($i = 0; $i < $data['servicess']->count(); $i++) {
            $row[] = $data['servicess'][$i]["id"];
        }

        //قبل مظهر فورم الخدمة لليوزر بروح اشوف هو مستخدم الخدمة دي قبل كده اما لا
        $user_services = $user->services;
        $services_arr = [];
        foreach ($user_services as $serviceid) {
            $services_arr[] = $serviceid->pivot->service_id;
        }

        if (in_array($id, $row)) {
            if (in_array($id, $services_arr)) {
                $request->session()->flash('servicess_error', 'لقد قمت بطلب هذه الخدمة من قبل يرجي الغاء الطلب القديم ');
                return redirect("/union/servicedesc/$id");
            } else {
                return $form->serviceform($id)->with($data);
            }
        } else {
            return view('web.services')->with($data);
        }

    }

    public function store($id, Request $request,UserServiceController $StorePath)
    {
        $loggedUser = Auth::user();
        $unionid = $loggedUser->union_id;
        $userid = $loggedUser->id;

        $pathimg=$StorePath->path($unionid,$id);
        $StorePath->store($id,$request,$pathimg,$userid,$unionid);

        $request->session()->flash('success', 'تم طلب الخدمة بنجاح وفي انتظار مراجعة طلبك');
        return redirect(url("/member/myservice"));
    }


    public function update($id, Request $request ,UserServiceController $UpdatePath)
    {
        $loggedUser = User::where('id', '=', Auth::user()->id)->first();

        $unionid = $loggedUser->union_id;
        $userid = $loggedUser->id;
        $service = Service::where('id', '=', $id)->first();
        $servicename = $service->namear;

        $pathimg=$UpdatePath->path($unionid,$id);
        $UpdatePath->update($id,$request,$pathimg,$userid,$servicename,$loggedUser);

        return redirect(url("/member/myservice"));
    }


    public function delete($id, Request $request,UserServiceController $DeletePath)
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $userid = $user->id;
        $DeletePath->delete($id,$userid,$user);


        $request->session()->flash('success_edit', 'تم الغاء الطلب بنجاح');
        return redirect(url('member/myservice'));
    }

    public function eidt($id,UserServiceController $EidtPath)
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $unionid=$user->union_id;
        $data['service'] = Service::findOrfail($id);
        return $EidtPath->eidt($id,$data,$unionid);
    }

    public function myservice()
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $data['myservice'] = $user->services;
        return view('web.myservice')->with($data);
    }

}
