<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Models\ContactRequest;
use App\Http\Controllers\Controller;
use App\DataTables\ContactRequestDataTable;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactRequestDataTable $dataTable)
    {
        return $dataTable->render('pages.contactRequest.list');
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
            $contactRequest = ContactRequest::find((int)$id);

            return view('pages.contactRequest.show', compact('contactRequest'));

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

            $contactRequest = ContactRequest::findOrFail((int)$id);

            $contactRequest->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('contact-request.index');
       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    
}
