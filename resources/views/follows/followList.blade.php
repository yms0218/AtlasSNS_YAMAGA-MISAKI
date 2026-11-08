@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="follow-list-header">
<h1 class="follow-title">フォローリスト</h1>
    <ul>
    @foreach ($following_id as $post)
        <li>
            <div class="follow_icon">
            <a href="{{ route('show', $post->id) }}" ><img src="{{ asset('storage/'.$post->images) }}" alt="フォローアイコン">
        </a></div>
        </li>
        @endforeach
    </ul>
</div>

@foreach($posts as $post)
<li class="post-block">
  <figure>
     <img src="{{ asset('storage/'.$post->user->images) }}">
  </figure>

 <div class="post-content">

   <div class="post-header">

     <div class="post-name">
     {{ $post->user->username }}
     </div>

        <div class="post-date">
         {{ $post->created_at }}
        </div>
   </div>
     <div class="post-text">{{ $post->post }}</div>
   </div>
@endforeach
</li>
@endsection