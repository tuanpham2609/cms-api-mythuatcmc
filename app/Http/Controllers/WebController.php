<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Posts;
use App\Homes;
use App\Comments;
use App\Contacts;

class WebController extends Controller
{
    //
    public function getHeader(){
        $menu = Categories::all();
        $logo = Homes::first();
        $XH = Posts::orderBy('created_at', 'desc')->where('slugCategory','=','xa-hoi')->take(15)->get();
        $review = Posts::orderBy('created_at', 'desc')->where('slugCategory','=','review')->take(15)->get();
        $KinhTe = Posts::orderBy('created_at', 'desc')->where('slugCategory','=','kinh-te')->take(15)->get();
        $GiaoDuc = Posts::orderBy('created_at', 'desc')->where('slugCategory','=','giao-duc')->take(15)->get();
        $GiaiTri = Posts::orderBy('created_at', 'desc')->where('slugCategory','=','giai-tri')->take(15)->get();
        $topTrending = Posts::orderBy('created_at', 'desc')->where('new_highlights','=',1)->take(15)->get();
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
    public function getDetail($id){
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
    public function postcomment(Request $request){
        $comment = $request->all();
        Comments::create($comment);
        return response()->json([
            'message'=>'Comment thành công!!'
        ]);
    }
    public function getComment($id){
        $comment = Comments::where('idPost',$id)->orderBy('created_at', 'desc')->paginate(2);
        return response()->json([
            'comments'=> $comment
        ]);
    }
    public function updateComment(Request $request,$id){
        $comment = Comments::find($id);
        $data = $request->all();
        $comment->update($data);
        return response()->json([
            'messsage'=>'Update thành công comment !!!'
        ]);
    }
    public function createContact(Request $request) {
        $contact = $request->all();
        Contacts::create($contact);
        return response()->json([
            'message'=>'Contact thành công!!'
        ]);
    }
}
