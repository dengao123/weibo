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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程！');
        return redirect()->route('users.show',$user->id);




    }
    //编辑页面
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }
    //编辑
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = array();
        $data['name'] = $request->name;
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        //存储
        $user->update($data);

        session()->flash('success','用户信息修改成功');
        return redirect()->route('users.show',$user);

    }
    //删除
    public function delete()
    {

    }


}
