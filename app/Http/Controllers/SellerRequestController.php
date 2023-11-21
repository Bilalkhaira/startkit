<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;
use App\DataTables\SellerRequestDataTable;

class SellerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SellerRequestDataTable $dataTable)
    {
        return $dataTable->render('pages.sellerRequest.list');
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
            $sellerRequest = SellerRequest::find((int)$id);

            return view('pages.sellerRequest.show', compact('sellerRequest'));

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

            $sellerRequest = SellerRequest::findOrFail((int)$id);

            $sellerRequest->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('seller-request.index');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    
}
