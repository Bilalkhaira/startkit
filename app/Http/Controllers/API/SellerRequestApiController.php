<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;

class SellerRequestApiController extends Controller
{
    public function saveSellerRequest(Request $request)
    {
        try {
            
            SellerRequest::create([
                'email' => $request->email ?? '',
                'name' => $request->name ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
                'car_id' => $request->car_id ?? '',
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
