<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function index()
    {

        $data['unions'] = Union::select('id', 'name')->get();
        return view('web.home')->with($data);
    }

    
}
