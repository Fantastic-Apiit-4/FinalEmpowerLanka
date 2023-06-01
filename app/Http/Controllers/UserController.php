<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request){
        $user_id = auth()->user()->id;  
        $user = User::findOrFail($user_id);

        $user->name = $request->name;
        $user->phone =$request->phone;
        $user->address = $request->address;
        $user->description = $request->description;
        
        if($request->hasFile('profphoto')){
            $file = $request->file('profphoto');
            $extension = $file->getClientOriginalExtension();
            $newfilename = time().'.'.$extension;
            $file->move('uploads/profiles/',$newfilename);
            $user->profphoto = $newfilename;
        }

        $user->update();

        return redirect('/profiles/'.auth()->user()->id);
    }
}
