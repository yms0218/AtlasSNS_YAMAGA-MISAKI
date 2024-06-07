<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
    public function index(){

        //投稿の一覧表示
        $list = Post::get(); //投稿データを取得
        return view('posts.index', ['list'=>$list]);//投稿データをビューに渡す

        $list = Auth::user();
    }

    //投稿機能
    public function create(Request $request)
       {
          $post = $request->input('newPost'); //ブレードで記入したものを入れ込むため
          $user = Auth::user()->id; //ユーザーの値を

          //posttableを参照させてみる
          Post::create([
               'user_id' =>$user_id,
               'post' => $post
          ]);

          

          //$post = new Post();
          //$post->post = $request->input('content'); //postカラムにデータを保存
         // $post->user_id = auth()->user()->id;
         // $post->save();

         return redirect('/top');
       }

    //編集
    public function update(Request $request)
    {
        $id = $request ->input('id');
        $up_post = $request->input('upPost');

        Post::where('id' , $id)->update(['post' => $up_post]);
        return redirect('/top');
    }
}



//<button>送信</button>

