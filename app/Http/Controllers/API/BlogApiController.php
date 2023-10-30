<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogApiController extends Controller
{
    public function index()
    {
        try{

           $blogs = Blog::all();
           foreach($blogs as $blog)
           {
            $blog['img'] = public_path('images/blog/').$blog->img;
           }

            return response()->json($blogs);

        }catch (Exception $e){

            return response()->json($e);
        }
    }

    public function show($id)
    {
        try{

           $blog = Blog::find($id);
           $blog['img'] = public_path('images/blog/').$blog->img;
            return response()->json($blog);

        }catch (Exception $e){

            return response()->json($e);
        }
    }
}