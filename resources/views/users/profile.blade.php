@extends('layouts.login')

@section('content')
<div class="container">
    <!-- /topに値を送る -->
    <figure class="profile-icon">
    <img src="{{ asset('images/'.Auth::user()->images) }}">
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

<div class="profile-edit">
<div class="profile-row">
{!! Form::open(['url' => '/users.profile' ,'files' => true]) !!}
{{ Form::label('ユーザー名') }}
{{ Form::text('username', (Auth::user()->username), ['class' => 'input']) }}</div>

<div class="profile-row">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',(Auth::user()->mail),['class' => 'input']) }}</div>

<div class="profile-row">
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}</div>

<div class="profile-row">
{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input']) }}</div>

<div class="profile-row">
{{ Form::label('自己紹介') }}
{{ Form::text('bio',(Auth::user()->bio),['class' => 'input']) }}</div>

<div class="profile-row">
{{ Form::label('アイコン画像' )}}
{{ Form::file('images',null,['class' => 'input']) }}</div>
<button class="profile-update">更新</button>
{!! Form::close() !!}
</div>

@endsection
