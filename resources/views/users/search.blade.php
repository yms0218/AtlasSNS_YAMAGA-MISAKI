@extends('layouts.login')

@section('content')

@if(isset($users))
<table>
  @foreach($users as $users)
<tr>
  <td><img src="{{asset('images/'.$users->images)}}" alt="ユーザーアイコン"></td>
  <td>{{$users->username}}</td>
  <td>
    @if (auth()->user()->following($users->id))
    <form action="{{route('unfollow',$users->id)}}" method="post">
      @csrf
      <button type="button" class="btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{route('follow',$users->id)}}" method="post">
      @csrf
      <button type="button" class="btn btn-primary">フォローする</button>
    </form>
    @endif
  </td>
</tr>
  @endforeach
</table>
@endif
<div class="container">
  {!! Form::open(['url' => 'users.search']) !!}
    @csrf
    <h2 class="page-header"></h2>
    <div class="form-group">
     {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
    </div>
    <button type="submit"><img class="send" src="images/search.png" width="55" height="55"></button> <!-- input submit -->
  {!! Form::close() !!}
  <p class="word">検索ワード：{{ $search }}</p>
  <ul>
    @foreach($users as $user) <!-- //['$複数形'as $単数] -->
    <li class="post-block">
      <figure><img src="images/icon2.png" alt="Bさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name"></div> <!-- $単数->カラム名 -->
        </div>
      </div>
    </li>
    @endforeach

  </ul>
</div>
@endsection