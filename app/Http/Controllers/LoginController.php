<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LogInRequest;
use DB;
use App\Models\Admin;

class LoginController extends Controller

{  

    public function getLogin(){
        return view('admin_login');  
    }

    //Chuc nang dang nhap
    public function postLogin(LogInRequest $request){
        $email = $request->email;
        $password = $request->password;
        $result = Admin::where(['email'=>$email, 'password'=>$password])->first();
        if(isset($result)){
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            return redirect()->to('dashboard');
        }
        else{
            return redirect()->back()
                ->with('error','Sai tên đăng nhập hoặc mật khẩu. Xin vui lòng thử lại.')
                ->withInput();
        }
          
    }

    //Chuc nang dang xuat
    public function logout(){
       Session::forget(['admin_name','admin_id']);
       return redirect()->route('getLogin');
    }

    
}
