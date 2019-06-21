<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //显示所有用户
    public function index()
    {

    }
    //单个显示
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }
    //新增页面
    public function create()
    {
        return view('users.create');
    }
    //新增
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }
    //编辑页面
    public function edit()
    {

    }
    //编辑
    public function update()
    {

    }
    //删除
    public function delete()
    {

    }


}
