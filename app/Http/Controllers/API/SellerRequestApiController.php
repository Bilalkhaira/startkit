<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;

class SellerRequestApiController extends Controller
{
    public function saveSellerRequest(Request $request)
    {
        try {
            $car = Car::with('images')->find($request->car_id);
            SellerRequest::create([
                'email' => $request->email ?? '',
                'name' => $request->name ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
                'car_id' => $car->id ?? '',
                'car_name' => $car->vehicle_name ?? '',
                'car_price' => $car->vehicle_price ?? '',
                'car_img' => $car->images[0]->images ?? '',
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
