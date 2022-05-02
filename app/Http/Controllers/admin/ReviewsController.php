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
use App\Models\User;

class ReviewsController extends Controller
{
    public function reviews($service, $member)
    {
        $data['user'] = User::find($member)->first();
        $data['service'] = Service::find($service)->first();
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
    }
}
