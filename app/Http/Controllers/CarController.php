<?php

namespace App\Http\Controllers;

use File;
use App\Models\Car;
use Illuminate\Http\Request;
use App\DataTables\CarsDataTable;
use App\Http\Controllers\Controller;
use App\Models\CarImages;

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
        return view('pages.cars.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newRecord = Car::create([
            'seller_name' => $request->seller_name,
            'seller_phone' => $request->seller_phone,
            'seller_address' => $request->seller_address,
            'seller_email' => $request->seller_email,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_price' => $request->vehicle_price,
            'gearbox' => $request->gearbox,
            'first_registration' => $request->first_registration,
            'power' => $request->power,
            'body_type' => $request->body_type,
            'type' => $request->type,
            'drivetrain' => $request->drivetrain,
            'seats' => $request->seats,
            'doors' => $request->doors,
            'offer_number' => $request->offer_number,
            'warranty' => $request->warranty,
            'mileage' => $request->mileage,
            'engine_size' => $request->engine_size,
            'gears' => $request->gears,
            'cylinders' => $request->cylinders,
            'empty_weight' => $request->empty_weight,
            'fuel_type' => $request->fuel_type,
            'fuel_consumption_2' => $request->fuel_consumption2,
            'COemissions' => $request->COemissions,
            'emission_class' => $request->emission_class,
            'comfort_convenience' => $request->comfort_convenience,
            'entertainment_media' => $request->entertainment_media,
            'safety_security' => $request->safety_security,
            'extras' => $request->extras,
            'colour' => $request->colour,
            'manufacturer_colour' => $request->manufacturer_colour,
            'upholstery_colour' => $request->upholstery_colour,
            'upholstery' => $request->upholstery,
            'description' => $request->vehicle_description,
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

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::with('images')->where('id', $id)->first();
        return view('pages.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $car = Car::with('images')->where('id', $id)->first();

        return view('pages.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateRecord = Car::find($request->updateId);

        $updateRecord->update([
            'seller_name' => $request->seller_name,
            'seller_phone' => $request->seller_phone,
            'seller_address' => $request->seller_address,
            'seller_email' => $request->seller_email,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_price' => $request->vehicle_price,
            'gearbox' => $request->gearbox,
            'first_registration' => $request->first_registration,
            'power' => $request->power,
            'body_type' => $request->body_type,
            'type' => $request->type,
            'drivetrain' => $request->drivetrain,
            'seats' => $request->seats,
            'doors' => $request->doors,
            'offer_number' => $request->offer_number,
            'warranty' => $request->warranty,
            'mileage' => $request->mileage,
            'engine_size' => $request->engine_size,
            'gears' => $request->gears,
            'cylinders' => $request->cylinders,
            'empty_weight' => $request->empty_weight,
            'fuel_type' => $request->fuel_type,
            'fuel_consumption_2' => $request->fuel_consumption2,
            'COemissions' => $request->COemissions,
            'emission_class' => $request->emission_class,
            'comfort_convenience' => $request->comfort_convenience,
            'entertainment_media' => $request->entertainment_media,
            'safety_security' => $request->safety_security,
            'extras' => $request->extras,
            'colour' => $request->colour,
            'manufacturer_colour' => $request->manufacturer_colour,
            'upholstery_colour' => $request->upholstery_colour,
            'upholstery' => $request->upholstery,
            'description' => $request->vehicle_description,
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

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
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
    }

    public function imgDelete($id)
    {
        $imgpath = public_path('images/');
        $imgRecord = CarImages::find($id);
        $path = $imgpath . $imgRecord->images;

        if (File::exists($path)) {
            File::delete($path);
        }

        $imgRecord->delete();

        return response()->json('true');

    }
}
