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
            ]);

            return response()->json('Record insert successfully');
        } catch (Exception $e) {

            return response()->json($e);
        }
    }
}
