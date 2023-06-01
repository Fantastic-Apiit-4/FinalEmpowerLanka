<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('auth.roleselection');
    }

    public function roleselect(Request $request){
        $data =$request->input('roles');
        return view('auth.register',['role'=>$data]);
    }
}
