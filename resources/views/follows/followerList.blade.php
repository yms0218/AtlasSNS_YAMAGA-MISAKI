@extends('layouts.login')

@section('content')
<div class="follow-list-header">
<h1 class="follow-title">フォロワーリスト</h1>
  <ul>
    @foreach ($posts as $follow)
        <li>
            <div class="follow_icon">
            <a href="{{ route('show', $follow->id) }}"><img src="{{ asset('storage/images/'.$follow->user->images) }}" alt="フォローアイコン"></a></div>
        </li>
    @endforeach
  </ul>

    <div class="follow_icon">
         @foreach ($posts as $follow)
        <a href="{{ route('show', $follow->id) }}" ><img src="{{ asset('storage/images/' .$follow->User->images) }}" alt="フォローアイコン"></a>
        @endforeach

    </div>
</div>

@foreach($posts as $post)
<li class="post-block">
  <figure>
     <img src="{{ asset('storage/'.$post->user->images) }}">
  </figure>

 <div class="post-content">

    <div class="post-header">
      <div class="post-name">{{ $post->user->username }}</div>
      <div class="post-date">{{ $post->created_at }}</div>
    </div>

      <div class="post-text">{{ $post->post }}</div>

 </div>
@endforeach
</li>
@endsection