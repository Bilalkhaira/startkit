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
use PhpParser\Node\Expr\Cast\Bool_;

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
        // dd($request->all());
        try {

            $imgpath = public_path('images/blog/');
            if (!empty($request->avatar)) {
                $file = $request->avatar;
                $fileName = time() . '.' . $file->clientExtension();
                $file->move($imgpath, $fileName);
            }

            // $imageUrl = 'images/blog/' . $fileName;
            // $imageAsset = asset($imageUrl);

            Blog::create([
                'created_by' => auth()->user()->id ?? '',
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'img' => $fileName ?? '',
            ]);

            toastr()->success('Created Successfully');

            return redirect()->route('blogs.index');
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
            $blog = Blog::find($id);
            return view('pages.blogs.show', compact('blog'));
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
            $blog = Blog::find($id);

            return response()->json($blog);

       } catch (Exception $e) {
            toastr()->error($e);

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function blogUpdate(Request $request)
    {
        try {
            $updatedRow = Blog::find($request->updateId);
            $imgpath = public_path('images/blog/');
            if (empty($request->avatar)) {
                $updateimage = $updatedRow->img;
            } else {
                $imagePath =  $imgpath . $updatedRow->img;
                
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $destinationPath = $imgpath;
                $file = $request->avatar;
                $fileName = time() . '.' . $file->clientExtension();
                $file->move($destinationPath, $fileName);
                $updateimage = $fileName;
    
                // $imageUrl = 'images/blog/' . $updateimage;
                // $updateimage = asset($imageUrl);
            }

           

            $updatedRow->update([
                'title' => $request->title ?? '',
                'description' => $request->description ?? '',
                'img' => $updateimage ?? '',
            ]);
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
        }
        toastr()->success('Update Successfully');

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $imgpath = public_path('images/blog/');
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
