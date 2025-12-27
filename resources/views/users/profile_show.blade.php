@extends('layouts.login')

@section('content')
<div class="container">
<a><img src="{{ asset('storage/' .$user->images) }}" alt="フォローアイコン"></a>
<p>ユーザー名 {{ $user->username }}</p>
<p>自己紹介 {{ $user->bio }}</p>

{{-- $post->user->username --}}
</div>

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
<ul>
    @foreach($posts as $post)
    <li class="post-block">
      <figure><img src="{{ asset('storage/'.'$post->images') }}" alt=""></figure>
      <div class="post-content">
        <div>
          <div class="post-name">{{ $post->user->username }}</div>
          <div>{{ $post->created_at }}</div>
        </div>
        <div>{{ $post->post }}</div>
        @endforeach
</ul>
@endsection