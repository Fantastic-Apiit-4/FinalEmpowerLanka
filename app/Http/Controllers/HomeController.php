<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($request)
    {
        
        $user = auth()->user();
        $name = 'blank';
        $dataprint = Post::orderBy('id', 'DESC')->get();
        if($request =='general'){
            $name = 'General';
            $data = $dataprint;
        }
        elseif($request =='myfeed'){
            $name = 'My Feed';
            if($user->role == 'customer'){
                $data = $dataprint->whereIn('subject',['Advertisement']); 
            }
            else if($user->role == 'investor'){
                $data = $dataprint->whereIn('subject',['Fundraiser','Advice']); 
            }
            else if($user->role == 'distributor'){
                $data = $dataprint->whereIn('subject',['Fundraiser','Advice','Advertisement']); 
            }
            else if($user->role == 'entrepreneur'){
                $data = $dataprint->whereIn('subject',['Distribution','Funding']); 
            }
            else{
                $data = $dataprint;
            }
        }
        elseif($request == 'mypost'){
            $name = 'My Post';
            $data = $dataprint->whereIn('user_id',$user->id); 
        }
        else{
            abort(404);
        }
        return view('home',['pd'=>$data,'pp'=>$name]);
    }
}
