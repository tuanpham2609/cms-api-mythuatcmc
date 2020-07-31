<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Homes;

class WebController extends Controller
{
    //
    public function getHeader(){
        $menu = Categories::all();
        $logo = Homes::all();
        return response()->json([
            'menu'=>$menu,
            'logo'=>$logo,
        ]);
    }
}
