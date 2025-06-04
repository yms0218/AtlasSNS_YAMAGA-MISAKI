@extends('layouts.login')

@section('content')
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


  </ul>
</div>
@if(isset($users))
<table>
  @foreach($users as $user)
<tr>
  <td><img src="{{asset('images/'.$user->images)}}" alt="ユーザーアイコン"></td>
  <td>{{$user->username}}</td>
  <td>
    @if (auth()->user()->isFollowing($user->id))
    <form action="{{route('unfollow',$user->id)}}" method="post">
      @csrf
      <button type="submit" class="btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', $user->id) }}" method="post">
@csrf
<button type="submit" class="btn btn-primary">フォローする</button>

</form>
    @endif
  </td>
</tr>
  @endforeach
</table>
@endif

@endsection