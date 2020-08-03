<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Posts;
use App\Homes;

class WebController extends Controller
{
    //
    public function getHeader(){
        $menu = Categories::all();
        $logo = Homes::all();
        $XH = Posts::orderBy('created_at', 'desc')->where('idCategory','=',22)->take(10)->get();
        $review = Posts::orderBy('created_at', 'desc')->where('idCategory','=',23)->take(10)->get();
        $KinhTe = Posts::orderBy('created_at', 'desc')->where('idCategory','=',18)->take(10)->get();
        $GiaoDuc = Posts::orderBy('created_at', 'desc')->where('idCategory','=',19)->take(10)->get();
        $GiaiTri = Posts::orderBy('created_at', 'desc')->where('idCategory','=',21)->take(10)->get();
        $topTrending = Posts::orderBy('created_at', 'desc')->where('new_highlights','=',1)->take(10)->get();
        return response()->json([
            'menu'=>$menu,
            'logo'=>$logo,
            'postXH'=>$XH,
            'Review'=>$review,
            'topTrending'=>$topTrending,
            'KinhTe'=>$KinhTe,
            'GiaoDuc'=>$GiaoDuc,
            'GiaiTri'=>$GiaiTri,
        ]);
    }
    public function postDetail($id){
        $post = Posts::find($id);
        $category = Posts::where('idCategory',$post->idCategory)->take(5)->get();
        return response()->json([
            'post'=>$post,
            'category'=>$category,
        ]);
    }
    public function getCategory($id){
        $category = Posts::where('idCategory',$id)->paginate(1);
        $siderbar = Posts::orderByRaw('RAND()')->take(5)->get();
        return response()->json([
            'siderbar'=>$siderbar,
            'category'=>$category,
        ]);
    }
}
