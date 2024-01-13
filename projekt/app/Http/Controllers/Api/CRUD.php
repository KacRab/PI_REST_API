<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CRUD extends Controller
{
    public function index()
    {
        $people = person::all();
        if ($people->count() > 0) {
            return response()->json([
                'status' => 200,
                'people' => $people
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No Records Found'
                ], 404);
        }
    }
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'phone' => 'required|digits:9',
            'street' => 'required|string|max:191',
            'city' => 'required|string|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=> 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $person = person::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'street' => $request->street,
                'city' => $request->city,
            ]);
            if ($person) {
                return response()->json([
                    'status'=> 200,
                    'message'=> 'person created succesfully'
                ], 200);
            }else{
                return response()->json([
                    'status'=> 500,
                    'message'=> 'something went wrong'
                ], 500);
            }
        }
    }
    public function show($id)
    {
        $person = person::find($id);
        if ($person) {
            return response()->json([
                'status'=> 200,
                'person'=> $person
            ], 200);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'no person found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $person = person::find($id);
        if ($person) {
            return response()->json([
                'status'=> 200,
                'person'=> $person
            ], 200);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'no person found'
            ], 404);
        }
    }
    public function update(Request $request,int $id)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:191',
            'lastname' => 'required|string|max:191',
            'phone' => 'required|digits:9',
            'street' => 'required|string|max:191',
            'city' => 'required|string|max:191',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=> 422,
                'errors' => $validator->messages()
            ], 422);
        }else{
            $person = person::find($id);
            if ($person) {
                $person->update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'phone' => $request->phone,
                    'street' => $request->street,
                    'city' => $request->city,
                ]);
                return response()->json([
                    'status'=> 200,
                    'message'=> 'person updated succesfully'
                ], 200);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'no person found'
                ], 404);
            }
        }
    }
    public function destroy($id)
    {
        $person = person::find($id);
        if ($person) {
            $person->delete();
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'no person found'
            ], 404);
        }
    }

}