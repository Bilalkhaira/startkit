<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ContactRequest;
use App\Http\Controllers\Controller;

class ContactRequestApiController extends Controller
{
    public function save(Request $request)
    {
        try {
            
            ContactRequest::create([
                'email' => $request->email ?? '',
                'name' => $request->name ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
            ]);

            $success['status'] =  200;
            $success['message'] =  'Record insert successfully';
            return response()->json($success);
        } catch (Exception $e) {

            $success['status'] =  400;
            $success['message'] =  $e->getMessage();
            return response()->json($success);
        }
    }
}
