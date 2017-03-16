<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommenController;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommenController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function add()
    {
        return view('admin.add');
    }

    public function get_list()
    {
        return view('admin.list');
    }

    public function tab()
    {
        return view('admin.tab');
    }

    public function img()
    {
        return view('admin.img');
    }

    public function pass()
    {
        //更改密碼
        if($input = Input::all()){
            $rules = [
                'password' => 'required|between:6,20|confirmed',  //依次表示不能為空 新密碼必需在6到20位之間 新密碼不一致
            ];
            $message = [
                'password.required' => '新密碼不能為空',
                'password.between' => '新密碼必需在6到20位之間',
                'password.confirmed' => '新密碼不一致',
            ];
           $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                 $user = User::first();
                 $_password = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $_password){
                 $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors', '密码修改成功!');
                } else {
                    return back()->with('errors', '原密碼錯誤');
                }
            } else {
                     return back()->withErrors($validator);
            }
        } else {
            return view('admin.pass');
        }
    }

}
