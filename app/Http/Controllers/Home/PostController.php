<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    /**
     * 首页/文章列表页
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','desc')->paginate(4);
        return view('home.posts.index',compact('posts'));
    }
    /**
     * 文章详情页
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @param     Post
     * @return    [type]
     */
    public function show(Post $post)
    {
        return view('home.posts.detail',compact('post'));
    }
    /**
     * 创建文章页面
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function create()
    {
        return view('home.posts.create');
    }
    /**
     * 创建文章逻辑
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @param     Request
     * @return    [type]
     */
    public function store()
    {
        //校验
        $this->validate(request(),[
            'title'=>'required|string|min:5|max:100',
            'content'=>'required|string|min:10',
        ]);
        $user_id=\Auth::id();
        $params=array_merge(request(['title','content']),compact('user_id'));
        //入库
        Post::create($params);
        return redirect('/');
    }
    /**
     * 编辑文章页面
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @param     Post
     * @return    [type]
     */
    public function edit(Post $post)
    {
        return view('home.posts.edit',compact('post'));
    }
    /**
     * 编辑文章逻辑
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function update(Post $post)
    {
        //验证
        $this->validate(request(),[
            'title'=>'required|string|min:5|max:100',
            'content'=>'required|string|min:10',
        ]);
        //权限验证
        $this->authorize('update',$post);
        //入库
        $post->title=request('title');
        $post->content=request('content');
        $post->save();
        //渲染
        return redirect('/post/{$post->id}');
    }
    /**
     * 删除文章
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function delete(Post $post)
    {
        //权限验证
        $this->authorize('delete',$post);
        $post->delete();
        return redirect('/');
    }
    /**
     * 赞
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function zan()
    {
        # code...
    }
    /**
     * 取消赞
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-08
     * @return    [type]
     */
    public function unzan()
    {
        # code...
    }
}
