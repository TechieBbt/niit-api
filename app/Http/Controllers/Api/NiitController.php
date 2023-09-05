<?php

namespace App\Http\Controllers\Api;

use App\Models\niit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NiitController extends Controller
{
    public function index (){
        return "Welcome to Niit API!";
    }

    public function createNiit (Request $request){
        $niit = niit::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'department' => $request->department,
            'course' => $request->course,
            'phone' => $request->phone,
    ]);

    if ($niit) {
        return response()->json([
            'status' => 201,
            'message' => 'Niit created successfully'
        ], 201);
    }else {
        return response()->json([
            'status' => 500,
            'message' => 'Something went wrong'
        ], 500);
    }
    }
}
