@extends('layouts.login')

@section('content')

<!-- フォローしている人のアイコン一覧 -->
<div class="">
    <h1>フォローリスト</h1>
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
<p>名前：{{ $post->user->username }}</p>
<p>投稿内容：{{ $post->post }}</p>
@endforeach

@endsection