<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
class UsersController extends Controller
{
    //
    public function profile(){
        $users = User::all();
        // $user = auth()->user();
        //リンク元のidを元にユーザー情報を取得する
        // $users = User::where('id', $user_Id)->first();
        // dd($users);
        //リンク元ユーザーのidを元に投稿内容を取得する
        // $posts = Post::with('user')->where('user_id', $user_Id)-> latest('updated_at')-> get();
        //dd($posts);
        // return view('users.profile', compact('users', 'posts'));
        return view('users.profile');
    }

    public function show($id)
{
    // 特定のユーザーをデータベースから取得
    $user = User::where('id', $id)->first();
    //dd($user);
    $posts = Post::where('user_id', $id)->get();
    // ユーザー情報をビューに渡す
    return view('users.profile_show', compact('user', 'posts'));

}
    public function search(){
        $users = User::get();
        $users = User::all()->except([\Auth::id()]); //User::all()で全ユーザーを取得して、そこからexceptメソッドで認証済みユーザー（自分）のIDを持つアカウント情報を除外
        return view('users.search', ['users'=>$users]);
    }
     /**
     * プロフィール編集機能（ユーザー名、メールアドレス）
     * @param Request $request
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    // public function profileUpdate(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:12',
    //         'email' => ['required', 'string', 'email', 'max:40', Rule::unique('users')->ignore(Auth::id())],
    //     ]);
    // }
    //検索入力フォーム
    public function create(Request $request){
        $search = $request->input('newPost');
        if(!empty($search)){
            $users = User::where('username', 'like', '%'.$search. '%')->get()->except([\Auth::id()]); //$users = User::where('カラム名', 'like', '%'.$search. '%')->get();
          }else{
            $users = User::all()->except([\Auth::id()]);
          }
        $user_name = Auth::user()->name;
        return view('users.search', ['users'=>$users, 'search'=>$search]); //コンパクト関数
    }
        //$users = User::paginate(20);
        //$keyword = $request->input('keyword');
        //$query = User::query();

    public function updateProfile(Request $request){
        if($request->isMethod('post')){

                //追加記述↓
                $request->validate([
                    'username' => 'required|string|min:2|max:12',
                    'mail' => 'required|string|email|min:5|max:40',
                    'password' => 'required|string|min:8|max:20|confirmed',
                    'password_confirmation' => 'required|string|min:8|max:20',
                    'bio' => 'required|max:150'
                ]);
                $this->validate($request, [
                    'images' => [
                        // 必須
                        //'required',
                        // アップロードされたファイルであること
                        'file',
                        // 画像ファイルであること
                        'image',
                        // MIMEタイプを指定
                        'mimes:jpeg,png,jpg',
                        // 最小縦横120px 最大縦横400px
                        //'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
                    ]]);
            }
        $user = Auth::user();
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = bcrypt($request->input('password'));
        $bio = $request->input('bio');
        // dd($request,$images, $imageName);
        //dump($images);
        //$images = Auth::get();
        //return view('users.profile',['images'=>$images]);
        //ddd($);
        $user->update([
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'bio' => $bio,
            // 'images' => $imageName,
        ]);
        // if文で「画像ファイルがあるとき」
        if($request->hasFile('images')) {
        $images = $request->file('images')->store('images', 'public');// 画像をstorage/app/public/image配下に保存
        $user->images = $images;
        $user->save();
        }
        else{
            $images = null;
        }
        // if文おわり

        return redirect('/top');
}
}