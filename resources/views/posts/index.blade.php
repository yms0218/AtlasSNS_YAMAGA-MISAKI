@extends('layouts.login')

@section('content')

<div class="container">
    <!-- /topに値を送る -->
    {!! Form::open(['url' => '/top']) !!}
    {{ Form::token() }}
    <div class="form-group">
    <figure class="icon">
        <img src="images/icon1.png">
        </figure>
        {{ Form::input('text','newPost',null,['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください'])}}
    </div>
    <button type="submit"><img class="send" src="images/post.png" width="55" height="55"></button>

    {!! Form::close() !!}
</div>
<div>
  <ul>
  @foreach($list as $list)
    <li class="post-block">
      <figure><img src="images/{{ $list->user->images }}" alt="Aさん"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">{{ $list->user->username }}</div>
          <div>{{ $list->created_at }}</div>
        </div>
        <div>{{ $list->post }}</div>

        <td>
          <div class="contents">
            <a class="js-modal-open" href="" post="{{ $list->post }}"
            post_id="{{ $list->id }}"><img src="./images/edit.png" alt="編集"></a>
          </div>
        </td>

        {!! Form::open(['url' => '/post/delete']) !!}
        {{ Form::token() }}
        {!! Form::input('hidden', 'id', $list->id) !!}
        <button type="submit"><img class="delete" src="images/trash.png" width="55" height="55" onclick="return confirm('こちらの投稿を削除します。よろしいでしょうか？')"></button>
        {!! Form::close() !!}
      </div>
    </li>
    @endforeach
  </ul>
</div>

<div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="/post/update" method="post">
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="id" class="modal_id" value="">
          <input type="submit" value="更新">
          {{ csrf_field() }}
      </form>
      <a class="js-modal-close" href="">閉じる</a>
    </div>

</div>

@endsection


