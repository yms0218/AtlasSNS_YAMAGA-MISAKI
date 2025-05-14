<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;

use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //

    public function followList(){

        $posts = Post::get();
        // フォローしているユーザーのidを取得
          //$following_id = Auth::user()->follows()->pluck('followed_id');

        // フォローしているユーザーのidを元に投稿内容を取得
          //$posts = Post::with('user')->whereIn('followed_id', $following_id)->get();

          return view('follows.followList', compact('posts'));
        }
    public function followerList(){
        return view('follows.followerList');
    }

    //フォロー
    public function follow(User $user)
   {
    $user = Auth::user();
    //$follower = auth()->user();
    // フォローしているか
    $is_following = $user->isFollowing($user->id);
    if(!$is_following) {
    // フォローしていなければフォローする
    $user->follows($user->id);
    return back();
    }
   }
    //フォロー解除
    public function unfollow(User $user)
   {
    $user = Auth::user();
    //$follower = auth()->user();
    // フォローしているか
    $is_following = $user->isFollowing($user->id);
    if($is_following) {
    // フォローしていればフォローを解除する
    $follower->unfollow($user->id);
    return back();
  }
 }
}