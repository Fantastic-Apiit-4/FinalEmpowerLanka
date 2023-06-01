<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'postimage' => 'mimes:jpeg,png,bmp,tiff |max:4096'
        ]);



        if ($request->hasFile('postimage')) {
            $file = $request->file('postimage');
            $extension = $file->getClientOriginalExtension();
            $newfilename = time() . '.' . $extension;
            $file->move('uploads/postimg/', $newfilename);
        } else {
            $newfilename = null;
        }

        $post = new Post;

        $post->title = $request->input('title');
        $post->user_id = auth()->user()->id;
        $post->description = $request->input('description');
        $post->subject = $request->input('subject');
        $post->postimage = $newfilename;
        $post->save();

        return redirect('/home/general');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function postComments($postid)
    {
        $post = Post::findOrFail($postid);

        return view('comments', ['pd' => $post]);
    }


    public function getcomm(Request $request)
    {

        $post_id = $request->input('post_id');
        $comments = Comment::where('post_id', $post_id)->orderBy('created_at', 'desc')->get();
        $out = '';

        foreach ($comments as $cm) {
            $user = User::findORFail($cm->user_id);
            $out .= '<div class="panel">
            <div class="panel-body">

                  <div class="media-block">
                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture"
                                    src="/uploads/profiles/' . $user->profphoto . '"></a>
                        <div class="media-body">
                              <div class="mar-btm">
                                    <a href="/profiles/' . $user->id . '" class="comment-name">' . $user->username . '</a>
                                    <span class="postrole ' . $user->role . '">' . $user->role . '</span>
                                    <p class="comment-time">' . $cm->created_at . '</p>
                              </div>
                              <p class="comment-desc">' . $cm->comment . '</p>
                              <div class="pad-ver">
                                    
                              </div>
                        </div>
                  </div>
                </div>
            </div>';

        }

        return response($out);

    }
}