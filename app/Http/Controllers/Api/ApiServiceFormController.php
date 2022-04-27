<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiServiceFormController extends Controller
{

    public function show($id)
    {
        $service = Service::find($id);
        if ($service == null) {
            return response()->json([
                'status' => false,
                'message' => 'هذه الخدمة غير متاحة ',
            ]);
        }
        return new ServiceResource($service);
    }
    //////////////////////////////////////////////

    public function store($id, Request $request)
    {
        $loggedUser = $request->user();
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

        $user = User::findOrfail($loggedUser->id);
        $user_services = $user->services;
        $services_arr = [];
        foreach ($user_services as $serviceid) {
            $services_arr[] = $serviceid->pivot->service_id;
        }

        if (in_array($id, $services_arr)) {
            return response()->json([
                'status' => false,
                'message' => ' لقد استخدمت هذه الخدمة من قبل هل تريد حذف بياناتك القديمة لهذه الخدمة وطلبها من جديد',
            ]);
        } else {
            if ($id == 1) {
                $validator = Validator::make($request->all(), [
                    'card' => 'required|image',
                    'personal_card' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'card' => 'required|image',
                    'personal_card' => 'required|image',
                    'recept' => 'required|image',
                    'cost' => 'required|image',

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = validator::make($request->all(), [
                    'report' => 'required|image',
                    'personal_card' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'birth' => 'required|image',
                    'edu_certificate' => 'required|image',
                    'salary' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'report' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'police_certificae' => 'required|image',
                    'wedding' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'disclaimer' => 'required|image',
                    'fulltime' => 'required|image',
                    'card' => 'required|image',
                    'personal_card' => 'required|image',
                    'ministry' => 'required|image',
                    'endServ' => 'required|image',
                    'brent' => 'required|image',
                    'Insurance' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'health' => 'required|image',
                    'card' => 'required|image',
                    'attorney' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

                $pathhealth = Storage::disk('uploads')->put($pathimg, $request->health);
                $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
                $pathattorney = Storage::disk('uploads')->put($pathimg, $request->attorney);
                $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

                Evictioncert::create([
                    'user_id' => $userid,
                    'health' => $pathhealth,
                    'card' => $pathcard,
                    'attorney' => $pathattorney,
                    'cost' => $pathcost,
                ]);

                $user = User::findOrfail($userid);
                $user->services()->attach($id);
            } elseif ($id == 9) {
                $validator = Validator::make($request->all(), [
                    'personal_card' => 'required|image',
                    'card' => 'required|image',
                    'License' => 'required|image',
                    'recruitment' => 'required|image',
                    'assignment' => 'required|image',
                    'statement' => 'required|image',
                    'movements' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'contract' => 'required|image',
                    'engineer' => 'required|image',
                    'receipt' => 'required|image',
                    'tax_card' => 'required|image',
                    'approval' => 'required|image',
                    'presonal' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'recruitment' => 'required|image',
                    'army_card' => 'required|image',
                    'card' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'temporary' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'master' => 'required|image',
                    'receipt' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
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
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
                    'contract' => 'required|image',
                    'certificate' => 'required|image',
                    'card' => 'required|image',
                    'building' => 'required|image',
                    'recipe' => 'required|image',
                    'device' => 'required|image',
                    'purchase' => 'required|image',
                    'license' => 'required|image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
                $validator = Validator::make($request->all(), [
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
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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

                Specialiststable::create([
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
                $validator = Validator::make($request->all(), [
                    'personal_card' => 'required|image',
                    'card' => 'required|image',
                    'license' => 'required|image',
                    'passport' => 'required|image',
                    'presonal' => 'image',
                    'cost' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }

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
            } else {
                return response()->json([
                    'message' => 'هذه الخدمة غير متاحة',
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'تم طلب الخدمة بنجاح وسيتم مراجعة طلبك ',
            ], 200);
        }

    }
    ///////////////////////////////////////////////////////////////////////////////

    public function update($id, Request $request)
    {
        $loggedUser = $request->user();
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
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'recept' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = validator::make($request->all(), [
                'report' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }
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
            $validator = Validator::make($request->all(), [
                'birth' => 'nullable|image',
                'edu_certificate' => 'nullable|image',
                'salary' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'report' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }
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
            $validator = Validator::make($request->all(), [
                'police_certificae' => 'nullable|image',
                'wedding' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
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
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'health' => 'nullable|image',
                'card' => 'nullable|image',
                'attorney' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'License' => 'nullable|image',
                'recruitment' => 'nullable|image',
                'assignment' => 'nullable|image',
                'statement' => 'nullable|image',
                'movements' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'contract' => 'nullable|image',
                'engineer' => 'nullable|image',
                'receipt' => 'nullable|image',
                'tax_card' => 'nullable|image',
                'approval' => 'nullable|image',
                'presonal' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'recruitment' => 'nullable|image',
                'army_card' => 'nullable|image',
                'receipt' => 'nullable|image',
                'card' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'temporary' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'master' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
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
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
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
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
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
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'license' => 'nullable|image',
                'personal' => 'nullable|image',
                'passport' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
        } else {
            return response()->json([
                'message' => 'هذه الخدمة غير متاحة',
            ]);
        }

        $service = Service::where('id', '=', $id)->first();
        $servicename = $service->namear;
        return response()->json([
            'status' => true,
            'message' => "تم تعديل بياناتك فى خدمة $servicename بنجاح ",
        ], 200);
    }
    //////////////////////////////////////////////////////////////////////////////////

    public function delete($id, Request $request)
    {
        $loggedUser = $request->user();
        $user = User::findOrfail($loggedUser->id);
        $userid = $user->id;

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
        } else {
            return response()->json([
                'message' => 'هذه الخدمة غير متاحة',
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'تم حذف الطلب بنجاح ',
        ], 200);
    }
}
