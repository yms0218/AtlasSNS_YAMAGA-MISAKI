<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

</head>
<body>
    <header>
        <h1><a href="/top">
            <figure class="atlas">
            <img src="images/atlas.png" alt="Atlas" width="120" height="45" >
            </figure>
        </a></h1>

        <p class="user_name">{{ Auth::user()->username }}さん</p>
        <!-- アコーディオンメニュー -->
        <div id="accordion" class="accordion-container">

        <div class="accordion-title js-accordion-title">

        <button
                type="button"
                class="menu-btn"
                aria-expanded="false"
                aria-label="メニューを開く">
        </button>

                <ul class="menu">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/users.profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>

        </div>
        </div>

        <div class="icon">
        <img src="{{ asset('/storage/images/' .Auth::user()->images) }}">
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->follow->count() }}人</p>
                </div>
                <div class="button-container">
                <button type="button" class="btn-follow-list"><a href="/followList">フォローリスト</a></button>
                </div>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->follower->count() }}人</p>
                </div>
                <div class="button-container">
                <button type="button" class="btn-follower-list"><a href="/followerList">フォロワーリスト</a></button>
            </div>
            </div>

            <div class="search_button">
            <button type="button" class="btn-search"><a href="/users.search">ユーザー検索</a></button>
            </div>
        </div>
    </div>

    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>
