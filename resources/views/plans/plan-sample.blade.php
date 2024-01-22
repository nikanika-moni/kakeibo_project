<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/plan-sample/style.css">
    <title>支出削減の詳細</title>
</head>
<body>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <div class="slider">
            <div class="slide">
                <h2>支出目標を記入しましょう！</h2>
                <p>①支出管理をしたい品目を選択します</p>
                <img src="/img/plan-modal_img1.png" alt="">
            </div>
            <div class="slide">
                <h2>支出目標を記入しましょう！</h2>
                <p>②1目標の支出金額（1日あたり）を入力します</p>
                <img src="/img/plan-modal_img2.png" alt="">
            </div>
            <div class="slide">
                <h2>支出目標を記入し ましょう！</h2>
                <p>③すべて入力したら入力ボタンを押しましょう。</p>
                <img src="/img/plan-modal_img3.png" alt="">
            </div>
        </div>
        <button id="nextButton">次へ</button>
        <button id="inputButton">入力する</button>
        <div class="dontShowModal">
            <input type="checkbox" id="dontShowModal"> 今後表示しない
        </div>
    </div>
</div>
    <div class="main-page">
        <h1>B目標を設定しよう！</h1>
        <table>
            <tbody>
                <tr>
                    <th>品目</th>
                    <th>目標</th>
                    <th></th>
                </tr>
                <tr>
                    <td>家賃</td>
                    <td><span>現在:〇〇円/月</span><br>
                    <input type="number" placeholder="1日の支出" id="goalFoodExpense"><span>円/日</span>
                    <span class="user-m">〇〇円/月</span></td>
                    <td><input type="checkbox" id="dontShowModal"></td>
                </tr>
                <tr>
                    <td>食費</td>
                    <td><span>現在:〇〇円/月</span><br>
                    <input type="number" placeholder="1日の支出" id="goalFoodExpense"><span>円/日</span>
                    <span class="user-m">〇〇円/月</span></td>
                    <td><input type="checkbox" id="dontShowModal"></td>
                </tr>
                <tr>
                    <td>娯楽</td>
                    <td><span>現在:〇〇円/月</span><br>
                    <input type="number" placeholder="1日の支出" id="goalFoodExpense"><span>円/日</span>
                    <span class="user-m">〇〇円/月</span></td>
                    <td><input type="checkbox" id="dontShowModal"></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td><span>現在:〇〇円/月</span><br>
                        <input type="number" placeholder="1日の支出" id="goalFoodExpense"><span>円/日</span>
                    <span class="user-m">〇〇円/月</span></td>
                    <td><input type="checkbox" id="dontShowModal"></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td><span>現在:〇〇円/月</span><br>
                    <input type="number" placeholder="1日の支出" id="goalFoodExpense"><span>円/日</span>
                    <span class="user-m">〇〇円/月</span></td>
                    <td><input type="checkbox" id="dontShowModal"></td>
                </tr>
            </tbody>
        </table>
        <button>登録する</button>
    </div>
    <script src="/js/plan-modal.js"></script>
</body>
</html>
