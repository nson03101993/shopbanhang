<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\User;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Tags;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;
use File;
use Illuminate\Support\Facades\Hash;

session_start();

class UserController extends Controller
{   
    public function getLogin(){
        return view('pages.login.login');
    }

    public function getRegister(){
        return view('pages.login.register');
    }

    //register or create new account
    public function postRegister(UserRequest $request){
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;

        $result = $user->save();
        if($result){
            return redirect()->route('register_success');
        }
    }

    public function registerSuccess(){
        return view('pages.login.register_success');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username',$username)->first();
        if($user){
            if(Hash::check($password,$user->password)){
                Session::put('username',$username);
                Session::put('user_id',$user->user_id);
                return redirect()->route('show_cart');
            }
        }
        else{
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác. Xin vui lòng thử lại');
        } 
    }

    public function logout(){
        Session::flush();
        return redirect()->route('home_page');
    }

    //////News
    public function showNews(){
        $news = News::where('status', 1)->orderBy('id', 'DESC')->paginate(3);
        return view('pages.news.show_news', compact('news'));
    }

}
