document.addEventListener("DOMContentLoaded", function () {
    const addLabelBtn = document.getElementById("addLabelBtn");
    const modal = document.getElementById("myModal");
    const closeModalBtn = document.getElementById("closeModal");
    const saveLabelBtn = document.getElementById("saveLabelBtn");

    addLabelBtn.addEventListener("click", function () {
        modal.style.display = "block"; // モーダルを表示
    });

    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none"; // モーダルを非表示
    });

    saveLabelBtn.addEventListener("click", function () {
        // ラベル名を取得
        const labelName = document.getElementById("labelName").value;
        // 選択した支出のタイプを取得
        const expenseType = document.querySelector('input[name="expenseType"]:checked').value;

        // ラベルの保存処理
        // ここでデータベースへの保存や他の処理を行う

        // モーダルを閉じる
        modal.style.display = "none";
    });
});




