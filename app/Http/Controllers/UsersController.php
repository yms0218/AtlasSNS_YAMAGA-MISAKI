<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    //検索入力フォーム
    public function create(Request $request){
        $search = $request->input('newPost');
        $user_name = Auth::user()->name;

        \DB::table{'search'}->input([
            'users' => $users,
            'user_name' => $user_name
        ]);

        return redirect('top');
    }


        //$users = User::paginate(20);
        //$keyword = $request->input('keyword');
        //$query = User::query();
}

