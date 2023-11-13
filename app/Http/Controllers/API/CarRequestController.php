<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\CarRequest;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarRequestController extends Controller
{
    public function saveCarRequest(Request $request)
    {
        try {

            $user = User::role('super admin')->first();
            $details = [
                'car_name' => $request->car_name ?? '',
                'rental_type' => $request->rental_type ?? '',
                'budget' => $request->budget ?? '',
                'name' => $request->name ?? '',
                'email' => $request->email ?? '',
                'phone' => $request->phone ?? '',
                'message' => $request->message ?? '',
            ];
            $insertUser = $user->notify(new \App\Notifications\AdminNotification($details));

            // $generate_token = Str::random(32);
            // $token = Notification::latest('created_at')->first();
            // CarRequest::create([
            //     'car_name' => $request->car_name ?? '',
            //     'rental_type' => $request->rental_type ?? '',
            //     'budget' => $request->budget ?? '',
            //     'name' => $request->name ?? '',
            //     'email' => $request->email ?? '',
            //     'phone' => $request->phone ?? '',
            //     'message' => $request->message ?? '',
            //     'token' => $token->id ?? '',
            // ]);

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
