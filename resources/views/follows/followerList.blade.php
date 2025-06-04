@extends('layouts.login')



@section('content')
<div class="">
    <h2>フォローリスト</h2>
    @foreach ($follows as $follow)
    <ul>
        <li>
            <div class="follow_icon"><img src="{{ asset('storage/images'.$follow->user->images) }}" alt="foro-aikonn 
            "></div>
        </li>
    </ul>
    @endforeach
</div>

<div class="">
    <h1>フォロワーリスト</h1>
    <div class="follow_icon">
         foreach ($follows as $follow)
        <a><img src="{{-- asset('storage/' .$following->images) --}}" alt="フォローアイコン"></a>
        endforeach
    </div>
</div>


@endsection