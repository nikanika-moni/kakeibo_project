<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/layouts/style.css">
    <link rel="stylesheet" href="/css/record/style.css">
    <link rel="stylesheet" href="/css/record_create/style.css">
    <link rel="stylesheet" href="/css/assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Your App - カレンダー</title>
</head>
<body>
    <div class="container_main">
        <!-- ▼▼▼▼ページ毎の個別内容▼▼▼▼　-->
        @yield('content')
        <!-- ▲▲▲▲ページ毎の個別内容▲▲▲▲　-->
    </div>
    <footer>
        <nav>
            <a href="#">ホーム</a>
            <a href="#">収支</a>
            <a href="#">その他</a>
            <a href="#">設定</a>
        </nav>
    </footer>
</body>
</html>

