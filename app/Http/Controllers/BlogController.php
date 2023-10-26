<?php

namespace App\Http\Controllers;

use File;
use Exception;
use App\Models\Car;
use App\Models\User;
use App\Models\CarImages;
use Illuminate\Http\Request;
use App\DataTables\BlogsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogsDataTable $dataTable)
    {
        return $dataTable->render('pages.blogs.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(1);
        return view('pages.blogs.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $newRecord = Car::create([
                'created_by' => auth()->user()->id ?? '',
                'seller_name' => $request->seller_name ?? '',
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
            return view('pages.blogs.show', compact('car'));
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

            return view('pages.blogs.edit', compact('car'));
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
            $updateRecord = Blog::find($request->updateId);

            $updateRecord->update([
                'seller_name' => $request->seller_name ?? '',
                'seller_phone' => $request->seller_phone ?? '',
                'seller_address' => $request->seller_address ?? '',
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
            $imgpath = public_path('images/blogs/');
            $imgRecord = Blog::find($id);
            $path = $imgpath . $imgRecord->img;

            if (File::exists($path)) {
                File::delete($path);
            }

            $imgRecord->delete();

            toastr()->success('Delete Successfully');

            return redirect()->route('blogs.index');

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

   
}
