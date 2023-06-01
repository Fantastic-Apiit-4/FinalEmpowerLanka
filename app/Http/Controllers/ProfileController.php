<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($request){
        $user = User::findOrFail($request);

        return view('otherprofile',['u'=>$user]);
    }
}
