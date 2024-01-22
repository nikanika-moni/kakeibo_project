@extends('layouts.admin')
@section('content')
<div class="calendar-container">
    <button id="prevMonth">前の月</button>
    <span class="month-year"></span>
    <button id="nextMonth">次の月</button>
    <table class="calendar">
        <tbody>
            <!-- カレンダーの日付がここに挿入されます -->
        </tbody>
    </table>
</div>
<script src="/js/calender.js"></script>
    <canvas id="myChart" width="400" height="400"></canvas>
    <script src="/js/chart.js"></script>
    <script src="/js/label.js"></script>
    <div class="recent-data-table">
    <script>
        const userId = {{ $userId }};
        var recordDetails = @json($record_details);
        console.log(recordDetails);
    </script>
    <h2>直近の登録データ</h2>
    <table>
        <thead>
            <tr>
                <th>日付</th>
                <th>カテゴリー</th>
                <th>金額</th>
            </tr>
        </thead>
        <tbody>
            <!-- データを表示するループ -->
            @foreach($record_details as $record_detail)
            <tr>
                <td>{{ $record_detail->date }}</td>
                <td>{{ optional($record_detail->spending_label_intermediate)->spending_category->name }}</td>
                <td>¥{{ $record_detail->amount }}</td>
            </tr>
            @endforeach
            <!-- データがない場合の表示 -->
            @if(count($record_details) === 0)
            <tr>
                <td colspan="3">データがありません</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
