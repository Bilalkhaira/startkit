<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

           $creater = User::find($car->created_by);

           $car['seller_name'] = $creater->name;
           $car['seller_phone'] = $creater->phone_no;
           $car['seller_email'] = $creater->email;

           $car['image_path'] = 'https://001cars.mradevelopers.com/images/';

            return response()->json($car);

        }catch (Exception $e){

            return response()->json($e);
        }
    }

    public function filterCar(Request $request)
    {
        try
        {
        if( !empty($request->model) && !empty($request->price))
        {
            $cars = Car::where('vehicle_name', $request->model)->where('vehicle_price', $request->price)->get();

        } else {
            $cars = Car::query()
            ->when(request('model'), function (Builder $query, string $search) {
                $query->where('vehicle_name', $search);
            })
            ->when(request('price'), function (Builder $query, string $price) {
                $query->whereBetween('vehicle_price', [1, $price]);
            })
            ->get();
        }

        foreach($cars as $key => $path)
        {
         $cars[$key]['image_path'] = 'https://001cars.mradevelopers.com/images/';
        }
         return response()->json($cars);

        }catch (Exception $e){

            return response()->json($e);
        }
      
    }

    public function filterCarGetRequest($model)
    {
        try
        {
            $cars = Car::query()
            ->when(request('model'), function (Builder $query, string $search) {
                $query->where('vehicle_name', $search);
            })
            ->get();

        foreach($cars as $key => $path)
        {
         $cars[$key]['image_path'] = 'https://001cars.mradevelopers.com/images/';
        }
         return response()->json($cars);

        }catch (Exception $e){

            return response()->json($e);
        }
      
    }

    public function filterCarByRange(Request $request)
    {
        try
        {
        if( !empty($request->max_range) && !empty($request->min_range))
        {
            $cars = Car::whereBetween('vehicle_price', [$request->min_range, $request->max_range])->get();

        } else {
            return response()->json('First enter max and min range then form submit');
        }

        foreach($cars as $key => $path)
        {
         $cars[$key]['image_path'] = 'https://001cars.mradevelopers.com/images/';
        }
         return response()->json($cars);

        }catch (Exception $e){

            return response()->json($e);
        }
      
    }
}
