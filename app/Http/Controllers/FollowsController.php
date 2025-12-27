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
        $following_id = Auth::user()->follow()->get();
      //$following_id[] = $user;
      //フォローしているユーザーのidを元に投稿機能を取得
      //$posts = Post::query()->with('user')->whereIn('user_id', $following_id)->get();
      $posts = Post::query()->whereIn('user_id', Auth::user()->follow()->pluck('followed_id'))->get();//->orWhere('id', Auth::user()->id)->latest()->get();


      return view('follows.followList', compact('posts', 'following_id'));
        //$posts = Post::get();

        //if(!empty($unfollow)){
         // $users = User::where('id', $follow)->get()->except([\Auth::id()]);

        //}else{
         // $users = User::all()->except([\Auth::id()]);
        //}
        //if ($following_id == $following_id) {
          //return ['error' => "自分自身をフォローすることはできません"];

        // フォローしているユーザーのidを取得
          //$following_id = Auth::user()->follows()->pluck('followed_id');

        // フォローしているユーザーのidを元に投稿内容を取得
          //$posts = Post::with('user')->whereIn('followed_id', $following_id)->get();
          //$posts = Post::whereIn('user_id', $following_ids)->get();
          return view('follows.followList', compact('posts'));
        }
    public function followerList(){
      //$user = Auth::user()->id;
      //$posts = Post::get();
      //フォローしているユーザーのidを取得
      $following_id = Auth::user()->follower()->pluck('followed_id')->toArray();
      //$following_id[] = $user;
      //フォローしているユーザーのidを元に投稿機能を取得
      $posts = Post::with('user')->whereIn('user_id', $following_id)->get();

      //$posts = Post::query()->whereIn('id', Auth::user()->follow->pluck('followed_id'));//->orWhere('id', Auth::user()->id)->latest()->get();


      return view('follows.followerList', compact('posts'));
        //return view('follows.followerList');
    }

    public function user_profile($id){
      $user_id = User::find($id);
      $user = DB::table('users')->leftJoin('posts', 'users.id', 'posts.user_id')->get();
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

 public function followsProfile(Request $request)
 {
  $followsUser = $request->input('users')->select('id','username',);
 }
}