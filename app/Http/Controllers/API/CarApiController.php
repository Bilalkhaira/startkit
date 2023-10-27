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

           $cars = Car::all();

            return response()->json($cars);

        }catch (Exception $e){

            return response()->json($e);
        }
    }

    public function show($id)
    {
        try{

           $car = Car::find($id);

            return response()->json($car);

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}
