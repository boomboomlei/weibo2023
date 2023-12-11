<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest',[
            'only'=>['create']
        ]);
        $this->middleware('throttle:10,10',[
            'only'=>['store']
        ]);
    }
    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials=$this->validate($request,[
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);
       
        if(Auth::attempt($credentials,$request->has('remrember'))){
           if(Auth::user()->activated){
                session()->flash('success','欢迎回来...');
                //return redirect()->route('users.show',[Auth::user()]);
                $fallback=route('users.show',[Auth::user()]);
                return redirect()->intended($fallback);//返回上次尝试登陆的页面
           }else{
                Auth::logout();
                session()->flash('warning','您的账号未激活，请查看邮箱中的祖册邮件进行激活。');
                return redirect('/');
           }
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
