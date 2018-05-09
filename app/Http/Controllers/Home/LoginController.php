<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    /**
     * [login 登录页面]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function login()
    {
        return view('home.login.login');
    }
    /**
     * [FunctionName 登录逻辑]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @param     string     $value [description]
     */
    public function toLogin()
    {
        //验证
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required|min:5',
            'is_remember'=>'integer',
        ]);
        //业务逻辑
        $user=request(['email','password']);
        $is_remember=request('is_remember');
        if(\Auth::attempt($user,$is_remember)){
            return redirect('/');
        }
        return \Redirect::back()->withErrors('邮箱密码不匹配');        
    }
    /**
     * [logout 退出登录]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect('/login');
    }
    /**
     * [register 注册页面]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function register()
    {
        return view('home.login.register');
    }
    /**
     * [register 注册逻辑]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function toRegister()
    {
        //验证
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|confirmed',
        ]);
        //业务逻辑
        $name=request('name');
        $email=request('email');
        $password=bcrypt(request('password'));
        $res=User::create(compact('name','email','password'));
        //渲染
        return redirect('/login');
    }
}
