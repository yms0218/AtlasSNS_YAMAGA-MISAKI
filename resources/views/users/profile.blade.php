@extends('layouts.login')

@section('content')
<div class="container">
    <!-- /topに値を送る -->
    <figure class="icon">
        <img src="images/icon1.png">
    </figure>
</div>

@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

{!! Form::open(['url' => '/users.profile' ,'files' => true]) !!}
{{ Form::label('ユーザー名') }}
{{ Form::text('username', (Auth::user()->username), ['class' => 'input']) }}
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',(Auth::user()->mail),['class' => 'input']) }}
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
{{ Form::label('自己紹介') }}
{{ Form::text('bio',(Auth::user()->bio),['class' => 'input']) }}
{{ Form::label('アイコン画像' )}}
{{ Form::file('images',null,['class' => 'input']) }}
<button class="btn btn-danger">更新</button>
{!! Form::close() !!}
@endsection
