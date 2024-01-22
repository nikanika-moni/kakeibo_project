<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/users.edit/style.css">
    <title>Your App - 家計簿</title>
</head>
<body>
    <div class="expense-tracker-container">
        <h1>アカウント編集</h1>
        <form>
            <div class="form-group">
                <label for="name">名前（ニックネーム）</label>
                <input type="text" id="name" placeholder="名前（ニックネーム）" required>
            </div>
            <div class="form-group">
                <label for="email">アドレス</label>
                <input type="email" id="email" placeholder="アドレス" required>
            </div>
            <div class="form-group">
                <label for="employment">雇用形態</label>
                <select id="employment">
                    <option value="会社員">会社員</option>
                    <option value="個人事業主">個人事業主</option>
                </select>
            </div>
            <div class="form-group">
                <label for="income">収入（額面）</label>
                <input type="number" id="income" placeholder="収入（額面）" required>
            </div>
            <div class="form-group">
                <label for="net-income">収入（手取り）</label>
                <input type="number" id="net-income" placeholder="収入（手取り）" required>
            </div>
            <div class="form-group">
                <label for="rent">家賃</label>
                <input type="number" id="rent" placeholder="家賃">
            </div>
            <div class="form-group">
                <label for="car">車</label>
                <select id="car" name="car">
                    <option value="yes">選択する</option>
                    <option value="yes">アリ</option>
                    <option value="no">ナシ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tax-deduction">税控除</label>
                <input type="number" id="tax-deduction" placeholder="税控除">
            </div>
            <div class="form-group">
                <label for="entertainment-expenses">交際費</label>
                <input type="number" id="entertainment-expenses" placeholder="交際費">
            </div>
            <div class="form-group">
                <label for="transportation-expenses">交通費</label>
                <input type="number" id="transportation-expenses" placeholder="交通費">
            </div>
            <div class="form-group">
                <label for="food-expenses">食費</label>
                <input type="number" id="food-expenses" placeholder="食費">
            </div>
            <div class="form-group">
                <label for="entertainment">娯楽</label>
                <input type="number" id="entertainment" placeholder="娯楽">
            </div>
            <button type="submit">編集</button>
        </form>
    </div>
</body>
</html>
