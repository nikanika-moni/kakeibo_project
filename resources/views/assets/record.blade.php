<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/record/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Your App - カレンダー</title>
</head>
<body>
    <div class="calendar-container">
        <h1 class="month-year">2023年10月</h1>
        <table class="calendar">
            <thead>
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
            </thead>
            <tbody>
                <!-- カレンダーの日付がここに挿入されます -->
            </tbody>
        </table>
    </div>
    <div class="balance-sheet">
        <h2>貸借対照表</h2>
        <table>
            <tbody>
                <tr>
                    <td>勘定科目</td>
                    <td>金額</td>
                </tr>
                <tr>
                    <td>資産</td>
                    <td>¥100,000</td>
                </tr>
                <tr>
                    <td>負債</td>
                    <td>¥50,000</td>
                </tr>
                <tr>
                    <td>純資産</td>
                    <td>¥50,000</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="/js/calender.js"></script>
    <canvas id="myChart"></canvas>
    <script src="/js/chart.js"></script>
    <script src="/js/label.js"></script>
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
