<?php

namespace App\Http\Controllers\Api;

use App\Models\niit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NiitController extends Controller
{
    public function index (){
        return "Welcome to Niit API!";
    }

    public function createNiit (Request $request){

        // $validator = Validator::make($request->all(), [
        //     'firstname'=> 'required|string|Max:10',
        //     'lastname'=> 'required|string|Max:10',
        //     'department'=> 'required|string|Max:15',
        //     'course'=> 'required|string|Max:10',
        //     'phone'=> 'required|unique:niit|digits:11',

        // ]);

        // if ($validator->fails())
        // {
        //     return response() ->json([
        //         'status' => 422,
        //         'errors' => $validator->messages()
        //     ], 422);
        // } else {
        //         $niit = niit::create([
        //             'firstname' => $request->firstname,
        //             'lastname' => $request->lastname,
        //             'department' => $request->department,
        //             'course' => $request->course,
        //             'phone' => $request->phone,
        //     ]);
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

    public function allNiit () {
        $niitUsers = niit::all();

        if ($niitUsers->count () > 0) {
            return response()->json([
                'status' => 200,
                'message' => $niitUsers
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Niit users not found'
            ], 404);
        }
    }

    public function updateNiit (Request $request, int $id) {
        $validator = Validator::make($request->all(), [
            'firstname'=> 'required|string|Max:10',
            'lastname'=> 'required|string|Max:10',
            'department'=> 'required|string|Max:15',
            'course'=> 'required|string|Max:10',
            'phone'=> 'required|unique:niit|digits:11',

        ]);

        if ($validator->fails())
        {
            return response() ->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {

            $niit = niit::find($id);
        
            if ($niit) {                
                $niit-> update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'department' => $request->department,
                    'course' => $request->course,
                    'phone' => $request->phone,
            ]);
                return response()->json([
                    'status' => 201,
                    'message' => 'Niit updated successfully'
                ], 200);
            }else {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found'
                ], 500);
            }
              
        }
    }
    public function deleteNiit (int $id) {
       
            $niit = niit::find($id);
        
            if ($niit) {                
                $niit-> delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Niit deleted successfully'
                ], 200);
            }else {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found'
                ], 404);
            }
              
        }
    }

