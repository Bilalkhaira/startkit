<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CarRequestModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarRequestController extends Controller
{
    public function saveCarRequest(Request $request)
    {
        try{
            // $code = rand(1111,9999);
            $generate_token = Str::random(32);

            CarRequestModel::create([
                'car_name' => $request->car_name ?? '',
                'rental_type' => $request->rental_type ?? '',
                'budget' => $request->budget ?? '',
                'name' => $request->name ?? '',
                'email' => $request->email ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
                'token' => $generate_token ?? '',
            ]);

            return response()->json('Record insert successfully');

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}
