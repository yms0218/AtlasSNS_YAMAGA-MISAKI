@extends('layouts.login')



@section('content')
<div class="">
    @foreach ($posts as $follow)
    <ul>
        <li>
            <div class="follow_icon">
                <a href="{{ route('show', $follow->id) }}"><img src="{{ asset('storage/images/'.$follow->user->images) }}" alt="フォローアイコン"></a></div>
        </li>
    </ul>
    @endforeach
</div>

<div class="">
    <h1>フォロワーリスト</h1>
    <div class="follow_icon">
         @foreach ($posts as $follow)
        <a href="{{ route('show', $follow->id) }}" ><img src="{{ asset('storage/images/' .$follow->User->images) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>
</div>

@foreach($posts as $post)
<p>名前：{{ $post->user->username }}</p>
<p>投稿内容：{{ $post->post }}</p>

@endforeach


@endsection