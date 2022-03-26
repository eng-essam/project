<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
       /// every union with its services
       public function show($id){
        $service = Service::find($id);
        if($service==null){
            return response()->json([
                'status' => false,
                'message'=> 'هذه الخدمة غير متاحة ',
              ],404);
         }
         return new ServiceResource($service);
     }
}