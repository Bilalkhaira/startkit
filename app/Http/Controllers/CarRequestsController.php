<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\User;
use App\Models\CarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CarsRequestDataTable;

class CarRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CarsRequestDataTable $dataTable)
    {
        $user = $user = User::role('super admin')->first();
        $user->unreadNotifications->markAsRead();
        return $dataTable->render('pages.carRequest.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = $user = User::role('super admin')->first();
            $user->unreadNotifications->where('id',$id)->markAsRead();
            $carRequest = CarRequest::find((int)$id);

            return view('pages.carRequest.show', compact('carRequest'));

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
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $car = CarRequest::findOrFail((int)$id);

            $car->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('car-request.index');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    
}
