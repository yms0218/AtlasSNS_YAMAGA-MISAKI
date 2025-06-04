<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use DB;
use validator;
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
          //$posts = Post::whereIn('user_id', $following_ids)->get();
          return view('follows.followList', compact('posts'));
        }
    public function followerList(){

        return view('follows.followerList');
    }

    //フォロー
    public function follow($id)
   {
    $user = Auth::user();
    //$follower = auth()->user();
    // フォローしているか
    $is_following = $user->isFollowing($id);
    if(!$is_following) {
    // フォローしていなければフォローする
    $user->follows($id);
    return back();
    }
   }
    //フォロー解除
    public function unfollow($id)
    {
      $user = Auth::user();
      //$follower = auth()->user();
      // フォローしているか
      $is_following = $user->isFollowing($id);
      if($is_following) {
    // フォローしていればフォローを解除する
    $user->unfollow($id);
    return back();
  }
 }
}