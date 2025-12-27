@extends('layouts.logout')

@section('content')

<section>
<div id="clear">
  <p class="welcome">{{ session('username') }}さん<br>
  ようこそ! AtlasSNSへ</p>
  <p class="message">
  ユーザー登録が完了しました。<br>
  早速ログインをしてみましょう。
  </p>

  <div class="top">
  <a href="/login"><button class="btn btn-danger">ログイン画面へ</button></a>
  </div>
</div>
</section>
@endsection
