<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\CarRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarRequestController extends Controller
{
    public function saveCarRequest(Request $request)
    {
        try{
            // $generate_token = Str::random(32);

            CarRequest::create([
                'car_name' => $request->car_name ?? '',
                'rental_type' => $request->rental_type ?? '',
                'budget' => $request->budget ?? '',
                'name' => $request->name ?? '',
                'email' => $request->email ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
                // 'token' => $generate_token ?? '',
            ]);

            return response()->json('Record insert successfully');

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}
