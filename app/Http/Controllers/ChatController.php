<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ChatController extends Controller
{
    public function seeUsers(){
        $users = User::where('id', '!=', auth()->id())->get();
        $print = " ";
        $owner = auth()->id();
        if($users->count()>0){
            foreach($users as $user){
                $friend =$user->id;
                $rq = DB::table('messages')
                ->where(function ($query) use ($owner, $friend) {
                    $query->where('sender_id', $owner)
                          ->where('reciever_id', $friend);
                })
                ->orWhere(function ($query) use ($owner, $friend) {
                    $query->where('sender_id', $friend)
                          ->where('reciever_id', $owner);
                })
                ->latest('created_at')
                ->first();
                
                ($rq ? $mprint=$rq->msg : $mprint='no chats');
                if (strlen($mprint)>16){
                    $mprint = substr($mprint,0,16)."...";
                }

                $print .= '<a class="userlink" href="/chatting/'.$user->id.'">
                <div class="content">
                <img src="/uploads/profiles/'.$user->profphoto.'" alt="">
                <div class="details">
                <div class="users_det">
                <span class="username">'.$user->username.'</span>
                
                </div>
                <p class="last_msg">'.$mprint.'</p>
                </div>
                </div>
                <div class="status_dot"><span class="roletext '.$user->role.'"><i class="uil uil-chat-bubble-user
                "></i></span></div>
                </a>';
            }
        }
        else{
            $print.='no users available to chat';
        }
        


        return response()->json($print);
        
    }

    public function searchUsers(Request $request){
        $search= $request->input('s_user');
        $users = User::where('name', 'LIKE', "%{$search}%")->get();
        $print = " ";
        if($users->count()>0){
            foreach($users as $user){
                $print .= '<a href="/chatting/'.$user->id.'">
                <div class="content">
                <img src="/uploads/profiles/'.$user->profphoto.'" alt="">
                <div class="details">
                <span>'.$user->username.'</span>
                <p>message</p>
                </div>
                </div>
                <div class="status_dot"><i class="fas fa-circle"></i></div>
                </a>';
                
            }
        }
        else{
            $print.='No such user found';
        }
        
        
     


        return response($print);

        

    }

    public function chatting($id){
        $user = $id;
        $reciever = User::whereIn('id', [$id])->first();
        return view('chat.chats',['u'=>$reciever]);
    }

    public function showChats(Request $request){
        $sender = $request->input('sender');
        $reciever = $request->input('reciever');
        $print = "";
        $friend = User::whereIn('id', [$reciever])->first();

        $rq = DB::table('messages')
    ->where(function ($query) use ($sender, $reciever) {
        $query->where('sender_id', $sender)
              ->where('reciever_id', $reciever);
    })
    ->orWhere(function ($query) use ($sender, $reciever) {
        $query->where('sender_id', $reciever)
              ->where('reciever_id', $sender);
    })
    ->get();
        foreach($rq as $r){
            if($r->sender_id === $sender){
                $print .= '<div class="chats outgoing">
                                <div class="details">
                                    <p>' .$r->msg. '
                                    <br/>
                                    <span class="chattime">'.$r->created_at.'</span>
                                    </p>
                                    
                                </div>
                                </div>';
            }
            else if ($r->sender_id === $reciever){
                $print .= ' <div class="chats incoming">
                                <img src="/uploads/profiles/'.$friend->profphoto.'" alt="">
                                <div class="details">
                                <p>' .$r->msg. '
                                <br/>
                                <span class="chattime">'.$r->created_at.'</span>
                
                                </p>
                                
                                 </div>
                                </div>';
            }
    
        }
        
        return response($print);
    }

    public function addchat(Request $request){
        $sender = $request->input('sender');
        $reciever = $request->input('reciever');
        $msg = $request->input('message');

        $message = new Messages;

        $message->sender_id = $sender;
        $message->reciever_id = $reciever;
        $message->msg = $msg;
        $message->save();
    }
}
