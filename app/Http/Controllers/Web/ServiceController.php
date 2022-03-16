<?php

namespace App\Http\Controllers\Web;

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
use App\Models\Unionservice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
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

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function search(Request $request)
    {

        $data['keyword'] =  $request->keyword;
        $data['union'] = $request->session()->get('union');
        $data['servicess'] = $data['union']->services;
        $row = [];
        for ($i = 0; $i < $data['servicess']->count(); $i++) {
            $row[] = $data['servicess'][$i]["id"];
        }


        $request->validate([
            'keyword' => 'required|string|max:20',
        ]);

        $data['services'] = Service::where('namear', 'like', "%$request->keyword%")
            ->whereIn('id', $row)->get();


        $data['servicess'] = $data['union']->services;

        return view('web.servicessearch')->with($data);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function serviceform($id, Request $request)
    {

        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);

        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['servicess'] = $data['union']->services;

        //بجيب كل الخدمات اللي تبع نقابة واحده بس
        $row = [];
        for ($i = 0; $i < $data['servicess']->count(); $i++) {
            $row[] =  $data['servicess'][$i]["id"];
        }

        //قبل مظهر فورم الخدمة لليوزر بروح اشوف هو مستخدم الخدمة دي قبل كده اما لا
        $user_services = $user->services;
        $services_arr = [];
        foreach ($user_services as $serviceid) {
            $services_arr[] = $serviceid->pivot->service_id;
        }

        if (in_array($id, $row)) {
            if (in_array($id, $services_arr)) {
                $request->session()->flash('servicess_error', 'لقت استخدمت هذه الخدمة من قبل هل تريد حذف 
                بياناتك القديمه لهذه الخدمة وطلبها من جديد');
                return redirect("/union/showservice/$unionid")->with(['id' => $id]);
            } else {
                if ($id == 1) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.renewalform')->with($data);
                } elseif ($id == 2) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.alternativeform')->with($data);
                } elseif ($id == 3) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.treatmentform')->with($data);
                } elseif ($id == 4) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.educationfeeform')->with($data);
                } elseif ($id == 5) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.diseaseform')->with($data);
                } elseif ($id == 6) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.conditionform')->with($data);
                } elseif ($id == 7) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.noworkformform')->with($data);
                } elseif ($id == 8) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.evictioncertform')->with($data);
                } elseif ($id == 9) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.experiencecertform')->with($data);
                } elseif ($id == 10) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.clinicscertform')->with($data);
                } elseif ($id == 11) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.recruitmentform')->with($data);
                } elseif ($id == 12) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.consultantcardform')->with($data);
                } elseif ($id == 13) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.specialistcardform')->with($data);
                } elseif ($id == 14) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.professionlicenseform')->with($data);
                } elseif ($id == 15) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.privateclinicsform')->with($data);
                } elseif ($id == 16) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.specialiststableform')->with($data);
                } elseif ($id == 17) {
                    $data['service'] = Service::findOrfail($id);
                    return view('web.services_form.professionlicenform')->with($data);
                }
            }
        } else {
            return view('web.services')->with($data);
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function myservice()
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $data['myservice'] = $user->services;
        return view('web.myservice')->with($data);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function delete($id, Request $request)
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $userid = $user->id;
        $unionid = $user->union_id;

        if ($id == 1) {
            $userdata = Renewal::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 2) {
            $userdata = Alternative::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->recept);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 3) {
            $userdata = Treatment::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 4) {
            $userdata = Educationfee::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->birth);
            Storage::disk('uploads')->delete($userdata->edu_certificate);
            Storage::disk('uploads')->delete($userdata->salary);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 5) {
            $userdata = Disease::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 6) {
            $userdata = Condition::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->police_certificae);
            Storage::disk('uploads')->delete($userdata->wedding);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 7) {
            $userdata = Nowork::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->disclaimer);
            Storage::disk('uploads')->delete($userdata->fulltime);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->ministry);
            Storage::disk('uploads')->delete($userdata->endServ);
            Storage::disk('uploads')->delete($userdata->brent);
            Storage::disk('uploads')->delete($userdata->Insurance);
            Storage::disk('uploads')->delete($userdata->cost);


            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 8) {
            $userdata = Evictioncert::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->health);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->attorney);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 9) {
            $userdata = Experiencecert::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->License);
            Storage::disk('uploads')->delete($userdata->recruitment);
            Storage::disk('uploads')->delete($userdata->assignment);
            Storage::disk('uploads')->delete($userdata->statement);
            Storage::disk('uploads')->delete($userdata->movements);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 10) {
            $userdata = Clinicscert::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->contract);
            Storage::disk('uploads')->delete($userdata->engineer);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->tax_card);
            Storage::disk('uploads')->delete($userdata->approval);
            Storage::disk('uploads')->delete($userdata->presonal);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 11) {
            $userdata = Recruitment::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->recruitment);
            Storage::disk('uploads')->delete($userdata->army_card);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 12) {
            $userdata = Consultantcard::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->temporary);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 13) {
            $userdata = Specialistcard::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->master);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 14) {
            $userdata = Professionlicense::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->model);
            Storage::disk('uploads')->delete($userdata->graduation);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->excellence);
            Storage::disk('uploads')->delete($userdata->birth);
            Storage::disk('uploads')->delete($userdata->personal);
            Storage::disk('uploads')->delete($userdata->fesh);
            Storage::disk('uploads')->delete($userdata->situation);
            Storage::disk('uploads')->delete($userdata->certificate);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 15) {
            $userdata = Privateclinic::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->contract);
            Storage::disk('uploads')->delete($userdata->certificate);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->building);
            Storage::disk('uploads')->delete($userdata->recipe);
            Storage::disk('uploads')->delete($userdata->device);
            Storage::disk('uploads')->delete($userdata->purchase);
            Storage::disk('uploads')->delete($userdata->license);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 16) {
            $userdata = Specialiststable::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->registration);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->specialty);
            Storage::disk('uploads')->delete($userdata->personal);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->experience);
            Storage::disk('uploads')->delete($userdata->fellowship);
            Storage::disk('uploads')->delete($userdata->professional);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 17) {
            $userdata = Professionlicen::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->license);
            Storage::disk('uploads')->delete($userdata->personal);
            Storage::disk('uploads')->delete($userdata->passport);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }



        $request->session()->flash('success_edit', 'تم الغاءالطلب بنجاح');
        return redirect(url('member/myservice'));
    }



    public function eidt($id)
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $userid = $user->id;
        $data['service'] = Service::findOrfail($id);

        if ($id == 1) {
            return view('web.edit.renewalform')->with($data);
        } elseif ($id == 2) {
            return view('web.edit.alternativeform')->with($data);
        } elseif ($id == 3) {
            return view('web.edit.treatmentform')->with($data);
        } elseif ($id == 4) {
            return view('web.edit.educationfeeform')->with($data);
        } elseif ($id == 5) {
            return view('web.edit.diseaseform')->with($data);
        } elseif ($id == 6) {
            return view('web.edit.conditionform')->with($data);
        } elseif ($id == 7) {
            return view('web.edit.noworkformform')->with($data);
        } elseif ($id == 8) {
            return view('web.edit.evictioncertform')->with($data);
        } elseif ($id == 9) {
            return view('web.edit.experiencecertform')->with($data);
        } elseif ($id == 10) {
            return view('web.edit.clinicscertform')->with($data);
        } elseif ($id == 11) {
            return view('web.edit.recruitmentform')->with($data);
        } elseif ($id == 12) {
            return view('web.edit.consultantcardform')->with($data);
        } elseif ($id == 13) {
            return view('web.edit.specialistcardform')->with($data);
        } elseif ($id == 14) {
            return view('web.edit.professionlicenseform')->with($data);
        } elseif ($id == 15) {
            return view('web.edit.privateclinicsform')->with($data);
        } elseif ($id == 16) {
            return view('web.edit.specialiststableform')->with($data);
        } elseif ($id == 17) {
            return view('web.edit.professionlicenform')->with($data);
        }
    }
}