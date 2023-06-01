<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function ChangeMemberStatus(Request $request)
    {
        $users = User::find($request->id);
        $users->isban = $request->isban;
        $users->save();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function ban(Request $request)

    {

        $input = $request->all();

        if(!empty($input['id'])){

            $item = User::find($input['id']);

            $item->bans()->create([
                'expired_at' => '+1 month',
                
            ]);
        }

        return redirect()->route('admin.user.index')->with('success','Ban Successfully..');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function revoke($id)
    {
        if(!empty($id)){
            $item = User::find($id);
            $item->unban();
        }
        return redirect()->route('admin.user.index')->with('success','User Revoke Successfully.');

    }

    /**
     * To Update Status of User
     * @param Integer $user_id
     * @param Integer $status_code
     * @return Success Response.
     */

    public function updateStatus($user_id, $status_code){

           try{
            $update_user = User::whereId($user_id)->update([ 'isban' => $status_code
            ]);

            if($update_user){
                return redirect('admin/users')->with('success', 'User status updated');
            }
            return redirect('admin/users')->with('error','Fail to update');
           
        }catch (\Throwble $th){
            throw $th;

        }
    }


}