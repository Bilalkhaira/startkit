<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarApiController extends Controller
{
    public function index()
    {
        try{

           $cars = Car::with('images')->get();
           foreach($cars as $key => $path)
           {
            $cars[$key]['image_path'] = 'https://001cars.mradevelopers.com/images/';
           }
            return response()->json($cars);

        }catch (Exception $e){

            return response()->json($e);
        }
    }

    public function show($id)
    {
        try{

           $car = Car::with('images')->where('id', $id)->first();


           $car['image_path'] = 'https://001cars.mradevelopers.com/images/';

            return response()->json($car);

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}
