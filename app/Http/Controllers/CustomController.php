<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CustomController extends Controller
{
    public function getallcategory(){
        $categories = Categories::all();
        return response()->json([
            'categories'=>$categories
        ]);
    }
}
