<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\User;
use App\Models\CarImages;
use Illuminate\Http\Request;
use App\DataTables\CarsDataTable;
use App\Http\Controllers\Controller;
use App\Models\CarModel;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CarsDataTable $dataTable)
    {
        return $dataTable->render('pages.cars.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carModels = CarModel::whereNull('parrent_id')->get();
        return view('pages.cars.add', compact('carModels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if(!empty($request->other_model)){
                $model = $request->other_model;
                $decodeModel[] = $request->model[0];
            }
            else {
                if(!empty($request->model3)){
                    $carModel = CarModel::find($request->model3);
                    $model = $carModel->name;
    
                    $decodeModel = $request->model;
                    $decodeModel[] = $request->model3;
                } else {
                    $carModel = CarModel::find($request->model[1]);
                    $model = $carModel->name;
                    $decodeModel = $request->model;
                }
            }

            $newRecord = Car::create([
                'created_by' => auth()->user()->id ?? '',
                'seller_name' => auth()->user()->name ?? '',
                'seller_phone' => auth()->user()->phone_no ?? '',
                'seller_address' => auth()->user()->address ?? '',
                'seller_email' => auth()->user()->email ?? '',
                'vehicle_name' => $model ?? '',
                'vehicle_price' => $request->vehicle_price ?? '',
                'gearbox' => $request->gearbox ?? '',
                'first_registration' => $request->first_registration ?? '',
                'power' => $request->power ?? '',
                'body_type' => $request->body_type ?? '',
                'type' => $request->type ?? '',
                'drivetrain' => $request->drivetrain ?? '',
                'seats' => $request->seats ?? '',
                'doors' => $request->doors ?? '',
                'offer_number' => $request->offer_number ?? '',
                'warranty' => $request->warranty ?? '',
                'mileage' => $request->mileage ?? '',
                'engine_size' => $request->engine_size ?? '',
                'gears' => $request->gears ?? '',
                'cylinders' => $request->cylinders ?? '',
                'empty_weight' => $request->empty_weight ?? '',
                'fuel_type' => $request->fuel_type ?? '',
                'fuel_consumption_2' => $request->fuel_consumption2 ?? '',
                'COemissions' => $request->COemissions ?? '',
                'emission_class' => $request->emission_class ?? '',
                'comfort_convenience' => $request->comfort_convenience ?? '',
                'entertainment_media' => $request->entertainment_media ?? '',
                'safety_security' => $request->safety_security ?? '',
                'extras' => $request->extras ?? '',
                'colour' => $request->colour ?? '',
                'manufacturer_colour' => $request->manufacturer_colour ?? '',
                'upholstery_colour' => $request->upholstery_colour ?? '',
                'upholstery' => $request->upholstery ?? '',
                'description' => $request->vehicle_description ?? '',
                'service_history' => $request->service_history ?? '',
                'non_smoker' => $request->non_smoker ?? '',
                'models' => json_encode($decodeModel) ?? '',
            ]);


            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {

                    $imgpath = public_path('images/');

                    $imageName = $image->getClientOriginalName();
                    $image->move($imgpath, $imageName);

                    CarImages::create([
                        'car_id' => $newRecord->id ?? '',
                        'images' => $imageName ?? ''
                    ]);
                }
            }

            toastr()->success('Created Successfully');

            return redirect()->route('cars.index');
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $car = Car::with('images')->where('id', $id)->first();
            return view('pages.cars.show', compact('car'));
        } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        try {
            $car = Car::with('images')->where('id', $id)->first();

            $models = CarModel::whereNull('parrent_id')->get();

            $carModels = json_decode($car->models);

            $models2 = CarModel::where('parrent_id', $carModels[0])->get();

            if(count($carModels) == 3) {

                $models3 = CarModel::where('parrent_id', $carModels[1])->get();

                return view('pages.cars.edit', compact(['car', 'models', 'models2', 'models3']));
            } else {
                return view('pages.cars.edit', compact(['car', 'models', 'models2']));
            }






            
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            if(!empty($request->other_model)){
                $model = $request->other_model;
                $decodeModel[] = $request->model[0];
            }
            else {
                if(!empty($request->model3)){
                    $carModel = CarModel::find($request->model3);
                    $model = $carModel->name;
    
                    $decodeModel = $request->model;
                    $decodeModel[] = $request->model3;
                } else {
                    $carModel = CarModel::find($request->model[1]);
                    $model = $carModel->name;
                    $decodeModel = $request->model;
                }
            }

            $updateRecord = Car::find($request->updateId);

            $updateRecord->update([
                // 'seller_name' => $request->seller_name ?? '',
                // 'seller_phone' => $request->seller_phone ?? '',
                // 'seller_address' => $request->seller_address ?? '',
                // 'seller_email' => $request->seller_email ?? '',
                'vehicle_name' => $model ?? '',
                'vehicle_price' => $request->vehicle_price ?? '',
                'gearbox' => $request->gearbox ?? '',
                'first_registration' => $request->first_registration ?? '',
                'power' => $request->power ?? '',
                'body_type' => $request->body_type ?? '',
                'type' => $request->type ?? '',
                'drivetrain' => $request->drivetrain ?? '',
                'seats' => $request->seats ?? '',
                'doors' => $request->doors ?? '',
                'offer_number' => $request->offer_number ?? '',
                'warranty' => $request->warranty ?? '',
                'mileage' => $request->mileage ?? '',
                'engine_size' => $request->engine_size ?? '',
                'gears' => $request->gears ?? '',
                'cylinders' => $request->cylinders ?? '',
                'empty_weight' => $request->empty_weight ?? '',
                'fuel_type' => $request->fuel_type ?? '',
                'fuel_consumption_2' => $request->fuel_consumption2 ?? '',
                'COemissions' => $request->COemissions ?? '',
                'emission_class' => $request->emission_class ?? '',
                'comfort_convenience' => $request->comfort_convenience ?? '',
                'entertainment_media' => $request->entertainment_media ?? '',
                'safety_security' => $request->safety_security ?? '',
                'extras' => $request->extras ?? '',
                'colour' => $request->colour ?? '',
                'manufacturer_colour' => $request->manufacturer_colour ?? '',
                'upholstery_colour' => $request->upholstery_colour ?? '',
                'upholstery' => $request->upholstery ?? '',
                'description' => $request->vehicle_description ?? '',
                'service_history' => $request->service_history ?? '',
                'non_smoker' => $request->non_smoker ?? '',
                'models' => json_encode($decodeModel) ?? '',
            ]);


            if (!empty($request->images[0])) {
                foreach ($request->images as $image) {

                    $imgpath = public_path('images/');

                    $imageName = $image->getClientOriginalName();
                    $image->move($imgpath, $imageName);

                    CarImages::create([
                        'car_id' => $request->updateId ?? '',
                        'images' => $imageName ?? ''
                    ]);
                }
            }

            toastr()->success('Record Updated Successfully');

            return redirect()->route('cars.index');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $images = CarImages::where('car_id', $id)->pluck('images');
            $imgpath = public_path('images/');

            foreach ($images as $image) {
                $path = $imgpath . $image;

                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $car = Car::findOrFail($id);

            $car->delete();

            CarImages::where('car_id', $id)->delete();

            toastr()->success('Deleted Successfully');

            return redirect()->route('cars.index');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    public function imgDelete($id)
    {
        try {
            $imgpath = public_path('images/');
            $imgRecord = CarImages::find($id);
            $path = $imgpath . $imgRecord->images;

            if (File::exists($path)) {
                File::delete($path);
            }

            $imgRecord->delete();

            return response()->json('true');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    public function getModels($id)
    {
        try {
            $carModels = CarModel::where('parrent_id', $id)->get();

            return response()->json($carModels);
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }
}
