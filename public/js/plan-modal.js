document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("myModal");
    const closeModalBtn = document.getElementById("closeModal");
    const inputButton = document.getElementById("inputButton");
    const nextButton = document.getElementById("nextButton");
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".slide");
    const dontShowModalCheckbox = document.getElementById("dontShowModal");
    let currentSlide = 0;

    // Local Storageからモーダル表示フラグを取得
    const modalShown = localStorage.getItem("modalShown");

    // モーダルがまだ表示されていない場合のみ表示
    if (!modalShown || !dontShowModalCheckbox.checked) {
        modal.style.display = "block";
    }

    // サポート関数：モーダルを閉じる
    function closeModal() {
        modal.style.display = "none";
        // チェックボックスがチェックされている場合はフラグを設定して再表示を防ぐ
        if (dontShowModalCheckbox.checked) {
            localStorage.setItem("modalShown", "true");
        }
    }

    // サポート関数：モーダルを次のスライドに進める
    function nextSlide() {
        slides[currentSlide].style.display = "none";
        currentSlide++;
        if (currentSlide < slides.length) {
            slides[currentSlide].style.display = "block";
        }
        if (currentSlide === slides.length - 1) {
            nextButton.style.display = "none";
            inputButton.style.display = "block";
        }
    }

    // 「次へ」ボタンのクリックイベント
    nextButton.addEventListener("click", function () {
        nextSlide();
    });

    // ページ読み込み時にモーダルを初期状態にリセット
    function resetModal() {
        currentSlide = 0;
        slides.forEach((slide, index) => {
            if (index === 0) {
                slide.style.display = "block";
            } else {
                slide.style.display = "none";
            }
        });
        nextButton.style.display = "block";
        inputButton.style.display = "none";
    }

    // 「入力する」ボタンのクリックイベント
    inputButton.addEventListener("click", function () {
        closeModal();
        // モーダルを閉じたら指定のページにリダイレクト
        window.location.href = "localhost:8080/plan/sample";
        // モーダルを再度表示しないために初期状態にリセット
        resetModal();
    });

    function updateDots() {
        const dotElements = modal.querySelectorAll(".dot");

        dotElements.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.add("active");
            } else {
                dot.classList.remove("active");
            }
        });
    }

    // スライド位置が変更されたらドットも更新
    function updateSlidePosition() {
        showSlide(currentSlide);
        updateButtons();
        updateDots();
    }

    modal.addEventListener("touchstart", (e) => {
        // ...
    });

    modal.addEventListener("touchend", (e) => {
        // ...
        updateSlidePosition();
    });

    updateDots();


    // モーダルを閉じるボタンのクリックイベント
    closeModalBtn.addEventListener("click", function () {
        closeModal();
    });

    // ページ読み込み時にモーダルを初期状態にリセット
    resetModal();
});
