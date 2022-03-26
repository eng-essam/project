<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnionResource;
use App\Models\Union;
use Illuminate\Http\Request;

class ApiUnionController extends Controller
{
      /// every unions
      public function index(){
        $unions = Union::get();
        return UnionResource::collection($unions);
    }
      /// every union with its services
    public function show($id){
       $union = Union::with('services')->find($id);
       if($union==null){
          return response()->json([
              'status' => false,
              'message'=> 'هذه النقابة غير موجودة ',
            ],404);
       }
        return new UnionResource($union);
    }
}