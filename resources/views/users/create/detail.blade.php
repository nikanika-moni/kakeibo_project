@extends('layouts.users')
@section('content')
<div class="expense-tracker-container">
    <h1>アカウント作成</h1>
    <form id="multi-step-form" action="{{route('user.detail.store',['userId' => $userId])}}" method="POST">
    @csrf
        <div class="form-step" data-step="1">
        <div class="form-group">
                <label for="employment">雇用形態</label>
                <select id="employment" name="employment_id" required>
                    <option value="select-def" disabled selected>選択してください</option>
                    @foreach($employments as $employment)
                    <option value="{{ $employment->id }}">{{ $employment->employment }}</option>
                    @endforeach
                </select>
            </div>
            <button class="next-step">次へ</button>
        </div>
        <div class="form-step" data-step="2">
            <div class="form-group">
                <label for="net-income">収入（手取り）</label>
                <input type="number" id="net-income" name="net_income" placeholder="収入（手取り）" required>
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="3">
            <div class="form-group">
                <label for="rent">家賃</label>
                <input type="number" id="rent" name="rent" placeholder="家賃">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="4">
            <div class="form-group">
                <label for="entertainment-expenses">交際費</label>
                <input type="number" id="entertainment_expenses" name="entertainment_expenses" placeholder="交際費">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="5">
            <div class="form-group">
                <label for="transportation-expenses">交通費</label>
                <input type="number" id="transportation-expenses" name="transportation_expenses" placeholder="交通費">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="6">
            <div class="form-group">
                <label for="food-expenses">食費</label>
                <input type="number" id="food-expenses" name="food_expenses" placeholder="食費">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="7">
            <div class="form-group">
                <label for="entertainment">娯楽</label>
                <input type="number" id="entertainment" name="entertainment" placeholder="娯楽">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

        <div class="form-step" data-step="8">
            <div class="form-group">
                <label for="savings-so-far">これまでの貯蓄額</label>
                <input type="number" id="savings-so-far" name="savings_so_far" placeholder="これまでの貯蓄額">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div>

         <!-- <div class="form-step" data-step="8">
            <div class="form-group">
                <label for="users">ユーザー名（削除します）</label>
                <input type="number" id="users" name="users" placeholder="削除します">
            </div>
            <button class="prev-step">前へ</button>
            <button class="next-step">次へ</button>
        </div> -->

        <div class="form-step" data-step="9">
            <div class="form-group">
                <label for="average-savings">毎月の貯蓄額（平均）</label>
                <input type="number" id="average-savings" name="average_savings" placeholder="毎月の貯蓄額（平均）">
            </div>
            <!-- 他のフィールド -->
            <button class="prev-step">前へ</button>
            <button type="submit">登録</button>
        </div>
    </form>
</div>
<script src="/js/form-step.js"></script>
@endsection
