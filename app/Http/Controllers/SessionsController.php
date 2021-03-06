<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    //登录页面
    public function create()
    {
        return view('sessions.create');
    }

    //登录
    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','欢迎回来！');
            $fallback = route('users.show',Auth::user());
            return redirect()->intended($fallback);
        }else{
            session()->flash('danger','错误，邮箱和密码不匹配！');
            return redirect()->back()->withInput();
        }
    }

    //退出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已经成功退出');
        return redirect('login');
    }

}
