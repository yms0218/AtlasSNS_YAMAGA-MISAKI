<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'post','user_id'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|max:150',
    //         'content' => 'required',
    //     ]);
    //     $post = new Post();
    //     $post->fill($request->all())->save();

    //     return redirect()->route('posts.show', ['id' => $post->id])->with('message', '新しい記事を登録しました。');
    // }



}
