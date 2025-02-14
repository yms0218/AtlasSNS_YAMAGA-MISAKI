@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<section>
<h2>AtlasSNSへようこそ</h2>

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}

<button class="btn btn-danger">ログイン</button>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

</section>
{!! Form::close() !!}

@endsection
