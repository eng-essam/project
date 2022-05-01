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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['informations'] = $data['union']->information;
        $data['servicess'] = $data['union']->services->take(4);
        return view('web.unoin_home')->with($data);
    }

    public function information(){
        $user = Auth::user();
        $unionid = $user->union_id;
        $data['union'] = Union::findOrfail($unionid);
        $data['servicess'] = $data['union']->services->take(4);
        $data['informations'] = $data['union']->information;
        return view('web.information')->with($data);
    }

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

    public function servicedesc($id, Request $request)
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
            if ($id == 1) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.renewal_desc')->with($data);
            } elseif ($id == 2) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.alternative_desc')->with($data);
            } elseif ($id == 3) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.treatment_desc')->with($data);
            } elseif ($id == 4) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.educationfee_desc')->with($data);
            } elseif ($id == 5) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.disease_desc')->with($data);
            } elseif ($id == 6) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.condition_desc')->with($data);
            } elseif ($id == 7) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.noworkform_desc')->with($data);
            } elseif ($id == 8) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.evictioncert_desc')->with($data);
            } elseif ($id == 9) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.experiencecert_desc')->with($data);
            } elseif ($id == 10) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.clinicscert_desc')->with($data);
            } elseif ($id == 11) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.recruitment_desc')->with($data);
            } elseif ($id == 12) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.consultantcard_desc')->with($data);
            } elseif ($id == 13) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.specialistcard_desc')->with($data);
            } elseif ($id == 14) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.professionlicense_desc')->with($data);
            } elseif ($id == 15) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.privateclinics_desc')->with($data);
            } elseif ($id == 16) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.specialiststable_desc')->with($data);
            } elseif ($id == 17) {
                $data['service'] = Service::findOrfail($id);
                return view('web.services_desc.professionlicen_desc')->with($data);
            }
        } else {
            return view('web.services')->with($data);
        }

    }

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
    public function store($id, Request $request)
    {
        $loggedUser = Auth::user();
        $unionid = $loggedUser->union_id;
        $userid = $loggedUser->id;

        if ($unionid == 1) {
            if ($id == 1) {
                $pathimg = "pharmacy/renewals";
            } elseif ($id == 2) {
                $pathimg = "pharmacy/alternatives";
            } elseif ($id == 3) {
                $pathimg = "pharmacy/treatments";
            } elseif ($id == 4) {
                $pathimg = "pharmacy/educationfees";
            } elseif ($id == 5) {
                $pathimg = "pharmacy/diseases";
            } elseif ($id == 6) {
                $pathimg = "pharmacy/conditions";
            } elseif ($id == 7) {
                $pathimg = "pharmacy/noworks";
            } elseif ($id == 8) {
                $pathimg = "pharmacy/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "pharmacy/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "pharmacy/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "pharmacy/recruitments";
            } elseif ($id == 12) {
                $pathimg = "pharmacy/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "pharmacy/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "pharmacy/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "pharmacy/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "pharmacy/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "pharmacy/professionlicens";
            }
        } elseif ($unionid == 2) {
            if ($id == 1) {
                $pathimg = "teeth/renewals";
            } elseif ($id == 2) {
                $pathimg = "teeth/alternatives";
            } elseif ($id == 3) {
                $pathimg = "teeth/treatments";
            } elseif ($id == 4) {
                $pathimg = "teeth/educationfees";
            } elseif ($id == 5) {
                $pathimg = "teeth/diseases";
            } elseif ($id == 6) {
                $pathimg = "teeth/conditions";
            } elseif ($id == 7) {
                $pathimg = "teeth/noworks";
            } elseif ($id == 8) {
                $pathimg = "teeth/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "teeth/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "teeth/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "teeth/recruitments";
            } elseif ($id == 12) {
                $pathimg = "teeth/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "teeth/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "teeth/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "teeth/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "teeth/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "teeth/professionlicens";
            }
        } elseif ($unionid == 3) {
            if ($id == 1) {
                $pathimg = "human/renewals";
            } elseif ($id == 2) {
                $pathimg = "human/alternatives";
            } elseif ($id == 3) {
                $pathimg = "human/treatments";
            } elseif ($id == 4) {
                $pathimg = "human/educationfees";
            } elseif ($id == 5) {
                $pathimg = "human/diseases";
            } elseif ($id == 6) {
                $pathimg = "human/conditions";
            } elseif ($id == 7) {
                $pathimg = "human/noworks";
            } elseif ($id == 8) {
                $pathimg = "human/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "human/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "human/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "human/recruitments";
            } elseif ($id == 12) {
                $pathimg = "human/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "human/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "human/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "human/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "human/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "human/professionlicens";
            }
        } elseif ($unionid == 4) {
            if ($id == 1) {
                $pathimg = "veterinary/renewals";
            } elseif ($id == 2) {
                $pathimg = "veterinary/alternatives";
            } elseif ($id == 3) {
                $pathimg = "veterinary/treatments";
            } elseif ($id == 4) {
                $pathimg = "veterinary/educationfees";
            } elseif ($id == 5) {
                $pathimg = "veterinary/diseases";
            } elseif ($id == 6) {
                $pathimg = "veterinary/conditions";
            } elseif ($id == 7) {
                $pathimg = "veterinary/noworks";
            } elseif ($id == 8) {
                $pathimg = "veterinary/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "veterinary/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "veterinary/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "veterinary/recruitments";
            } elseif ($id == 12) {
                $pathimg = "veterinary/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "veterinary/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "veterinary/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "veterinary/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "veterinary/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "veterinary/professionlicens";
            }
        }

        if ($id == 1) {
            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',

            ], [
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Renewal::create([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);

            $user->services()->attach($id);

        } elseif ($id == 2) {

            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'recept' => 'required|image',
                'cost' => 'required|image',
            ], [
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'recept.required' => "يرجي رفع الصوره المطلوبة",
                'recept.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathrecept = Storage::disk('uploads')->put($pathimg, $request->recept);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Alternative::create([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'recept' => $pathrecept,
                'cost' => $pathcost,

            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 3) {
            $request->validate([
                'report' => 'required|image',
                'personal_card' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'report.required' => "يرجي رفع الصوره المطلوبة",
                'report.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Treatment::create([
                'user_id' => $userid,
                'report' => $pathreport,
                'personal_card' => $pathpersonal_card,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            $user = User::findOrfail($userid);
            $user->services()->attach($id);

        } elseif ($id == 4) {
            $request->validate([
                'birth' => 'required|image',
                'edu_certificate' => 'required|image',
                'salary' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'birth.required' => "يرجي رفع الصوره المطلوبة",
                'birth.image' => "يرجي رفع الصوره المطلوبة",
                'edu_certificate.required' => "يرجي رفع الصوره المطلوبة",
                'edu_certificate.image' => "يرجي رفع الصوره المطلوبة",
                'salary.required' => "يرجي رفع الصوره المطلوبة",
                'salary.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            $pathedu_certificate = Storage::disk('uploads')->put($pathimg, $request->edu_certificate);
            $pathsalary = Storage::disk('uploads')->put($pathimg, $request->salary);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Educationfee::create([
                'user_id' => $userid,
                'birth' => $pathbirth,
                'edu_certificate' => $pathedu_certificate,
                'salary' => $pathsalary,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 5) {
            $request->validate([
                'report' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'report.required' => "يرجي رفع الصوره المطلوبة",
                'report.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Disease::create([
                'user_id' => $userid,
                'report' => $pathreport,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 6) {
            $request->validate([
                'police_certificae' => 'required|image',
                'wedding' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'police_certificae.required' => "يرجي رفع الصوره المطلوبة",
                'police_certificae.image' => "يرجي رفع الصوره المطلوبة",
                'wedding.required' => "يرجي رفع الصوره المطلوبة",
                'wedding.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $pathpolice_certificae = Storage::disk('uploads')->put($pathimg, $request->police_certificae);
            $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Condition::create([
                'user_id' => $userid,
                'police_certificae' => $pathpolice_certificae,
                'wedding' => $pathwedding,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 7) {
            $request->validate([
                'disclaimer' => 'required|image',
                'fulltime' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'ministry' => 'required|image',
                'endServ' => 'required|image',
                'brent' => 'required|image',
                'Insurance' => 'required|image',
                'cost' => 'required|image',
            ], [
                'disclaimer.required' => "يرجي رفع الصوره المطلوبة",
                'disclaimer.image' => "يرجي رفع الصوره المطلوبة",
                'fulltime.required' => "يرجي رفع الصوره المطلوبة",
                'fulltime.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'ministry.required' => "يرجي رفع الصوره المطلوبة",
                'ministry.image' => "يرجي رفع الصوره المطلوبة",
                'endServ.required' => "يرجي رفع الصوره المطلوبة",
                'endServ.image' => "يرجي رفع الصوره المطلوبة",
                'brent.required' => "يرجي رفع الصوره المطلوبة",
                'brent.image' => "يرجي رفع الصوره المطلوبة",
                'Insurance.required' => "يرجي رفع الصوره المطلوبة",
                'Insurance.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathdisclaimer = Storage::disk('uploads')->put($pathimg, $request->disclaimer);
            $pathfulltime = Storage::disk('uploads')->put($pathimg, $request->fulltime);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathministry = Storage::disk('uploads')->put($pathimg, $request->ministry);
            $pathendServ = Storage::disk('uploads')->put($pathimg, $request->endServ);
            $pathbrent = Storage::disk('uploads')->put($pathimg, $request->brent);
            $pathInsurance = Storage::disk('uploads')->put($pathimg, $request->Insurance);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Nowork::create([
                'user_id' => $userid,
                'disclaimer' => $pathdisclaimer,
                'fulltime' => $pathfulltime,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'ministry' => $pathministry,
                'endServ' => $pathendServ,
                'brent' => $pathbrent,
                'Insurance' => $pathInsurance,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 8) {
            $request->validate([
                'health' => 'required|image',
                'card' => 'required|image',
                'attorney' => 'required|image',
                'cost' => 'required|image',
            ], [
                'health.required' => "يرجي رفع الصوره المطلوبة",
                'health.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'attorney.required' => "يرجي رفع الصوره المطلوبة",
                'attorney.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathhealth = Storage::disk('uploads')->put($pathimg, $request->health);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathattorney = Storage::disk('uploads')->put($pathimg, $request->attorney);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Evictioncert::create([
                'user_id' => $userid,
                'health' => $pathhealth,
                'card' => $pathcard,
                'attorney' => $pathattorney,
                'pathcost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 9) {
            $request->validate([
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'License' => 'required|image',
                'recruitment' => 'required|image',
                'assignment' => 'required|image',
                'statement' => 'required|image',
                'movements' => 'required|image',
                'cost' => 'required|image',
            ], [
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'License.required' => "يرجي رفع الصوره المطلوبة",
                'License.image' => "يرجي رفع الصوره المطلوبة",
                'recruitment.required' => "يرجي رفع الصوره المطلوبة",
                'recruitment.image' => "يرجي رفع الصوره المطلوبة",
                'assignment.required' => "يرجي رفع الصوره المطلوبة",
                'assignment.image' => "يرجي رفع الصوره المطلوبة",
                'statement.required' => "يرجي رفع الصوره المطلوبة",
                'statement.image' => "يرجي رفع الصوره المطلوبة",
                'movements.required' => "يرجي رفع الصوره المطلوبة",
                'movements.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathLicense = Storage::disk('uploads')->put($pathimg, $request->License);
            $pathrecruitment = Storage::disk('uploads')->put($pathimg, $request->recruitment);
            $pathassignment = Storage::disk('uploads')->put($pathimg, $request->assignment);
            $pathstatement = Storage::disk('uploads')->put($pathimg, $request->statement);
            $pathmovements = Storage::disk('uploads')->put($pathimg, $request->movements);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Experiencecert::create([
                'user_id' => $userid,
                'personal_card' => $pathpersonal_card,
                'card' => $pathcard,
                'License' => $pathLicense,
                'recruitment' => $pathrecruitment,
                'assignment' => $pathassignment,
                'statement' => $pathstatement,
                'movements' => $pathmovements,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 10) {
            $request->validate([
                'contract' => 'required|image',
                'engineer' => 'required|image',
                'receipt' => 'required|image',
                'tax_card' => 'required|image',
                'approval' => 'required|image',
                'presonal' => 'required|image',
                'cost' => 'required|image',
            ], [
                'contract.required' => "يرجي رفع الصوره المطلوبة",
                'contract.image' => "يرجي رفع الصوره المطلوبة",
                'engineer.required' => "يرجي رفع الصوره المطلوبة",
                'engineer.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'tax_card.required' => "يرجي رفع الصوره المطلوبة",
                'tax_card.image' => "يرجي رفع الصوره المطلوبة",
                'approval.required' => "يرجي رفع الصوره المطلوبة",
                'approval.image' => "يرجي رفع الصوره المطلوبة",
                'presonal.required' => "يرجي رفع الصوره المطلوبة",
                'presonal.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $pathcontract = Storage::disk('uploads')->put($pathimg, $request->contract);
            $pathengineer = Storage::disk('uploads')->put($pathimg, $request->engineer);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathtax_card = Storage::disk('uploads')->put($pathimg, $request->tax_card);
            $pathapproval = Storage::disk('uploads')->put($pathimg, $request->approval);
            $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->presonal);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Clinicscert::create([
                'user_id' => $userid,
                'contract' => $pathcontract,
                'engineer' => $pathengineer,
                'receipt' => $pathreceipt,
                'tax_card' => $pathtax_card,
                'approval' => $pathapproval,
                'presonal' => $pathpresonal,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 11) {
            $request->validate([
                'recruitment' => 'required|image',
                'army_card' => 'required|image',
                'card' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'recruitment.required' => "يرجي رفع الصوره المطلوبة",
                'recruitment.image' => "يرجي رفع الصوره المطلوبة",
                'army_card.required' => "يرجي رفع الصوره المطلوبة",
                'army_card.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathrecruitment = Storage::disk('uploads')->put($pathimg, $request->recruitment);
            $patharmy_card = Storage::disk('uploads')->put($pathimg, $request->army_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Recruitment::create([
                'user_id' => $userid,
                'recruitment' => $pathrecruitment,
                'army_card' => $patharmy_card,
                'card' => $pathcard,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 12) {
            $request->validate([
                'temporary' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'temporary.required' => "يرجي رفع الصوره المطلوبة",
                'temporary.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathtemporary = Storage::disk('uploads')->put($pathimg, $request->temporary);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Consultantcard::create([
                'user_id' => $userid,
                'temporary' => $pathtemporary,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 13) {
            $request->validate([
                'master' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ], [
                'master.required' => "يرجي رفع الصوره المطلوبة",
                'master.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathmaster = Storage::disk('uploads')->put($pathimg, $request->master);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Specialistcard::create([
                'user_id' => $userid,
                'master' => $pathmaster,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 14) {
            $request->validate([
                'model' => 'required|image',
                'graduation' => 'required|image',
                'excellence' => 'required|image',
                'birth' => 'required|image',
                'personal' => 'required|image',
                'fesh' => 'required|image',
                'situation' => 'required|image',
                'receipt' => 'required|image',
                'certificate' => 'image',
                'cost' => 'required|image',
            ], [
                'model.required' => "يرجي رفع الصوره المطلوبة",
                'model.image' => "يرجي رفع الصوره المطلوبة",
                'graduation.required' => "يرجي رفع الصوره المطلوبة",
                'graduation.image' => "يرجي رفع الصوره المطلوبة",
                'excellence.required' => "يرجي رفع الصوره المطلوبة",
                'excellence.image' => "يرجي رفع الصوره المطلوبة",
                'birth.required' => "يرجي رفع الصوره المطلوبة",
                'birth.image' => "يرجي رفع الصوره المطلوبة",
                'personal.required' => "يرجي رفع الصوره المطلوبة",
                'personal.image' => "يرجي رفع الصوره المطلوبة",
                'fesh.required' => "يرجي رفع الصوره المطلوبة",
                'fesh.image' => "يرجي رفع الصوره المطلوبة",
                'situation.required' => "يرجي رفع الصوره المطلوبة",
                'situation.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'certificate.required' => "يرجي رفع الصوره المطلوبة",
                'certificate.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathmodel = Storage::disk('uploads')->put($pathimg, $request->model);
            $pathgraduation = Storage::disk('uploads')->put($pathimg, $request->graduation);
            $pathexcellence = Storage::disk('uploads')->put($pathimg, $request->excellence);
            $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            $pathfesh = Storage::disk('uploads')->put($pathimg, $request->fesh);
            $pathsituation = Storage::disk('uploads')->put($pathimg, $request->situation);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Professionlicense::create([
                'user_id' => $userid,
                'model' => $pathmodel,
                'graduation' => $pathgraduation,
                'excellence' => $pathexcellence,
                'birth' => $pathbirth,
                'personal' => $pathpersonal,
                'fesh' => $pathfesh,
                'situation' => $pathsituation,
                'receipt' => $pathreceipt,
                'certificate' => $pathcertificate,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 15) {
            $request->validate([
                'contract' => 'required|image',
                'certificate' => 'required|image',
                'card' => 'required|image',
                'building' => 'required|image',
                'recipe' => 'required|image',
                'device' => 'required|image',
                'purchase' => 'required|image',
                'license' => 'required|image',
                'cost' => 'required|image',
            ], [
                'contract.required' => "يرجي رفع الصوره المطلوبة",
                'contract.image' => "يرجي رفع الصوره المطلوبة",
                'certificate.required' => "يرجي رفع الصوره المطلوبة",
                'certificate.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'building.required' => "يرجي رفع الصوره المطلوبة",
                'building.image' => "يرجي رفع الصوره المطلوبة",
                'device.required' => "يرجي رفع الصوره المطلوبة",
                'device.image' => "يرجي رفع الصوره المطلوبة",
                'purchase.required' => "يرجي رفع الصوره المطلوبة",
                'purchase.image' => "يرجي رفع الصوره المطلوبة",
                'license.required' => "يرجي رفع الصوره المطلوبة",
                'license.required' => "يرجي رفع الصوره المطلوبة",
                'recipe.required' => "يرجي رفع الصوره المطلوبة",
                'recipe.required' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathcontract = Storage::disk('uploads')->put($pathimg, $request->contract);
            $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathbuilding = Storage::disk('uploads')->put($pathimg, $request->building);
            $pathrecipe = Storage::disk('uploads')->put($pathimg, $request->recipe);
            $pathdevice = Storage::disk('uploads')->put($pathimg, $request->device);
            $pathpurchase = Storage::disk('uploads')->put($pathimg, $request->purchase);
            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Privateclinic::create([
                'user_id' => $userid,
                'contract' => $pathcontract,
                'certificate' => $pathcertificate,
                'card' => $pathcard,
                'building' => $pathbuilding,
                'recipe' => $pathrecipe,
                'device' => $pathdevice,
                'purchase' => $pathpurchase,
                'license' => $pathlicense,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 16) {
            $request->validate([
                'registration' => 'required|image',
                'personal_card' => 'required|image',
                'specialty' => 'required|image',
                'card' => 'required|image',
                'receipt' => 'required|image',
                'personal' => 'required|image',
                'experience' => 'required|image',
                'fellowship' => 'required|image',
                'Professional' => 'required|image',
                'cost' => 'required|image',
            ], [
                'registration.required' => "يرجي رفع الصوره المطلوبة",
                'registration.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'specialty.required' => "يرجي رفع الصوره المطلوبة",
                'specialty.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'presonal.required' => "يرجي رفع الصوره المطلوبة",
                'presonal.image' => "يرجي رفع الصوره المطلوبة",
                'experience.required' => "يرجي رفع الصوره المطلوبة",
                'experience.required' => "يرجي رفع الصوره المطلوبة",
                'fellowship.required' => "يرجي رفع الصوره المطلوبة",
                'fellowship.required' => "يرجي رفع الصوره المطلوبة",
                'Professional.required' => "يرجي رفع الصوره المطلوبة",
                'Professional.required' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $pathregistration = Storage::disk('uploads')->put($pathimg, $request->registration);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathspecialty = Storage::disk('uploads')->put($pathimg, $request->specialty);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            $pathexperience = Storage::disk('uploads')->put($pathimg, $request->experience);
            $pathfellowship = Storage::disk('uploads')->put($pathimg, $request->fellowship);
            $pathProfessional = Storage::disk('uploads')->put($pathimg, $request->Professional);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Specialiststable::create([
                'user_id' => $userid,
                'registration' => $pathregistration,
                'personal_card' => $pathpersonal_card,
                'specialty' => $pathspecialty,
                'card' => $pathcard,
                'receipt' => $pathreceipt,
                'personal' => $pathpresonal,
                'experience' => $pathexperience,
                'fellowship' => $pathfellowship,
                'Professional' => $pathProfessional,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        } elseif ($id == 17) {
            $request->validate([
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'license' => 'required|image',
                'passport' => 'image',
                'personal' => 'required|image',
                'cost' => 'required|image',
            ]);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            $pathpassport = Storage::disk('uploads')->put($pathimg, $request->passport);
            $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Professionlicen::create([
                'user_id' => $userid,
                'personal_card' => $pathpersonal_card,
                'card' => $pathcard,
                'license' => $pathlicense,
                'passport' => $pathpassport,
                'personal' => $pathpresonal,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }

        $request->session()->flash('success', 'تم طلب الخدمة بنجاح وفي انتظار مراجعة طلبك');
        return redirect(url("/member/myservice"));
    }
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    public function update($id, Request $request)
    {
        $loggedUser = User::where('id', '=', Auth::user()->id)->first();

        $unionid = $loggedUser->union_id;
        $userid = $loggedUser->id;

        $service = Service::where('id', '=', $id)->first();
        $servicename = $service->namear;

        if ($unionid == 1) {
            if ($id == 1) {
                $pathimg = "pharmacy/renewals";
            } elseif ($id == 2) {
                $pathimg = "pharmacy/alternatives";
            } elseif ($id == 3) {
                $pathimg = "pharmacy/treatments";
            } elseif ($id == 4) {
                $pathimg = "pharmacy/educationfees";
            } elseif ($id == 5) {
                $pathimg = "pharmacy/diseases";
            } elseif ($id == 6) {
                $pathimg = "pharmacy/conditions";
            } elseif ($id == 7) {
                $pathimg = "pharmacy/noworks";
            } elseif ($id == 8) {
                $pathimg = "pharmacy/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "pharmacy/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "pharmacy/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "pharmacy/recruitments";
            } elseif ($id == 12) {
                $pathimg = "pharmacy/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "pharmacy/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "pharmacy/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "pharmacy/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "pharmacy/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "pharmacy/professionlicens";
            }
        } elseif ($unionid == 2) {
            if ($id == 1) {
                $pathimg = "teeth/renewals";
            } elseif ($id == 2) {
                $pathimg = "teeth/alternatives";
            } elseif ($id == 3) {
                $pathimg = "teeth/treatments";
            } elseif ($id == 4) {
                $pathimg = "teeth/educationfees";
            } elseif ($id == 5) {
                $pathimg = "teeth/diseases";
            } elseif ($id == 6) {
                $pathimg = "teeth/conditions";
            } elseif ($id == 7) {
                $pathimg = "teeth/noworks";
            } elseif ($id == 8) {
                $pathimg = "teeth/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "teeth/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "teeth/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "teeth/recruitments";
            } elseif ($id == 12) {
                $pathimg = "teeth/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "teeth/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "teeth/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "teeth/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "teeth/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "teeth/professionlicens";
            }
        } elseif ($unionid == 3) {
            if ($id == 1) {
                $pathimg = "human/renewals";
            } elseif ($id == 2) {
                $pathimg = "human/alternatives";
            } elseif ($id == 3) {
                $pathimg = "human/treatments";
            } elseif ($id == 4) {
                $pathimg = "human/educationfees";
            } elseif ($id == 5) {
                $pathimg = "human/diseases";
            } elseif ($id == 6) {
                $pathimg = "human/conditions";
            } elseif ($id == 7) {
                $pathimg = "human/noworks";
            } elseif ($id == 8) {
                $pathimg = "human/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "human/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "human/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "human/recruitments";
            } elseif ($id == 12) {
                $pathimg = "human/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "human/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "human/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "human/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "human/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "human/professionlicens";
            }
        } elseif ($unionid == 4) {
            if ($id == 1) {
                $pathimg = "veterinary/renewals";
            } elseif ($id == 2) {
                $pathimg = "veterinary/alternatives";
            } elseif ($id == 3) {
                $pathimg = "veterinary/treatments";
            } elseif ($id == 4) {
                $pathimg = "veterinary/educationfees";
            } elseif ($id == 5) {
                $pathimg = "veterinary/diseases";
            } elseif ($id == 6) {
                $pathimg = "veterinary/conditions";
            } elseif ($id == 7) {
                $pathimg = "veterinary/noworks";
            } elseif ($id == 8) {
                $pathimg = "veterinary/evictioncerts";
            } elseif ($id == 9) {
                $pathimg = "veterinary/experiencecerts";
            } elseif ($id == 10) {
                $pathimg = "veterinary/clinicscerts";
            } elseif ($id == 11) {
                $pathimg = "veterinary/recruitments";
            } elseif ($id == 12) {
                $pathimg = "veterinary/consultantcards";
            } elseif ($id == 13) {
                $pathimg = "veterinary/specialistcards";
            } elseif ($id == 14) {
                $pathimg = "veterinary/professionlicenses";
            } elseif ($id == 15) {
                $pathimg = "veterinary/privateclinics";
            } elseif ($id == 16) {
                $pathimg = "veterinary/specialiststables";
            } elseif ($id == 17) {
                $pathimg = "veterinary/professionlicens";
            }
        }

        if ($id == 1) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'cost' => 'nullable|image',
            ], [
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $servicedata = Renewal::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'cost' => $pathcost,

            ]);
            if (!$request->card == null || !$request->personal_card == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 2) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'recept' => 'nullable|image',
                'cost' => 'nullable|image',
            ], [
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'recept.required' => "يرجي رفع الصوره المطلوبة",
                'recept.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);

            $servicedata = Alternative::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathrecept = $servicedata->recept;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('recept')) {
                Storage::disk('uploads')->delete($pathrecept);
                $pathrecept = Storage::disk('uploads')->put($pathimg, $request->recept);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'recept' => $pathrecept,
                'cost' => $pathcost,
            ]);

            if (!$request->card == null || !$request->personal_card == null || !$request->recept == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 3) {
            $request->validate([
                'report' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ], [
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'receipt.required' => "يرجي رفع الصوره المطلوبة",
                'receipt.image' => "يرجي رفع الصوره المطلوبة",
                'report.required' => "يرجي رفع الصوره المطلوبة",
                'report.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $servicedata = Treatment::where('user_id', '=', $userid)->first();
            $pathreport = $servicedata->report;
            $pathpersonal_card = $servicedata->personal_card;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'report' => $pathreport,
                'personal_card' => $pathpersonal_card,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->report == null || !$request->personal_card == null || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 4) {
            $request->validate([
                'birth' => 'nullable|image',
                'edu_certificate' => 'nullable|image',
                'salary' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Educationfee::where('user_id', '=', $userid)->first();
            $pathbirth = $servicedata->birth;
            $pathedu_certificate = $servicedata->edu_certificate;
            $pathsalary = $servicedata->salary;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('birth')) {
                Storage::disk('uploads')->delete($pathbirth);
                $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('edu_certificate')) {
                Storage::disk('uploads')->delete($pathedu_certificate);
                $pathedu_certificate = Storage::disk('uploads')->put($pathimg, $request->edu_certificate);
            }

            if ($request->hasFile('salary')) {
                Storage::disk('uploads')->delete($pathsalary);
                $pathsalary = Storage::disk('uploads')->put($pathimg, $request->salary);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'birth' => $pathbirth,
                'edu_certificate' => $pathedu_certificate,
                'salary' => $pathsalary,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->birth == null || !$request->edu_certificate == null || !$request->salary == null || !$request->receipt == null ||
                !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 5) {
            $request->validate([
                'report' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Disease::where('user_id', '=', $userid)->first();
            $pathreport = $servicedata->report;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'report' => $pathreport,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->report == null || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 6) {
            $request->validate([
                'police_certificae' => 'nullable|image',
                'wedding' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Condition::where('user_id', '=', $userid)->first();
            $pathpolice_certificae = $servicedata->police_certificae;
            $pathwedding = $servicedata->wedding;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('police_certificae')) {
                Storage::disk('uploads')->delete($pathpolice_certificae);
                $pathpolice_certificae = Storage::disk('uploads')->put($pathimg, $request->police_certificae);
            }

            if ($request->hasFile('wedding')) {
                Storage::disk('uploads')->delete($pathwedding);
                $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'police_certificae' => $pathpolice_certificae,
                'wedding' => $pathwedding,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->police_certificae == null || !$request->wedding == null || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 7) {
            $request->validate([
                'disclaimer' => 'nullable|image',
                'fulltime' => 'nullable|image',
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'ministry' => 'nullable|image',
                'endServ' => 'nullable|image',
                'brent' => 'nullable|image',
                'Insurance' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Nowork::where('user_id', '=', $userid)->first();
            $pathdisclaimer = $servicedata->disclaimer;
            $pathfulltime = $servicedata->fulltime;
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathministry = $servicedata->ministry;
            $pathendServ = $servicedata->endServ;
            $pathbrent = $servicedata->brent;
            $pathInsurance = $servicedata->Insurance;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('ministry')) {
                Storage::disk('uploads')->delete($pathministry);
                $pathministry = Storage::disk('uploads')->put($pathimg, $request->ministry);
            }

            if ($request->hasFile('endServ')) {
                Storage::disk('uploads')->delete($pathendServ);
                $pathendServ = Storage::disk('uploads')->put($pathimg, $request->endServ);
            }

            if ($request->hasFile('brent')) {
                Storage::disk('uploads')->delete($pathbrent);
                $pathbrent = Storage::disk('uploads')->put($pathimg, $request->brent);
            }

            if ($request->hasFile('Insurance')) {
                Storage::disk('uploads')->delete($pathInsurance);
                $pathInsurance = Storage::disk('uploads')->put($pathimg, $request->Insurance);
            }

            if ($request->hasFile('disclaimer')) {
                Storage::disk('uploads')->delete($pathdisclaimer);
                $pathdisclaimer = Storage::disk('uploads')->put($pathimg, $request->disclaimer);
            }

            if ($request->hasFile('fulltime')) {
                Storage::disk('uploads')->delete($pathfulltime);
                $pathfulltime = Storage::disk('uploads')->put($pathimg, $request->fulltime);
            }

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'disclaimer' => $pathdisclaimer,
                'fulltime' => $pathfulltime,
                'card' => $pathcard,
                'brent' => $pathbrent,
                'personal_card' => $pathpersonal_card,
                'ministry' => $pathministry,
                'endServ' => $pathendServ,
                'Insurance' => $pathInsurance,
                'cost' => $pathcost,
            ]);
            if (!$request->disclaimer == null || !$request->fulltime == null || !$request->card == null || !$request->cost == null ||
                !$request->brent == null || !$request->personal_card == null || !$request->ministry == null || !$request->endServ == null ||
                !$request->Insurance == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 8) {
            $request->validate([
                'health' => 'nullable|image',
                'card' => 'nullable|image',
                'attorney' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Evictioncert::where('user_id', '=', $userid)->first();
            $pathhealth = $servicedata->health;
            $pathcard = $servicedata->card;
            $pathattorney = $servicedata->attorney;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('health')) {
                Storage::disk('uploads')->delete($pathhealth);
                $pathhealth = Storage::disk('uploads')->put($pathimg, $request->health);
            }

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('attorney')) {
                Storage::disk('uploads')->delete($pathattorney);
                $pathattorney = Storage::disk('uploads')->put($pathimg, $request->attorney);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'health' => $pathhealth,
                'card' => $pathcard,
                'attorney' => $pathattorney,
                'cost' => $pathcost,
            ]);
            if (!$request->health == null || !$request->card == null || !$request->attorney == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 9) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'License' => 'nullable|image',
                'recruitment' => 'nullable|image',
                'assignment' => 'nullable|image',
                'statement' => 'nullable|image',
                'movements' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Experiencecert::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathLicense = $servicedata->License;
            $pathrecruitment = $servicedata->recruitment;
            $pathassignment = $servicedata->assignment;
            $pathstatement = $servicedata->statement;
            $pathmovements = $servicedata->movements;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('License')) {
                Storage::disk('uploads')->delete($pathLicense);
                $pathLicense = Storage::disk('uploads')->put($pathimg, $request->License);
            }

            if ($request->hasFile('recruitment')) {
                Storage::disk('uploads')->delete($pathrecruitment);
                $pathrecruitment = Storage::disk('uploads')->put($pathimg, $request->recruitment);
            }

            if ($request->hasFile('assignment')) {
                Storage::disk('uploads')->delete($pathassignment);
                $pathassignment = Storage::disk('uploads')->put($pathimg, $request->assignment);
            }

            if ($request->hasFile('statement')) {
                Storage::disk('uploads')->delete($pathstatement);
                $pathstatement = Storage::disk('uploads')->put($pathimg, $request->statement);
            }

            if ($request->hasFile('movements')) {
                Storage::disk('uploads')->delete($pathmovements);
                $pathmovements = Storage::disk('uploads')->put($pathimg, $request->movements);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'License' => $pathLicense,
                'recruitment' => $pathrecruitment,
                'assignment' => $pathassignment,
                'statement' => $pathstatement,
                'movements' => $pathmovements,
                'cost' => $pathcost,
            ]);
            if (!$request->card == null || !$request->personal_card == null || !$request->License == null || !$request->cost == null ||
                !$request->recruitment == null || !$request->assignment == null || !$request->statement == null || !$request->movements == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 10) {
            $request->validate([
                'contract' => 'nullable|image',
                'engineer' => 'nullable|image',
                'receipt' => 'nullable|image',
                'tax_card' => 'nullable|image',
                'approval' => 'nullable|image',
                'presonal' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Clinicscert::where('user_id', '=', $userid)->first();
            $pathcontract = $servicedata->contract;
            $pathengineer = $servicedata->engineer;
            $pathreceipt = $servicedata->receipt;
            $pathtax_card = $servicedata->tax_card;
            $pathapproval = $servicedata->approval;
            $pathpresonal = $servicedata->presonal;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('tax_card')) {
                Storage::disk('uploads')->delete($pathtax_card);
                $pathtax_card = Storage::disk('uploads')->put($pathimg, $request->tax_card);
            }

            if ($request->hasFile('approval')) {
                Storage::disk('uploads')->delete($pathapproval);
                $pathapproval = Storage::disk('uploads')->put($pathimg, $request->approval);
            }

            if ($request->hasFile('presonal')) {
                Storage::disk('uploads')->delete($pathpresonal);
                $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->presonal);
            }

            if ($request->hasFile('contract')) {
                Storage::disk('uploads')->delete($pathcontract);
                $pathcontract = Storage::disk('uploads')->put($pathimg, $request->contract);
            }

            if ($request->hasFile('engineer')) {
                Storage::disk('uploads')->delete($pathengineer);
                $pathengineer = Storage::disk('uploads')->put($pathimg, $request->engineer);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'contract' => $pathcontract,
                'engineer' => $pathengineer,
                'receipt' => $pathreceipt,
                'tax_card' => $pathtax_card,
                'approval' => $pathcost,
                'presonal' => $pathpresonal,
                'cost' => $pathcost,
            ]);
            if (!$request->contract == null || !$request->engineer == null || !$request->receipt == null || !$request->cost == null ||
                !$request->tax_card == null || !$request->approval == null || !$request->presonal == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 11) {

            $request->validate([
                'recruitment' => 'nullable|image',
                'army_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'card' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Recruitment::where('user_id', '=', $userid)->first();
            $pathrecruitment = $servicedata->recruitment;
            $patharmy_card = $servicedata->army_card;
            $pathreceipt = $servicedata->receipt;
            $pathcard = $servicedata->card;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('recruitment')) {
                Storage::disk('uploads')->delete($pathrecruitment);
                $pathrecruitment = Storage::disk('uploads')->put($pathimg, $request->recruitment);
            }

            if ($request->hasFile('army_card')) {
                Storage::disk('uploads')->delete($patharmy_card);
                $patharmy_card = Storage::disk('uploads')->put($pathimg, $request->army_card);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'recruitment' => $pathrecruitment,
                'army_card' => $patharmy_card,
                'receipt' => $pathreceipt,
                'card' => $pathcard,
                'cost' => $pathcost,
            ]);
            if (!$request->recruitment == null || !$request->army_card == null || !$request->receipt == null ||
                !$request->card == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 12) {
            $request->validate([
                'temporary' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Consultantcard::where('user_id', '=', $userid)->first();
            $pathtemporary = $servicedata->temporary;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('temporary')) {
                Storage::disk('uploads')->delete($pathtemporary);
                $pathtemporary = Storage::disk('uploads')->put($pathimg, $request->temporary);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'temporary' => $pathtemporary,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->temporary == null || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 13) {
            $request->validate([
                'master' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            $servicedata = Specialistcard::where('user_id', '=', $userid)->first();
            $pathmaster = $servicedata->master;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('master')) {
                Storage::disk('uploads')->delete($pathmaster);
                $pathmaster = Storage::disk('uploads')->put($pathimg, $request->master);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'master' => $pathmaster,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->master == null || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 14) {
            $request->validate([
                'model' => 'nullable|image',
                'graduation' => 'nullable|image',
                'receipt' => 'nullable|image',
                'excellence' => 'nullable|image',
                'birth' => 'nullable|image',
                'personal' => 'nullable|image',
                'fesh' => 'nullable|image',
                'situation' => 'nullable|image',
                'certificate' => 'nullable|image',
                'cost' => 'nullable|image',

            ]);
            $servicedata = Professionlicense::where('user_id', '=', $userid)->first();
            $pathmodel = $servicedata->model;
            $pathgraduation = $servicedata->graduation;
            $pathreceipt = $servicedata->receipt;
            $pathexcellence = $servicedata->excellence;
            $pathbirth = $servicedata->birth;
            $pathpersonal = $servicedata->personal;
            $pathfesh = $servicedata->fesh;
            $pathsituation = $servicedata->situation;
            $pathcertificate = $servicedata->certificate;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('model')) {
                Storage::disk('uploads')->delete($pathmodel);
                $pathmodel = Storage::disk('uploads')->put($pathimg, $request->model);
            }

            if ($request->hasFile('graduation')) {
                Storage::disk('uploads')->delete($pathgraduation);
                $pathgraduation = Storage::disk('uploads')->put($pathimg, $request->graduation);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('excellence')) {
                Storage::disk('uploads')->delete($pathexcellence);
                $pathexcellence = Storage::disk('uploads')->put($pathimg, $request->excellence);
            }
            if ($request->hasFile('birth')) {
                Storage::disk('uploads')->delete($pathbirth);
                $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            }

            if ($request->hasFile('personal')) {
                Storage::disk('uploads')->delete($pathpersonal);
                $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            }

            if ($request->hasFile('fesh')) {
                Storage::disk('uploads')->delete($pathfesh);
                $pathfesh = Storage::disk('uploads')->put($pathimg, $request->fesh);
            }

            if ($request->hasFile('situation')) {
                Storage::disk('uploads')->delete($pathsituation);
                $pathsituation = Storage::disk('uploads')->put($pathimg, $request->situation);
            }

            if ($request->hasFile('certificate')) {
                Storage::disk('uploads')->delete($pathcertificate);
                $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'model' => $pathmodel,
                'graduation' => $pathgraduation,
                'receipt' => $pathreceipt,
                'excellence' => $pathexcellence,
                'birth' => $pathbirth,
                'personal' => $pathpersonal,
                'fesh' => $pathfesh,
                'situation' => $pathsituation,
                'certificate' => $pathcertificate,
                'cost' => $pathcost,
            ]);
            if (!$request->model == null || !$request->graduation == null || !$request->receipt == null || !$request->cost == null ||
                !$request->excellence == null || !$request->birth == null || !$request->personal == null ||
                !$request->fesh == null || !$request->situation == null || !$request->certificate == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 15) {

            $request->validate([
                'contract' => 'nullable|image',
                'receipt' => 'nullable|image',
                'certificate' => 'nullable|image',
                'card' => 'nullable|image',
                'building' => 'nullable|image',
                'device' => 'nullable|image',
                'purchase' => 'nullable|image',
                'license' => 'nullable|image',
                'cost' => 'nullable|image',

            ]);
            $servicedata = Privateclinic::where('user_id', '=', $userid)->first();
            $pathcontract = $servicedata->contract;
            $pathreceipt = $servicedata->receipt;
            $pathcertificate = $servicedata->certificate;
            $pathcard = $servicedata->card;
            $pathbuilding = $servicedata->building;
            $pathdevice = $servicedata->device;
            $pathpurchase = $servicedata->purchase;
            $pathlicense = $servicedata->license;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('contract')) {
                Storage::disk('uploads')->delete($pathcontract);
                $pathcontract = Storage::disk('uploads')->put($pathimg, $request->contract);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('certificate')) {
                Storage::disk('uploads')->delete($pathcertificate);
                $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            }

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }
            if ($request->hasFile('building')) {
                Storage::disk('uploads')->delete($pathbuilding);
                $pathbuilding = Storage::disk('uploads')->put($pathimg, $request->building);
            }
            if ($request->hasFile('device')) {
                Storage::disk('uploads')->delete($pathdevice);
                $pathdevice = Storage::disk('uploads')->put($pathimg, $request->device);
            }
            if ($request->hasFile('purchase')) {
                Storage::disk('uploads')->delete($pathpurchase);
                $pathpurchase = Storage::disk('uploads')->put($pathimg, $request->purchase);
            }
            if ($request->hasFile('license')) {
                Storage::disk('uploads')->delete($pathlicense);
                $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            }
            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'contract' => $pathcontract,
                'receipt' => $pathreceipt,
                'certificate' => $pathcertificate,
                'card' => $pathcard,
                'building' => $pathbuilding,
                'device' => $pathdevice,
                'purchase' => $pathpurchase,
                'license' => $pathlicense,
                'cost' => $pathcost,

            ]);
            if (!$request->contract == null || !$request->receipt == null || !$request->certificate == null || !$request->cost == null ||
                !$request->building == null || !$request->device == null || !$request->purchase == null ||
                !$request->card == null || !$request->license == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 16) {

            $request->validate([
                'registration' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'card' => 'nullable|image',
                'specialty' => 'nullable|image',
                'personal' => 'nullable|image',
                'receipt' => 'nullable|image',
                'experience' => 'nullable|image',
                'fellowship' => 'nullable|image',
                'professional' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Specialiststable::where('user_id', '=', $userid)->first();
            $pathregistration = $servicedata->registration;
            $pathpersonal_card = $servicedata->personal_card;
            $pathreceipt = $servicedata->receipt;
            $pathcard = $servicedata->card;
            $pathspecialty = $servicedata->specialty;
            $pathpersonal = $servicedata->personal;
            $pathexperience = $servicedata->experience;
            $pathfellowship = $servicedata->fellowship;
            $pathprofessional = $servicedata->professional;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('registration')) {
                Storage::disk('uploads')->delete($pathregistration);
                $pathregistration = Storage::disk('uploads')->put($pathimg, $request->registration);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('specialty')) {
                Storage::disk('uploads')->delete($pathspecialty);
                $pathspecialty = Storage::disk('uploads')->put($pathimg, $request->specialty);
            }

            if ($request->hasFile('personal')) {
                Storage::disk('uploads')->delete($pathpersonal);
                $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            }

            if ($request->hasFile('experience')) {
                Storage::disk('uploads')->delete($pathexperience);
                $pathexperience = Storage::disk('uploads')->put($pathimg, $request->experience);
            }

            if ($request->hasFile('fellowship')) {
                Storage::disk('uploads')->delete($pathfellowship);
                $pathfellowship = Storage::disk('uploads')->put($pathimg, $request->fellowship);
            }

            if ($request->hasFile('professional')) {
                Storage::disk('uploads')->delete($pathprofessional);
                $pathprofessional = Storage::disk('uploads')->put($pathimg, $request->professional);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'personal_card' => $pathpersonal_card,
                'receipt' => $pathreceipt,
                'registration' => $pathregistration,
                'card' => $pathcard,
                'specialty' => $pathspecialty,
                'personal' => $pathpersonal,
                'experience' => $pathexperience,
                'fellowship' => $pathfellowship,
                'professional' => $pathprofessional,
                'cost' => $pathcost,
            ]);
            if (!$request->receipt == null || !$request->card == null || !$request->specialty == null || !$request->personal == null ||
                !$request->experience == null || !$request->fellowship == null || !$request->professional == null ||
                !$request->personal_card == null || !$request->registration == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        } elseif ($id == 17) {

            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'license' => 'nullable|image',
                'personal' => 'nullable|image',
                'passport' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Professionlicen::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathlicense = $servicedata->license;
            $pathpersonal = $servicedata->personal;
            $pathpassport = $servicedata->passport;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('license')) {
                Storage::disk('uploads')->delete($pathlicense);
                $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            }

            if ($request->hasFile('personal')) {
                Storage::disk('uploads')->delete($pathpersonal);
                $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            }

            if ($request->hasFile('passport')) {
                Storage::disk('uploads')->delete($pathpassport);
                $pathpassport = Storage::disk('uploads')->put($pathimg, $request->passport);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'license' => $pathlicense,
                'personal' => $pathpersonal,
                'passport' => $pathpassport,
                'cost' => $pathcost,
            ]);
            if (!$request->personal == null || !$request->passport == null || !$request->card == null || !$request->personal_card == null || !$request->license == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات']);
            }
        }

        return redirect(url("/member/myservice"));
    }
    public function myservice()
    {
        $loggedUser = Auth::user();
        $user = User::findOrfail($loggedUser->id);
        $data['myservice'] = $user->services;
        return view('web.myservice')->with($data);
    }

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

        $request->session()->flash('success_edit', 'تم الغاء الطلب بنجاح');
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
