<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials=$this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);
       
        if(Auth::attempt($credentials,$request->has('remrember'))){
            session()->flash('success','欢迎回来...');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            session()->flash('danger','sorry,您的邮箱和密码不匹配！！！');
            //return redirect()->route('login');
            return redirect()->back()->withInput();
        }

        return;
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success','您已经成功推出...');
        return redirect()->route('login');
    }
}