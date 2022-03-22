<?php

namespace App\Http\Controllers;

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
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceFormController extends Controller
{

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
            }
        } elseif ($unionid == 2) {
            if ($id == 1) {
                $pathimg = "teeth/renewals";
            } elseif ($id == 2) {
                $pathimg = "teeth/alternatives";
            } elseif ($id == 3) {
                $pathimg = "teeth/treatments";
            }
        } elseif ($unionid == 3) {
            if ($id == 1) {
                $pathimg = "human/renewals";
            } elseif ($id == 2) {
                $pathimg = "human/alternatives";
            } elseif ($id == 3) {
                $pathimg = "human/treatments";
            }
        } elseif ($unionid == 4) {
            if ($id == 1) {
                $pathimg = "veterinary/renewals";
            } elseif ($id == 2) {
                $pathimg = "veterinary/alternatives";
            } elseif ($id == 3) {
                $pathimg = "veterinary/treatments";
            }
        }

        if ($id == 1) {

            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',

            ],[
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
                'personal_card' =>  $pathpersonal_card,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);

            $user->services()->attach($id);

            //pivot طريقه اخر الاضافة في اكتر من عمود في جدول 
            /*
            $user->services()->attach($user,[
                'service_id' => $id,
                'message' => 'yes',
                'status' => 'yess'
            ]);
            */
        } elseif ($id == 2) {

            $request->validate([
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'recept' => 'required|image',
                'cost' => 'required|image',
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
            ],[
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
                'presonal' => 'required|image',
                'experience' => 'required|image',
                'fellowship' => 'required|image',
                'Professional' => 'required|image',
                'cost' => 'required|image',
            ],[
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
            $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->presonal);
            $pathexperience = Storage::disk('uploads')->put($pathimg, $request->experience);
            $pathfellowship = Storage::disk('uploads')->put($pathimg, $request->fellowship);
            $pathProfessional = Storage::disk('uploads')->put($pathimg, $request->Professional);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Specialistcard::create([
                'user_id' => $userid,
                'registration' => $pathregistration,
                'personal_card' => $pathpersonal_card,
                'specialty' => $pathspecialty,
                'card' => $pathcard,
                'receipt' => $pathreceipt,
                'presonal' => $pathpresonal,
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
                'passport' => 'required|image',
                'presonal' => 'image',
                'cost' => 'required|image',
            ],[
                'license.required' => "يرجي رفع الصوره المطلوبة",
                'license.image' => "يرجي رفع الصوره المطلوبة",
                'personal_card.required' => "يرجي رفع الصوره المطلوبة",
                'personal_card.image' => "يرجي رفع الصوره المطلوبة",
                'passport.required' => "يرجي رفع الصوره المطلوبة",
                'passport.image' => "يرجي رفع الصوره المطلوبة",
                'card.required' => "يرجي رفع الصوره المطلوبة",
                'card.image' => "يرجي رفع الصوره المطلوبة",
                'presonal.required' => "يرجي رفع الصوره المطلوبة",
                'presonal.image' => "يرجي رفع الصوره المطلوبة",
                'cost.required' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
                'cost.image' => "يرجي رفع صوره لوصل سداد تكلفة الخدمة",
            ]);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            $pathpassport = Storage::disk('uploads')->put($pathimg, $request->passport);
            $pathpresonal = Storage::disk('uploads')->put($pathimg, $request->presonal);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Professionlicen::create([
                'user_id' => $userid,
                'personal_card' => $pathpersonal_card,
                'card' => $pathcard,
                'license' => $pathlicense,
                'passport' => $pathpassport,
                'presonal' => $pathpresonal,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }

        return redirect(url("/member/myservice"));
    }
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    public function update($id, Request $request)
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
            }
        } elseif ($unionid == 2) {
            if ($id == 1) {
                $pathimg = "teeth/renewals";
            } elseif ($id == 2) {
                $pathimg = "teeth/alternatives";
            } elseif ($id == 3) {
                $pathimg = "teeth/treatments";
            }
        } elseif ($unionid == 3) {
            if ($id == 1) {
                $pathimg = "human/renewals";
            } elseif ($id == 2) {
                $pathimg = "human/alternatives";
            } elseif ($id == 3) {
                $pathimg = "human/treatments";
            }
        } elseif ($unionid == 4) {
            if ($id == 1) {
                $pathimg = "veterinary/renewals";
            } elseif ($id == 2) {
                $pathimg = "veterinary/alternatives";
            } elseif ($id == 3) {
                $pathimg = "veterinary/treatments";
            }
        }

        if ($id == 1) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'cost' => 'nullable|image',
            ],[
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
            
        } elseif ($id == 2) {
            $request->validate([
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'recept' => 'nullable|image',
                'cost' => 'nullable|image',
            ],[
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
        } elseif ($id == 3) {
            $request->validate([
                'report' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ],[
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
        }

        $service = Service::where('id', '=', $id)->first();
        $servicename = $service->namear;
        $request->session()->flash('success_edit', " تم تعديل بياناتك في خدمة ' $servicename ' بنجاح");
        return redirect(url("/member/myservice"));
    }
    
}
