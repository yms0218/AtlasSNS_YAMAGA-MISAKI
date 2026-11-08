@extends('layouts.login')

@section('content')
<div class="container">
<div class="user-profile">

  <div class="profile-left">
<a><img src="{{ asset('storage/' .$user->images) }}" alt="フォローアイコン"></a>
</div>

<div class="profile-center">
<div class="profile-row">
<span class="profile-label">ユーザー名</span>

<span class="profile-value">
    {{ $user->username }}
  </span>
</div>

<div class="profile-row">
<span class="profile-label">自己紹介 {{ $user->bio }}</span>
</div>

{{-- $post->user->username --}}

<div class="profile-right">
@if (auth()->user()->isFollowing($user->id))
    <form action="{{route('unfollow',$user->id)}}" method="post">
      @csrf
      <button type="submit" class="unfollow-btn">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', $user->id) }}" method="post">
@csrf
<button type="submit" class="follow-btn">フォローする</button>

</form>
@endif
</div>
</div>
</div>
</div>

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