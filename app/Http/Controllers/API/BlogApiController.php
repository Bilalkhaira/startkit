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
            // $blog['img'] = public_path('images/blog/').$blog->img;
            
            if(!empty($blog['img'])){
               $blog['img'] = 'https://001cars.mradevelopers.com/images/blog/'.$blog->img;
            } 
            
           }

            return response()->json($blogs);

        }catch (Exception $e){
            $success['status'] =  400;
            $success['message'] =  $e->getMessage();
            return response()->json($success);
        }
    }

    public function show($id)
    {
        try{
           $blog = Blog::find($id);
           if(!empty($blog['img'])){
               $blog['img'] = 'https://001cars.mradevelopers.com/images/blog/'.$blog->img;
           } 
           if(!empty($blog)){
                 return response()->json($blog);
           } else {
             $success['status'] =  404;
            return response()->json($success);
           }
           
        }catch (Exception $e){

            $success['status'] =  400;
            $success['message'] =  $e->getMessage();
            return response()->json($success);
        }
    }
}
