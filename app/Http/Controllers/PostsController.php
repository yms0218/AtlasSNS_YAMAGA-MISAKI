<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Validator;
use DB;
class PostsController extends Controller
{

    public function index(){

        //投稿の一覧表示
        $list = Post::get(); //投稿データを取得
        //dd($list);
        return view('posts.index', ['list'=>$list]);//投稿データをビューに渡す

        $list = Auth::user();
    }

    //投稿機能
    public function create(Request $request)
       {
          $request->validate([
            'newPost' => 'required|max:150',
          ]);
          $post = $request->input('newPost'); //ブレードで記入したものを入れ込むため
          $user_id=Auth::id(); //ユーザーの値を

          //posttableを参照させてみる
          Post::create([
               'user_id' =>$user_id,
               'post' => $post
          ]);

          //$post = new Post();
          //$post->post = $request->input('content'); //postカラムにデータを保存
         // $post->user_id = auth()->user()->id;
         // $post->save();

         return redirect('top');
       }


    //編集
    public function postUpdate(Request $request)
    {
        $id = $request ->input('id');
        $up_post = $request->input('upPost');

        Post::where('id' , $id)->update(['post' => $up_post]);
        return redirect('/top');
    }
    //削除機能
    public function delete(Request $request)
    {
      $id = $request ->input('id');
      //$post->delete();
      Post::where('id', $id)->delete();
      //return redirect()->route('post/delete', ['id' => $id]);
      return redirect('/top');
    }

    public function search(Request $request)
    {
      $keyword = $request->input('users');

      if(!empty($keyword)){
        $list = Post::where('search', 'like', '%'.keyword. '%')->get();
      }else{
        $list = Auth::all();
      }

      return view('posts.index', ['list'=>$list]);
    }

}



//<button>送信</button>

