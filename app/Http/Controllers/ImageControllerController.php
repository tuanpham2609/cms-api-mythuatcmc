<?php

namespace App\Http\Controllers;

use App\imageController;
use Illuminate\Http\Request;
use App\Images;
use File;

class ImageControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::all();
        return response()->json([
            'images'=>$images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exploded = explode(',',$request->image);

        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }
        $fileName = str_random().'.'.$extension;
        $path = public_path().'/img/'.$fileName;
        file_put_contents($path, $decoded);
        $data = Images::create([
            'img' => $fileName,
        ]);
        return response()->json([
            'data' => $data,
            'message' => 'Thêm thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\imageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function show(imageController $imageController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\imageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function edit(imageController $imageController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\imageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imageController $imageController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\imageController  $imageController
     * @return \Illuminate\Http\Response
     */
    public function destroy(imageController $imageController)
    {
        //
    }
}
