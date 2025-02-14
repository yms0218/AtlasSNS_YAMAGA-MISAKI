@extends('layouts.login')

@section('content')



<div class="container">
<form action="/search" method="post">
    @csrf

    <h2 class="page-header"></h2>
    {!! Form::open(['url' => 'users.search']) !!}

    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
    </div>

    <button type="submit"><img class="send" src="images/search.png" width="55" height="55"></button>
 {!! Form::close() !!}
 <li class="post-block">
      <figure><img src="images/icon2.png" alt="Bさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">Bさん</div>
        </div>
      </div>
    </li>

    <li class="post-block">
      <figure><img src="images/icon3.png" alt="Cさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">Cさん</div>
        </div>
      </div>
    </li>

    <li class="post-block">
      <figure><img src="images/icon4.png" alt="Dさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">Dさん</div>
        </div>
      </div>
    </li>
</form>
</div>



@endsection