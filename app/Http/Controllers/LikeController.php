<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function giveLike(Request $request){
        $post_id = $request->input('post_id');
        $user_id = $request->input('user_id');

        
            $like = new Like();
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();


        
    }
}
