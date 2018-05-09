<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * [update 修改权限]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-09
     * @param     User       $user [description]
     * @param     Post       $post [description]
     * @return    [type]           [description]
     */
    public function update(User $user,Post $post)
    {
        return $user->id == $post->user_id ;    
    }
    /**
     * [update 删除权限]
     * @AuthorHTL Mr.yang
     * @DateTime  2018-05-09
     * @param     User       $user [description]
     * @param     Post       $post [description]
     * @return    [type]           [description]
     */
    public function delete(User $user,Post $post)
    {
        return $user->id == $post->user_id ;    
    }
}
