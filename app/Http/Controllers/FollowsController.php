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
}
