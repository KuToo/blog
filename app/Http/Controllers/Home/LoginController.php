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
    public function toLogin(Request $request)
    {
        if($request->isMethod('post')){
            //参数校验
            
        }
        dd($request);
        dd($request);
    }
    /**
     * [logout 退出登录]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function logout(Request $request)
    {
        if ($request->session()->exists('user.id')) {
            // session(['login'=>null]);
            $request->session()->forget('user');
        }
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
        // dd($request);
        $this->validate(request(),[
            'name'=>'required|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'psaaword'=>'required|min:5|confirmed',
        ]);
        //业务逻辑
        $name=$request->input('name');
        $email=$request->input('email');
        $password=bcrypt($request->input('password'));
        $res=User::create(compact('name','email','password'));
        dd($res);
        //渲染
        return redirect('/login');
    }
}
