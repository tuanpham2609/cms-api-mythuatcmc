<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use App\Abouts;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = Abouts::paginate(1);
        return response()->json([
            'abouts'=>$abouts
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
        $data = $request->all();
        Abouts::create($data);
        return response()->json([
            'message'=>'Tạo mới thành công'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = Abouts::find($id);
        return response()->json([
            'data'=>$about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = Abouts::find($id);
        $data = $request->all();
        $about->update($data);
        return response()->json([
            'messsage'=>'Update thành công'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Abouts::find($id);
        $about->delete();
        return response()->json([
            'message'=>'Xóa thành công'
        ]);
    }
}
