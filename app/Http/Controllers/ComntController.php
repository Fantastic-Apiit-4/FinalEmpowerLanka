<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class ComntController extends Controller
{
    public function addcomment(Request $request){
        $comment = $request->input('comment');
        $post_id = $request->input('post_id');
        $user_id = $request->input('user_id');

        $comm = new Comment();
        $comm->post_id = $post_id;
        $comm->user_id = $user_id;
        $comm->comment = $comment;
        $comm->save();
    }
}
