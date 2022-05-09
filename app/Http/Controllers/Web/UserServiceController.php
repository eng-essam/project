<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Clinicscert;
use App\Models\Condition;
use App\Models\Consultantcard;
use App\Models\Death;
use App\Models\Disability;
use App\Models\Disease;
use App\Models\Educationfee;
use App\Models\Evictioncert;
use App\Models\Experiencecert;
use App\Models\Givebirth;
use App\Models\Health;
use App\Models\Medical;
use App\Models\Nowork;
use App\Models\Privateclinic;
use App\Models\Professionlicen;
use App\Models\Professionlicense;
use App\Models\Recruitment;
use App\Models\Renewal;
use App\Models\Service;
use App\Models\Specialistcard;
use App\Models\Specialiststable;
use App\Models\Supervision;
use App\Models\Surgery;
use App\Models\Treatment;
use App\Models\Treatmenthelp;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserServiceController extends Controller
{
    //عرض وصف الخدمة
    public function servicedesc($id)
    {
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
        } elseif ($id == 18) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.surgery_desc')->with($data);
        } elseif ($id == 19) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.death_desc')->with($data);
        } elseif ($id == 20) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.health_desc')->with($data);
        } elseif ($id == 21) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.medical_desc')->with($data);
        } elseif ($id == 22) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.givebirth_desc')->with($data);
        } elseif ($id == 23) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.treatmenthelp_desc')->with($data);
        } elseif ($id == 24) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.disability_desc')->with($data);
        } elseif ($id == 25) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_desc.supervision_desc')->with($data);
        }

    }

    //عرض فورم الخدمة
    public function serviceform($id)
    {
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
        } elseif ($id == 18) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.surgeryform')->with($data);
        } elseif ($id == 19) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.deathform')->with($data);
        } elseif ($id == 20) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.healthsform')->with($data);
        } elseif ($id == 21) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.medicalform')->with($data);
        } elseif ($id == 22) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.givebirthform')->with($data);
        } elseif ($id == 23) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.treatmenthelpform')->with($data);
        } elseif ($id == 24) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.disabilityform')->with($data);
        } elseif ($id == 25) {
            $data['service'] = Service::findOrfail($id);
            return view('web.services_form.supervisionform')->with($data);
        }
    }

    //مسار تخزين صور الخدمات
    public function path($unionid, $id)
    {
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
        } elseif ($unionid == 5) {
            if ($id == 1) {
                $pathimg = "teacher/renewals";
            } elseif ($id == 2) {
                $pathimg = "teacher/alternatives";
            } elseif ($id == 18) {
                $pathimg = "teacher/surgerys";
            } elseif ($id == 19) {
                $pathimg = "teacher/deaths";
            } elseif ($id == 20) {
                $pathimg = "teacher/healths";
            } elseif ($id == 21) {
                $pathimg = "teacher/medicals";
            } elseif ($id == 22) {
                $pathimg = "teacher/givebirths";
            } elseif ($id == 23) {
                $pathimg = "teacher/treatmenthelps";
            } elseif ($id == 24) {
                $pathimg = "teacher/disabilitys";
            }
        } elseif ($unionid == 6) {
            if ($id == 1) {
                $pathimg = "lawyer/renewals";
            } elseif ($id == 2) {
                $pathimg = "lawyer/alternatives";
            } elseif ($id == 18) {
                $pathimg = "lawyer/surgerys";
            } elseif ($id == 19) {
                $pathimg = "lawyer/deaths";
            } elseif ($id == 20) {
                $pathimg = "lawyer/healths";
            } elseif ($id == 21) {
                $pathimg = "lawyer/medicals";
            } elseif ($id == 22) {
                $pathimg = "lawyer/givebirths";
            } elseif ($id == 23) {
                $pathimg = "lawyer/treatmenthelps";
            } elseif ($id == 24) {
                $pathimg = "lawyer/disabilitys";
            }
        } elseif ($unionid == 7) {
            if ($id == 1) {
                $pathimg = "sport/renewals";
            } elseif ($id == 2) {
                $pathimg = "sport/alternatives";
            } elseif ($id == 18) {
                $pathimg = "sport/surgerys";
            } elseif ($id == 19) {
                $pathimg = "sport/deaths";
            } elseif ($id == 20) {
                $pathimg = "sport/healths";
            } elseif ($id == 21) {
                $pathimg = "sport/medicals";
            } elseif ($id == 22) {
                $pathimg = "sport/givebirths";
            } elseif ($id == 23) {
                $pathimg = "sport/treatmenthelps";
            } elseif ($id == 24) {
                $pathimg = "sport/disabilitys";
            }
        } elseif ($unionid == 8) {
            if ($id == 1) {
                $pathimg = "engineer/renewals";
            } elseif ($id == 2) {
                $pathimg = "engineer/alternatives";
            } elseif ($id == 18) {
                $pathimg = "engineer/surgerys";
            } elseif ($id == 19) {
                $pathimg = "engineer/deaths";
            } elseif ($id == 20) {
                $pathimg = "engineer/healths";
            } elseif ($id == 21) {
                $pathimg = "engineer/medicals";
            } elseif ($id == 22) {
                $pathimg = "engineer/givebirths";
            } elseif ($id == 23) {
                $pathimg = "engineer/treatmenthelps";
            } elseif ($id == 24) {
                $pathimg = "engineer/disabilitys";
            } elseif ($id == 25) {
                $pathimg = "engineer/supervision";
            }
        }
        return $pathimg;
    }

    //كود حفظ الخدمات
    public function store($id, $request, $pathimg, $userid, $unionid)
    {
        if ($id == 1) {
            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',

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

        } elseif ($id == 2) {

            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'recept' => 'required|image',
                'cost' => 'required|image',
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

        } elseif ($id == 3) {
            $request->validate([
                'report' => 'required|image',
                'personal_card' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
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

        } elseif ($id == 4) {
            $request->validate([
                'birth' => 'required|image',
                'edu_certificate' => 'required|image',
                'salary' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
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

        } elseif ($id == 5) {
            $request->validate([
                'report' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
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

        } elseif ($id == 6) {
            $request->validate([
                'police_certificae' => 'required|image',
                'wedding' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
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
        } elseif ($id == 7) {
            $request->validate([
                'disclaimer' => 'required|image',
                'fulltime' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'ministry' => 'required|image',
                'endServ' => 'required|image',
                'brent' => 'required|image',
                'insurance' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathdisclaimer = Storage::disk('uploads')->put($pathimg, $request->disclaimer);
            $pathfulltime = Storage::disk('uploads')->put($pathimg, $request->fulltime);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathministry = Storage::disk('uploads')->put($pathimg, $request->ministry);
            $pathendServ = Storage::disk('uploads')->put($pathimg, $request->endServ);
            $pathbrent = Storage::disk('uploads')->put($pathimg, $request->brent);
            $pathInsurance = Storage::disk('uploads')->put($pathimg, $request->insurance);
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
                'insurance' => $pathInsurance,
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
                'certificate' => 'nullable|image',
                'cost' => 'required|image',
            ]);

            $pathmodel = Storage::disk('uploads')->put($pathimg, $request->model);
            $pathgraduation = Storage::disk('uploads')->put($pathimg, $request->graduation);
            $pathexcellence = Storage::disk('uploads')->put($pathimg, $request->excellence);
            $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            $pathfesh = Storage::disk('uploads')->put($pathimg, $request->fesh);
            $pathsituation = Storage::disk('uploads')->put($pathimg, $request->situation);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);

            if ($request->certificate == null) {
                $pathcertificate = null;
            } else {
                $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            }

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

        } elseif ($id == 15) {
            $request->validate([
                'contract' => 'required|image',
                'certificate' => 'required|image',
                'card' => 'required|image',
                'building' => 'required|image',
                'recipe' => 'required|image',
                'device' => 'nullable|image',
                'purchase' => 'nullable|image',
                'license' => 'nullable|image',
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

        } elseif ($id == 17) {
            $request->validate([
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'license' => 'required|image',
                'passport' => 'nullable|image',
                'personal' => 'required|image',
                'cost' => 'required|image',
            ]);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);

            if ($request->passport == null) {
                $pathpassport = null;
            } else {
                $pathpassport = Storage::disk('uploads')->put($pathimg, $request->passport);
            }
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

        } elseif ($id == 18) {
            $request->validate([
                'hospital' => 'required|image',
                'report' => 'required|image',
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'receipt' => 'required|image',
                'birth' => 'required|image',
                'wedding' => 'nullable|image',
                'cost' => 'required|image',
            ]);

            $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            ($request->wedding == null) ? $pathwedding = null : $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Surgery::create([
                'user_id' => $userid,
                'hospital' => $pathhospital,
                'report' => $pathreport,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'receipt' => $pathreceipt,
                'birth' => $pathbirth,
                'wedding' => $pathwedding,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 19) {
            $request->validate([
                'death' => 'required|image',
                'funeral' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathdeath = Storage::disk('uploads')->put($pathimg, $request->death);
            $pathfuneral = Storage::disk('uploads')->put($pathimg, $request->funeral);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Death::create([
                'user_id' => $userid,
                'death' => $pathdeath,
                'funeral' => $pathfuneral,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 20) {
            $request->validate([
                'report' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',
            ]);

            if ($unionid == 5) {
                $request->validate([
                    'benefits' => 'required|image',
                    'newspaper' => 'required|image',
                    'hospital' => 'required|image',
                ]);
                $pathbenefits = Storage::disk('uploads')->put($pathimg, $request->benefits);
                $pathnewspaper = Storage::disk('uploads')->put($pathimg, $request->newspaper);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            } else {
                $pathbenefits = null;
                $pathnewspaper = null;
                $pathhospital = null;
            }
            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            Health::create([
                'user_id' => $userid,
                'report' => $pathreport,
                'benefits' => $pathbenefits,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'newspaper' => $pathnewspaper,
                'hospital' => $pathhospital,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 21) {
            $request->validate([
                'childrens' => 'required|image',
                'childrenspersonal' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'wedding' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathchildrens = Storage::disk('uploads')->put($pathimg, $request->childrens);
            $pathchildrenspersonal = Storage::disk('uploads')->put($pathimg, $request->childrenspersonal);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Medical::create([
                'user_id' => $userid,
                'childrens' => $pathchildrens,
                'childrenspersonal' => $pathchildrenspersonal,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'wedding' => $pathwedding,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 22) {
            $request->validate([
                'hospital' => 'required|image',
                'report' => 'required|image',
                'card' => 'required|image',
                'childs' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathchilds = Storage::disk('uploads')->put($pathimg, $request->childs);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Givebirth::create([
                'user_id' => $userid,
                'hospital' => $pathhospital,
                'report' => $pathreport,
                'card' => $pathcard,
                'childs' => $pathchilds,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 23) {
            $request->validate([
                'project' => 'required|image',
                'hospitalcost' => 'required|image',
                'report' => 'required|image',
                'hospital' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathproject = Storage::disk('uploads')->put($pathimg, $request->project);
            $pathhospitalcost = Storage::disk('uploads')->put($pathimg, $request->hospitalcost);
            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Treatmenthelp::create([
                'user_id' => $userid,
                'project' => $pathproject,
                'hospitalcost' => $pathhospitalcost,
                'report' => $pathreport,
                'hospital' => $pathhospital,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 24) {
            $request->validate([
                'medical' => 'required|image',
                'receipt' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathmedical = Storage::disk('uploads')->put($pathimg, $request->medical);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Disability::create([
                'user_id' => $userid,
                'medical' => $pathmedical,
                'receipt' => $pathreceipt,
                'personal_card' => $pathpersonal_card,
                'cost' => $pathcost,
            ]);

        } elseif ($id == 25) {
            $request->validate([
                'license' => 'required|image',
                'cost' => 'required|image',
            ]);

            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Supervision::create([
                'user_id' => $userid,
                'license' => $pathlicense,
                'cost' => $pathcost,
            ]);
        }
        $user = User::findOrfail($userid);
        $user->services()->attach($id);
    }

    //كود التعديل ف خدمة العضو قام بطلبها
    public function update($id, $request, $pathimg, $userid, $servicename, $loggedUser)
    {
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null,
                    ]
                );
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                'insurance' => 'nullable|image',
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
            $pathinsurance = $servicedata->insurance;
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

            if ($request->hasFile('insurance')) {
                Storage::disk('uploads')->delete($pathinsurance);
                $pathinsurance = Storage::disk('uploads')->put($pathimg, $request->Insurance);
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
                'insurance' => $pathinsurance,
                'cost' => $pathcost,
            ]);
            if (!$request->disclaimer == null || !$request->fulltime == null || !$request->card == null || !$request->cost == null ||
                !$request->brent == null || !$request->personal_card == null || !$request->ministry == null || !$request->endServ == null ||
                !$request->Insurance == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                'Professional' => 'nullable|image',
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
            $pathProfessional = $servicedata->Professional;
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

            if ($request->hasFile('Professional')) {
                Storage::disk('uploads')->delete($pathProfessional);
                $pathProfessional = Storage::disk('uploads')->put($pathimg, $request->Professional);
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
                'Professional' => $pathProfessional,
                'cost' => $pathcost,
            ]);
            if (!$request->receipt == null || !$request->card == null || !$request->specialty == null || !$request->personal == null ||
                !$request->experience == null || !$request->fellowship == null || !$request->professional == null ||
                !$request->personal_card == null || !$request->registration == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
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
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 18) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'hospital' => 'nullable|image',
                'report' => 'nullable|image',
                'receipt' => 'nullable|image',
                'birth' => 'nullable|image',
                'cost' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Surgery::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathhospital = $servicedata->hospital;
            $pathreport = $servicedata->report;
            $pathreceipt = $servicedata->receipt;
            $pathbirth = $servicedata->birth;
            $pathwedding = $servicedata->wedding;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('hospital')) {
                Storage::disk('uploads')->delete($pathhospital);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            }

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('receipt')) {
                Storage::disk('uploads')->delete($pathreceipt);
                $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            }

            if ($request->hasFile('birth')) {
                Storage::disk('uploads')->delete($pathbirth);
                $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            }

            if ($request->hasFile('wedding')) {
                Storage::disk('uploads')->delete($pathwedding);
                $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'hospital' => $pathhospital,
                'report' => $pathreport,
                'receipt' => $pathreceipt,
                'birth' => $pathbirth,
                'wedding' => $pathwedding,
                'cost' => $pathcost,

            ]);
            if (!$request->report == null || !$request->receipt == null || !$request->card == null
                || !$request->personal_card == null || !$request->hospital == null || !$request->birth == null
                || !$request->wedding == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 19) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'death' => 'nullable|image',
                'funeral' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Death::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathdeath = $servicedata->death;
            $pathfuneral = $servicedata->funeral;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('death')) {
                Storage::disk('uploads')->delete($pathdeath);
                $pathdeath = Storage::disk('uploads')->put($pathimg, $request->death);
            }

            if ($request->hasFile('funeral')) {
                Storage::disk('uploads')->delete($pathfuneral);
                $pathfuneral = Storage::disk('uploads')->put($pathimg, $request->funeral);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'death' => $pathdeath,
                'funeral' => $pathfuneral,
                'cost' => $pathcost,
            ]);
            if (!$request->funeral == null || !$request->card == null || !$request->personal_card == null || !$request->death == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 20) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'report' => 'nullable|image',
                'benefits' => 'nullable|image',
                'newspaper' => 'nullable|image',
                'hospital' => 'nullable|image',
                'cost' => 'nullable|image',

            ]);

            $servicedata = Health::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathreport = $servicedata->report;
            $pathbenefits = $servicedata->benefits;
            $pathnewspaper = $servicedata->newspaper;
            $pathhospital = $servicedata->hospital;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('benefits')) {
                Storage::disk('uploads')->delete($pathbenefits);
                $pathbenefits = Storage::disk('uploads')->put($pathimg, $request->benefits);
            }

            if ($request->hasFile('newspaper')) {
                Storage::disk('uploads')->delete($pathnewspaper);
                $pathnewspaper = Storage::disk('uploads')->put($pathimg, $request->newspaper);
            }

            if ($request->hasFile('hospital')) {
                Storage::disk('uploads')->delete($pathhospital);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'report' => $pathreport,
                'benefits' => $pathbenefits,
                'newspaper' => $pathnewspaper,
                'hospital' => $pathhospital,
                'cost' => $pathcost,

            ]);
            if (!$request->benefits == null || !$request->newspaper == null || !$request->card == null
                || !$request->personal_card == null || !$request->report == null || !$request->hospital == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 21) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'childrens' => 'nullable|image',
                'childrenspersonal' => 'nullable|image',
                'wedding' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Medical::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathpersonal_card = $servicedata->personal_card;
            $pathchildrens = $servicedata->childrens;
            $pathchildrenspersonal = $servicedata->childrenspersonal;
            $pathwedding = $servicedata->wedding;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('personal_card')) {
                Storage::disk('uploads')->delete($pathpersonal_card);
                $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            }

            if ($request->hasFile('childrens')) {
                Storage::disk('uploads')->delete($pathchildrens);
                $pathchildrens = Storage::disk('uploads')->put($pathimg, $request->childrens);
            }

            if ($request->hasFile('childrenspersonal')) {
                Storage::disk('uploads')->delete($pathchildrenspersonal);
                $pathchildrenspersonal = Storage::disk('uploads')->put($pathimg, $request->childrenspersonal);
            }

            if ($request->hasFile('wedding')) {
                Storage::disk('uploads')->delete($pathwedding);
                $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            }

            if ($request->hasFile('cost')) {
                Storage::disk('uploads')->delete($pathcost);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            }

            $servicedata->update([
                'user_id' => $userid,
                'card' => $pathcard,
                'personal_card' => $pathpersonal_card,
                'childrens' => $pathchildrens,
                'childrenspersonal' => $pathchildrenspersonal,
                'wedding' => $pathwedding,
                'cost' => $pathcost,
            ]);
            if (!$request->childrenspersonal == null || !$request->wedding == null || !$request->card == null
                || !$request->personal_card == null || !$request->childrens == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 22) {
            $request->validate([
                'card' => 'nullable|image',
                'hospital' => 'nullable|image',
                'report' => 'nullable|image',
                'childs' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Givebirth::where('user_id', '=', $userid)->first();
            $pathcard = $servicedata->card;
            $pathhospital = $servicedata->hospital;
            $pathreport = $servicedata->report;
            $pathchilds = $servicedata->childs;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('card')) {
                Storage::disk('uploads')->delete($pathcard);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            }

            if ($request->hasFile('hospital')) {
                Storage::disk('uploads')->delete($pathhospital);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            }

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('childs')) {
                Storage::disk('uploads')->delete($pathchilds);
                $pathchilds = Storage::disk('uploads')->put($pathimg, $request->childs);
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
                'card' => $pathcard,
                'hospital' => $pathhospital,
                'report' => $pathreport,
                'childs' => $pathchilds,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->childs == null || !$request->receipt == null || !$request->card == null
                || !$request->hospital == null || !$request->report == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 23) {
            $request->validate([
                'project' => 'nullable|image',
                'hospitalcost' => 'nullable|image',
                'report' => 'nullable|image',
                'hospital' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Treatmenthelp::where('user_id', '=', $userid)->first();
            $pathproject = $servicedata->project;
            $pathhospitalcost = $servicedata->hospitalcost;
            $pathreport = $servicedata->report;
            $pathhospital = $servicedata->hospital;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('project')) {
                Storage::disk('uploads')->delete($pathproject);
                $pathproject = Storage::disk('uploads')->put($pathimg, $request->project);
            }

            if ($request->hasFile('hospitalcost')) {
                Storage::disk('uploads')->delete($pathhospitalcost);
                $pathhospitalcost = Storage::disk('uploads')->put($pathimg, $request->hospitalcost);
            }

            if ($request->hasFile('report')) {
                Storage::disk('uploads')->delete($pathreport);
                $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            }

            if ($request->hasFile('hospital')) {
                Storage::disk('uploads')->delete($pathhospital);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
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
                'project' => $pathproject,
                'hospitalcost' => $pathhospitalcost,
                'report' => $pathreport,
                'hospital' => $pathhospital,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->hospital == null || !$request->receipt == null
                || !$request->project == null || !$request->hospitalcost == null || !$request->report == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 24) {
            $request->validate([
                'medical' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Disability::where('user_id', '=', $userid)->first();
            $pathmedical = $servicedata->medical;
            $pathpersonal_card = $servicedata->personal_card;
            $pathreceipt = $servicedata->receipt;
            $pathcost = $servicedata->cost;

            if ($request->hasFile('medical')) {
                Storage::disk('uploads')->delete($pathmedical);
                $pathmedical = Storage::disk('uploads')->put($pathimg, $request->medical);
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
                'medical' => $pathmedical,
                'personal_card' => $pathpersonal_card,
                'receipt' => $pathreceipt,
                'cost' => $pathcost,
            ]);
            if (!$request->medical == null || !$request->personal_card == null
                || !$request->receipt == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        } elseif ($id == 25) {
            $request->validate([
                'license' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);

            $servicedata = Supervision::where('user_id', '=', $userid)->first();
            $pathlicense = $servicedata->license;
            $pathcost = $servicedata->cost;

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
                'license' => $pathlicense,
                'cost' => $pathcost,
            ]);
            if (!$request->license == null || !$request->cost == null) {
                $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
                $loggedUser->operations()->updateExistingpivot($id,
                    ['message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null]);
            }
        }
    }

    //كود الغاء طلب خدمة
    public function delete($id, $userid, $user)
    {
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
            Storage::disk('uploads')->delete($userdata->insurance);
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
            Storage::disk('uploads')->delete($userdata->Professional);
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
        } elseif ($id == 18) {
            $userdata = Surgery::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->hospital);
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->birth);
            Storage::disk('uploads')->delete($userdata->wedding);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 19) {
            $userdata = Death::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->death);
            Storage::disk('uploads')->delete($userdata->funeral);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 20) {
            $userdata = Health::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->benefits);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->newspaper);
            Storage::disk('uploads')->delete($userdata->hospital);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 21) {
            $userdata = Medical::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->childrens);
            Storage::disk('uploads')->delete($userdata->childrenspersonal);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->wedding);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 22) {
            $userdata = Givebirth::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->hospital);
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->card);
            Storage::disk('uploads')->delete($userdata->childs);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 23) {
            $userdata = Treatmenthelp::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->project);
            Storage::disk('uploads')->delete($userdata->hospitalcost);
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->hospital);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 24) {
            $userdata = Disability::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->medical);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->personal_card);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        } elseif ($id == 25) {
            $userdata = Supervision::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->license);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }
    }

    //عرض صفح تعديل الخدمة المطلوبه
    public function eidt($id, $data, $unionid)
    {
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
        } elseif ($id == 18) {
            return view('web.edit.surgeryform')->with($data);
        } elseif ($id == 19) {
            return view('web.edit.deathform')->with($data);
        } elseif ($id == 20) {
            $data['unionid'] = $unionid;
            return view('web.edit.healthsform')->with($data);
        } elseif ($id == 21) {
            return view('web.edit.medicalform')->with($data);
        } elseif ($id == 22) {
            return view('web.edit.givebirthform')->with($data);
        } elseif ($id == 23) {
            return view('web.edit.treatmenthelpform')->with($data);
        } elseif ($id == 24) {
            return view('web.edit.disabilityform')->with($data);
        } elseif ($id == 25) {
            return view('web.edit.supervisionform')->with($data);
        }
    }

}
