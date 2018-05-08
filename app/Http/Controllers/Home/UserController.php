<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * 用户操作类
 */
class UserController extends Controller
{
    /**
     * [login 登录页面]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function login()
    {
        return view('home.user.login');
    }
    /**
     * [FunctionName 登录逻辑]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @param     string     $value [description]
     */
    public function tologin(Request $request)
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
            // session(['user'=>null]);
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
        return view('home.user.register');
    }
    /**
     * [register 注册逻辑]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-07
     * @return    [type]     [description]
     */
    public function toregister(Request $request)
    {
        dd($request);
    }
}
