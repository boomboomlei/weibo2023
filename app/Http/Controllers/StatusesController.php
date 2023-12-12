<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\User;
use Auth;
class StatusesController extends Controller
{
    public function  __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request,User $user){
        $this->validate($request,[
            'content'=>'required|max:140'
        ]);
// echo "<pre>";
//var_dump($user);
// var_dump(Auth::user());
// return;
        Auth::user()->statuses()->create([
            'content'=>$request['content']
        ]);

        
        session()->flash('success','发布成功');
        return redirect()->back();
    }
}
