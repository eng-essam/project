<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnionResource;
use App\Models\Union;
use Illuminate\Http\Request;

class ApiUnionController extends Controller
{
      /// كل النقابات
      public function index(){
        $unions = Union::get();
        return UnionResource::collection($unions);
    }
      /// كل نقاية بخدماتها
    public function show($id){

       $union = Union::with('services')->find($id);
       if($union==null){
          return response()->json([
              'status' => false,
              'message'=> 'هذه النقابة غير موجودة ',
          ]);
       }
        return new UnionResource($union);
    }
}
