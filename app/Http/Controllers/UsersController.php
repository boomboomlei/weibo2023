<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        // echo "<pre>";
        // var_dump(['user'=>$user]);
        // return;
       // return view('users.show',compact('user'));
        return view('users.show',['user'=>$user]);
       
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:users|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);
        

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~');

        return redirect()->route('users.show',['user'=>$user]);
        //return redirect()->route('users.show',$user);
    }

    public function edit(User $user){
       // return view('users.edit',compact('user'));
       return view('users.edit',['user'=>$user]);
       
    }

    public function update(User $user,Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'password'=>'nullable|confirmed|min:6'

        ]);
        // $user->update([
        //     'name'=>$request->name,
        //     'password'=>bcrypt($request->password)
        // ]);
        $data=[];
        $data['name']=$request->name;
        if($request->password){
            $data['password']=bcrypt($request->password);
            
        }

        $user->update($data);

        session()->flash('success','个人资料编辑成功');
        return redirect()->route('users.show',['user'=>$user]);
    }
}
