<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once ('resources/org/code/Code.class.php');
class LoginController extends CommenController
{
    public function login()
    {
        if ($input = Input::all()) {
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!= $_code){
                return back()->with('msg', '验证码错误');
//                back()返回前段
            }
            $user =User::first();
            if ($user->user_name = $input['user_name'] && Crypt::decrypt($user->user_pass) != $input['user_pass']){

                return back()->with('msg', '用户名或密码错误');
            }
                session(['user' => $user]);
                return redirect('admin/index');
        } else {
            //session(['user' => null]);
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

   public function crypt()
    {
        $str ='123456';
        $str1 = 'eyJpdiI6IkRsamh5SUxERVFDaFQ2OWxEVWlja1E9PSIsInZhbHVlIjoid3F0ak82Z3MzVjNmcUJyRUNYaTFJZz09IiwibWFjIjoiOTc0MDNkNmQ3NTE4NmVlOTg3MTNjYmU2M2E3NWIzODhmNTFkNTVhMmM0OTRkZjljOWM1OTBiZDI4ZjQ1M2Q2NSJ9';
        echo Crypt::encrypt($str).'<br/>';
        //echo Crypt::decrypt($str1);
    }

 public function quit()
 {
     session(['user' => null]);
     return redirect('admin/login');
 }

}
