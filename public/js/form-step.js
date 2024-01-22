document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("multi-step-form");
    const steps = Array.from(document.querySelectorAll(".form-step"));
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((s) => (s.style.display = "none"));
        steps[step].style.display = "block";
    }

    function goToStep(step) {
        if (step >= 0 && step < steps.length) {
            currentStep = step;
            showStep(currentStep);
        }
    }

    // 「次へ」ボタンのクリックイベント
    document.querySelectorAll(".next-step").forEach((nextButton) => {
        nextButton.addEventListener("click", (event) => {
            event.preventDefault(); // デフォルトの挙動をキャンセル

            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // 「前へ」ボタンのクリックイベント
    document.querySelectorAll(".prev-step").forEach((prevButton) => {
        prevButton.addEventListener("click", (event) => {
            event.preventDefault(); // デフォルトの挙動をキャンセル

            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // フォームの送信時の処理をここに追加

    showStep(currentStep);
});
