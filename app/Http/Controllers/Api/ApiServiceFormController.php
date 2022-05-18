<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Death;
use App\Models\Union;
use App\Models\Health;
use App\Models\Nowork;
use App\Models\Disease;
use App\Models\Medical;
use App\Models\Renewal;
use App\Models\Service;
use App\Models\Surgery;
use App\Models\Condition;
use App\Models\Givebirth;
use App\Models\Treatment;
use App\Models\Disability;
use App\Models\Alternative;
use App\Models\Clinicscert;
use App\Models\Recruitment;
use App\Models\Supervision;
use App\Models\Educationfee;
use App\Models\Evictioncert;
use Illuminate\Http\Request;
use App\Models\Privateclinic;
use App\Models\Treatmenthelp;
use App\Models\Consultantcard;
use App\Models\Experiencecert;
use App\Models\Specialistcard;
use App\Models\Professionlicen;
use App\Models\Specialiststable;
use App\Models\Professionlicense;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ApiServiceFormController extends Controller
{

    public function show($id){

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

  public function serviceInfo($id, Request $request){

    $loggedUser = $request->user();
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
    }
    else {
        return response()->json([
            'status' => true,
            'message' => 'يمكنك طلب الخدمة',
        ]);
    }
  }////////////////////////////

/*   public function search(Request $request){

     $loggedUser = $request->user();
     $user = User::findOrfail($loggedUser->id);
     $unionid = $user->union_id;
     $union = Union::findOrfail($unionid);
     $unionservices = $union->services;
     $keyword = $request->keyword;

     $row = [];
     for ($i = 0; $i< $unionservices->count(); $i++) {
         $row[] =$unionservices[$i]["id"];
     }

      $validator = Validator::make($request ->all(),[
        'keyword' =>'required|string',
      ]);
      if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => $validator->errors(),
        ]);
      }
      if (!preg_match('/\p{Arabic}/u', $keyword)) {
          return response()->json([
               'status' => false,
                'message' => 'يرجي كتابة اسم الخدمة صحيح بالغة العربية',
            ]);
        }

    $search = Service::where('namear', 'like', "%$keyword%")->whereIn('id', $row)->get();

     if ($search){
        return response()->json([
            'status' => true,
            'data' => $search,
       ]);
      }
     else{
       return response()->json([
            'status' => false,
            'message' => 'هذه الخدمة غير متاحة ',
     ]);
    }
} */
  //////////////////////////////////////////////
/*
  public function serviceDesc($id, Request $request){

      $loggedUser = $request->user();
      $user = User::findOrfail($loggedUser->id);
      $unionid = $user->union_id;
      $union = Union::findOrfail($unionid);
      $unionservices = $union->services;
      $services[] = $union->services()->where('service_id', $id)->first();

      //بجيب كل الخدمات اللي تبع نقابة واحده بس
      $row = [];
      for ($i = 0; $i< $unionservices->count(); $i++) {
          $row[] =$unionservices[$i]["id"];
      }
      foreach ($services as $service_costs){
            $service_Info = [
             'service_id'=> $service_costs->pivot->service_id,
             'namear'=> $service_costs->namear,
             'title'=> $service_costs->title,
             'service_cost'=> $service_costs->pivot->service_cost,
             'union_phone'=> $union->phone,
         ];
      }
      if (in_array($id, $row)) {
        return response()->json([
            'status' => true,
            'data' => $service_Info,
       ],200);
      }

      else {
        return response()->json([
            'status' => false,
            'message' => 'هذه الخدمة غير متاحة',
        ]);
      }
    } */
    ///////////////////////////////////////////////////////////////

    public function store($id, Request $request){

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
        }
        elseif ($unionid == 2) {
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
        }
        elseif ($unionid == 3) {
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
        }
        elseif ($unionid == 4) {
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
        elseif ($unionid == 5) {
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
            }

       else {
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
                'personal_card' =>  $pathpersonal_card,
                'cost' => $pathcost,
            ]);
            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
         elseif ($id == 2) {
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
        }
         elseif ($id == 3) {
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
        }
         elseif ($id == 4) {
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
        }
         elseif ($id == 5) {
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
        }
         elseif ($id == 6) {
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
        }
        elseif ($id == 7) {
            $validator = Validator::make($request->all(), [
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
            $pathinsurance = Storage::disk('uploads')->put($pathimg, $request->insurance);
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
                'insurance' => $pathinsurance,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 8) {
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
        }
         elseif ($id == 9) {
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
        }
         elseif ($id == 10) {
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
        }
        elseif ($id == 11) {
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
        }
        elseif ($id == 12) {
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
        }
         elseif ($id == 13) {
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
        }
         elseif ($id == 14) {
            $validator = Validator::make($request->all(), [
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
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            if ($request->certificate == null){
                $pathcertificate = null;
            }
            else {
                $pathcertificate = Storage::disk('uploads')->put($pathimg, $request->certificate);
            }

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
        }
         elseif ($id == 15) {
            $validator = Validator::make($request->all(), [
                'contract' => 'required|image',
                'certificate' => 'required|image',
                'card' => 'required|image',
                'building' => 'required|image',
                'recipe' => 'required|image',
                'device' => 'nullable|image',
                'purchase' => 'nullable|image',
                'license' => 'nullable|image',
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
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            if ($request->device == null){
                $pathdevice = null;
            }
            else {
                $pathdevice = Storage::disk('uploads')->put($pathimg, $request->device);
            }
            if ($request->purchase == null){
                $pathpurchase = null;
            }
            else {
                $pathpurchase = Storage::disk('uploads')->put($pathimg, $request->purchase);
            }
            if ( $request->license == null){
                $pathlicense = null;
            }
            else {
                $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            }

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
        }
         elseif ($id == 16) {
            $validator = Validator::make($request->all(), [
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
            $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
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
                'personal' => $pathpersonal,
                'experience' => $pathexperience,
                'fellowship' => $pathfellowship,
                'Professional' => $pathProfessional,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
         elseif ($id == 17) {
            $validator = Validator::make($request->all(), [
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'license' => 'required|image',
                'passport' => 'nullable|image',
                'personal' => 'required|image',
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
            $pathpersonal = Storage::disk('uploads')->put($pathimg, $request->personal);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            if ($request->passport == null){
                $pathpassport = null;
            }
            else {
                $pathpassport = Storage::disk('uploads')->put($pathimg, $request->passport);
            }

            Professionlicen::create([
                'user_id' => $userid,
                'personal_card' => $pathpersonal_card,
                'card' => $pathcard,
                'license' => $pathlicense,
                'passport' => $pathpassport,
                'personal' => $pathpersonal,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 18) {
            $validator = Validator::make($request->all(), [
                'hospital' => 'required|image',
                'report' => 'required|image',
                'personal_card' => 'required|image',
                'card' => 'required|image',
                'receipt' => 'required|image',
                'birth' => 'required|image',
                'wedding' => 'nullable|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

            $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            $pathreport = Storage::disk('uploads')->put($pathimg, $request->report);
            $pathpersonal_card = Storage::disk('uploads')->put($pathimg, $request->personal_card);
            $pathcard = Storage::disk('uploads')->put($pathimg, $request->card);
            $pathreceipt = Storage::disk('uploads')->put($pathimg, $request->receipt);
            $pathbirth = Storage::disk('uploads')->put($pathimg, $request->birth);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);
            if ($request->wedding == null){
                $pathwedding = null;
            }
            else {
                $pathwedding = Storage::disk('uploads')->put($pathimg, $request->wedding);
            }

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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 19) {
            $validator = Validator::make($request->all(), [
                'death' => 'required|image',
                'funeral' => 'required|image',
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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 20) {
            $validator = Validator::make($request->all(), [
                'report' => 'required|image',
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

            if ($unionid == 5) {
                $validator = Validator::make($request->all(), [
                    'benefits' => 'required|image',
                    'newspaper' => 'required|image',
                    'hospital' => 'required|image',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validator->errors(),
                    ]);
                }
                $pathbenefits = Storage::disk('uploads')->put($pathimg, $request->benefits);
                $pathnewspaper = Storage::disk('uploads')->put($pathimg, $request->newspaper);
                $pathhospital = Storage::disk('uploads')->put($pathimg, $request->hospital);
            }
            else {
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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 21) {
            $validator = Validator::make($request->all(), [
                'childrens' => 'required|image',
                'childrenspersonal' => 'required|image',
                'card' => 'required|image',
                'personal_card' => 'required|image',
                'wedding' => 'required|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 22) {
            $validator = Validator::make($request->all(), [
                'hospital' => 'required|image',
                'report' => 'required|image',
                'card' => 'required|image',
                'childs' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 23) {
            $validator = Validator::make($request->all(), [
                'project' => 'required|image',
                'hospitalcost' => 'required|image',
                'report' => 'required|image',
                'hospital' => 'required|image',
                'receipt' => 'required|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 24) {
            $validator = Validator::make($request->all(), [
                'medical' => 'required|image',
                'receipt' => 'required|image',
                'personal_card' => 'required|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }
        elseif ($id == 25) {
            $validator = Validator::make($request->all(), [
                'license' => 'required|image',
                'cost' => 'required|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

            $pathlicense = Storage::disk('uploads')->put($pathimg, $request->license);
            $pathcost = Storage::disk('uploads')->put($pathimg, $request->cost);

            Supervision::create([
                'user_id' => $userid,
                'license' => $pathlicense,
                'cost' => $pathcost,
            ]);

            $user = User::findOrfail($userid);
            $user->services()->attach($id);
        }


        else {
            return response()->json([
              'message'=> 'هذه الخدمة غير متاحة'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'تم طلب الخدمة بنجاح وسيتم مراجعة طلبك ',
          ], 200);
      }

    }
    ///////////////////////////////////////////////////////////////////////////////

    public function myservice(Request $request){
        $loggedUser = $request->user();
        $user = User::findOrfail($loggedUser->id);
        $myservice = $user->services;
        return response()->json([
            'status' => true,
            'data' => $myservice,
        ],200);

        /*
       for ($i=0; $i<$myservice->count();$i++){
        $data[] =
           'service_id'=> $myservice[$i]-> pivot->service_id,
           'namear'=>  $myservice[$i]->namear,
           'service_date'=> $myservice[$i]-> pivot->created_at->format('Y-m-d'),
           'status'=> $myservice[$i]-> pivot->status,
           'message'=> $myservice[$i]-> pivot->message,
         ];
       }
      return response()->json([
        'status' => true,
        'data' => $data,
      ],200); */

    }
    //////////////////////////////////////////////////////////////////////////////

    public function update($id, Request $request){

        $loggedUser = User::where('id', '=' , $request->user()->id)->first();
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
        }
        elseif ($unionid == 2) {
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
        }
        elseif ($unionid == 3) {
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
        }
        elseif ($unionid == 4) {
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
        elseif ($unionid == 5) {
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

            if (!$request->card == null || !$request->personal_card == null || !$request->cost == null){
             $loggedUser->operations()->updateExistingpivot($id,[
                'message' => 'جاري مراجعة البيانات',
                'status' => 'جاري مراجعة البيانات',
                'admin_name'=> null,
                'user2_id'=> null,
            ]);
        }
      }
         elseif ($id == 2) {
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

            if (!$request->card == null || !$request->personal_card == null || !$request->recept == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                ]);
            }
        }
         elseif ($id == 3) {
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

            if (!$request->report == null || !$request->personal_card == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
         elseif ($id == 4) {
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

            if (!$request->birth == null || !$request->edu_certificate == null || !$request->salary == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
                }
        }
         elseif ($id == 5) {
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

            if (!$request->report == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
        elseif ($id == 6) {
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

            if (!$request->police_certificae == null || !$request->wedding == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                ]);
            }
        }
        elseif ($id == 7) {
            $validator = Validator::make($request->all(), [
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
                $pathinsurance = Storage::disk('uploads')->put($pathimg, $request->insurance);
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
            !$request->insurance == null){
            $loggedUser->operations()->updateExistingpivot($id,[
                    'message' => 'جاري مراجعة البيانات',
                    'status' => 'جاري مراجعة البيانات',
                    'admin_name'=> null,
                    'user2_id'=> null,
                ]);
            }
        }
        elseif ($id == 8) {
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

            if (!$request->health == null || !$request->card == null || !$request->attorney == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                ]);
            }
        }
         elseif ($id == 9) {
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

            if (!$request->card == null || !$request->personal_card == null || !$request->License == null || !$request->cost == null ||
            !$request->recruitment == null || !$request->assignment == null || !$request->statement == null || !$request->movements == null){
            $loggedUser->operations()->updateExistingpivot($id,[
                    'message' => 'جاري مراجعة البيانات',
                    'status' => 'جاري مراجعة البيانات',
                    'admin_name'=> null,
                    'user2_id'=> null,
                ]);
            }
        }
         elseif ($id == 10) {
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

            if (!$request->contract == null || !$request->engineer == null || !$request->receipt == null || !$request->cost == null ||
                !$request->tax_card == null || !$request->approval == null || !$request->presonal == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
         elseif ($id == 11) {
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

            if (!$request->recruitment == null || !$request->army_card == null || !$request->receipt == null ||
                !$request->card == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
         elseif ($id == 12) {
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

            if (!$request->temporary == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
        elseif ($id == 13) {
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

            if (!$request->master == null || !$request->receipt == null || !$request->cost == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
        elseif ($id == 14) {
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

            if (!$request->model == null || !$request->graduation == null || !$request->receipt == null || !$request->cost == null ||
                !$request->excellence == null || !$request->birth == null || !$request->personal == null || !$request->fesh == null ||
                !$request->situation == null || !$request->certificate == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
        elseif ($id == 15) {
            $validator = Validator::make($request->all(), [
                'contract' => 'nullable|image',
                'recipe' => 'nullable|image',
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
            $pathrecipe = $servicedata->recipe;
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

            if ($request->hasFile('recipe')) {
                Storage::disk('uploads')->delete($pathrecipe);
                $pathrecipe = Storage::disk('uploads')->put($pathimg, $request->recipe);
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
                'recipe' => $pathrecipe,
                'certificate' => $pathcertificate,
                'card' => $pathcard,
                'building' => $pathbuilding,
                'device' => $pathdevice,
                'purchase' => $pathpurchase,
                'license' => $pathlicense,
                'cost' => $pathcost,
            ]);

            if (!$request->contract == null || !$request->recipe == null || !$request->certificate == null || !$request->cost == null ||
            !$request->building == null || !$request->device == null || !$request->purchase == null ||
            !$request->card == null || !$request->license == null){
            $loggedUser->operations()->updateExistingpivot($id,[
                    'message' => 'جاري مراجعة البيانات',
                    'status' => 'جاري مراجعة البيانات',
                    'admin_name'=> null,
                    'user2_id'=> null,
                ]);
            }
        }
         elseif ($id == 16) {
            $validator = Validator::make($request->all(), [
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
            !$request->experience == null || !$request->fellowship == null || !$request->Professional == null || !$request->personal_card == null ||
            !$request->registration == null || !$request->cost == null){
            $loggedUser->operations()->updateExistingpivot($id,[
                    'message' => 'جاري مراجعة البيانات',
                    'status' => 'جاري مراجعة البيانات',
                    'admin_name'=> null,
                    'user2_id'=> null,
                ]);
            }
        }
        elseif ($id == 17) {
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

            if (!$request->personal == null || !$request->card == null || !$request->personal_card == null ||
            !$request->license == null || !$request->cost == null || !$request->passport == null){
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name'=> null,
                        'user2_id'=> null,
                    ]);
            }
        }
        elseif ($id == 18) {
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'hospital' => 'nullable|image',
                'report' => 'nullable|image',
                'receipt' => 'nullable|image',
                'birth' => 'nullable|image',
                'cost' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
         elseif ($id == 19) {
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'death' => 'nullable|image',
                'funeral' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 20) {
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'report' => 'nullable|image',
                'benefits' => 'nullable|image',
                'newspaper' => 'nullable|image',
                'hospital' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 21) {
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'personal_card' => 'nullable|image',
                'childrens' => 'nullable|image',
                'childrenspersonal' => 'nullable|image',
                'wedding' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                       'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 22) {
            $validator = Validator::make($request->all(), [
                'card' => 'nullable|image',
                'hospital' => 'nullable|image',
                'report' => 'nullable|image',
                'childs' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 23) {
            $validator = Validator::make($request->all(), [
                'project' => 'nullable|image',
                'hospitalcost' => 'nullable|image',
                'report' => 'nullable|image',
                'hospital' => 'nullable|image',
                'receipt' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 24) {
            $validator = Validator::make($request->all(), [
                'medical' => 'nullable|image',
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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }
        elseif ($id == 25) {
            $validator = Validator::make($request->all(), [
                'license' => 'nullable|image',
                'cost' => 'nullable|image',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                ]);
            }

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
                $loggedUser->operations()->updateExistingpivot($id,[
                        'message' => 'جاري مراجعة البيانات',
                        'status' => 'جاري مراجعة البيانات',
                        'admin_name' => null,
                        'user2_id' => null
                    ]);
            }
        }


        else {
            return response()->json([
              'message' => 'هذه الخدمة غير متاحة'
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

    public function delete($id, Request $request){

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
        }
        elseif ($id == 2) {
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
        }
        elseif ($id == 3) {
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
        }
         elseif ($id == 4) {
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
        }
        elseif ($id == 5) {
            $userdata = Disease::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->report);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }
        elseif ($id == 6) {
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
        }
        elseif ($id == 7) {
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
        }
        elseif ($id == 8) {
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
        }
         elseif ($id == 9) {
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
        }
        elseif ($id == 10) {
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
        }
        elseif ($id == 11) {
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
        }
        elseif ($id == 12) {
            $userdata = Consultantcard::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->temporary);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }
         elseif ($id == 13) {
            $userdata = Specialistcard::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->master);
            Storage::disk('uploads')->delete($userdata->receipt);
            Storage::disk('uploads')->delete($userdata->cost);
            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }
         elseif ($id == 14) {
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
        }
         elseif ($id == 15) {
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
        }
         elseif ($id == 16) {
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
        }
         elseif ($id == 17) {
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
        elseif ($id == 18) {
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
        }
        elseif ($id == 19) {
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
        }
        elseif ($id == 20) {
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
        }
        elseif ($id == 21) {
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
        }
        elseif ($id == 22) {
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
        }
        elseif ($id == 23) {
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
        }
        elseif ($id == 24) {
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
        }
        elseif ($id == 25) {
            $userdata = Supervision::where('user_id', $userid)->first();
            Storage::disk('uploads')->delete($userdata->license);
            Storage::disk('uploads')->delete($userdata->cost);

            $userdata->delete();
            $user->services()->detach([
                1 => ['user1_id ' => $userid],
                2 => ['service_id ' => $id],
            ]);
        }

        else {
            return response()->json([
              'message'=> 'هذه الخدمة غير متاحة'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'تم حذف الطلب بنجاح ',
        ], 200);
    }
    ///////////////////////////////////////////////////////////////////////

}
