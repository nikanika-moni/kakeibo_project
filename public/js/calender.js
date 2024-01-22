const calendarContainer = document.querySelector('.calendar-container');
const monthYear = document.querySelector('.month-year');
const calendarTable = document.querySelector('.calendar');
let selectedDate;
let prevMonthButton;
let nextMonthButton;
const monthDays = ["日", "月", "火", "水", "木", "金", "土"];


function changeMonth(months) {
    // ボタンを一時的に無効化
    prevMonthButton.disabled = true;
    nextMonthButton.disabled = true;

    const newDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth() + months, selectedDate.getDate());
    selectedDate = newDate;
    generateCalendar(newDate.getFullYear(), newDate.getMonth() + 1);

    // カレンダー生成後にボタンを再度有効化
    setTimeout(() => {
        prevMonthButton.disabled = false;
        nextMonthButton.disabled = false;
    }, 500); // 500ミリ秒後に再有効化
}

document.addEventListener("DOMContentLoaded", function() {
    const calendarContainer = document.querySelector('.calendar-container');
    const monthYear = document.querySelector('.month-year');
    const calendarTable = document.querySelector('.calendar');

    prevMonthButton = document.getElementById('prevMonth');
    nextMonthButton = document.getElementById('nextMonth');

    // 各DOM要素の存在をチェック
    if (!calendarContainer || !monthYear || !calendarTable) {
        console.error("必要なDOM要素が見つかりません。");
        return; // 必要な要素がない場合は処理を中断
    }

    prevMonthButton.addEventListener('click', () => changeMonth(-1));
    nextMonthButton.addEventListener('click', () => changeMonth(1));

    // 現在の年月を取得し、selectedDateを初期化
    const currentDate = new Date();
    selectedDate = currentDate;
    if (calendarContainer) {
        // カレンダーコンテナが存在する場合にのみイベントリスナーを追加
        calendarContainer.addEventListener('click', (e) => {
            const clickedCell = e.target.closest('td');

            if (clickedCell) {
                const clickedDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), parseInt(clickedCell.textContent));
                selectedDate = clickedDate;
                generateCalendar(clickedDate.getFullYear(), clickedDate.getMonth() + 1);
                showDetailPage(clickedDate, userId);
            }
        });
    }
    // 現在の年月を取得
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth() + 1; // 月は0から11で表現されるため+1する

    // 年月を表示する要素に表示
    document.getElementById("current-month").innerText = `${currentDate.getFullYear()}年${currentDate.getMonth() + 1}月`;
    // 初期カレンダー生成
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);
});


function generateCalendar(year, month) {
    const today = new Date();
    const firstDay = new Date(year, month - 1, 1);
    firstDay.setDate(1 - (firstDay.getDay() + 6) % 7);
    const lastDay = new Date(year, month, 0);

    monthYear.textContent = `${year}年${month}月`;

    let date = new Date(firstDay);

    const tbody = calendarTable.querySelector('tbody');
    tbody.innerHTML = '';

    // 曜日の行を生成
    const dayRow = document.createElement('tr');
    for (const day of monthDays) {
        const dayCell = document.createElement('th');
        dayCell.textContent = day;
        dayRow.appendChild(dayCell);
    }
    tbody.appendChild(dayRow);

    while (date <= lastDay) {
        const row = document.createElement('tr');
        for (let i = 0; i < 7; i++) {
            const cell = document.createElement('td');
            if (date > lastDay) {
                // 空のセルを追加
                cell.textContent = '';
                cell.classList.add('empty');
            } else {
                // 正しい日付をセルに設定
                cell.textContent = date.getDate();

                if (date.getMonth() !== month - 1) {
                    cell.classList.add('other-month');
                } else {
                    if (date.toDateString() === today.toDateString()) {
                        cell.classList.add('selected');
                        selectedDate = new Date(date);
                    }
                    cell.addEventListener('click', () => {
                        const clickedDate = new Date(date);
                        selectedDate = clickedDate;
                        generateCalendar(clickedDate.getFullYear(), clickedDate.getMonth() + 1);
                        showDetailPage(clickedDate, userId);
                    });
                }
            }
            row.appendChild(cell);
            date.setDate(date.getDate() + 1);
        }
        tbody.appendChild(row);
    }



}

function initCalendar() {
    const today = new Date();
    const currentYear = today.getFullYear();
    const currentMonth = today.getMonth() + 1;
    generateCalendar(currentYear, currentMonth);
}

initCalendar();

function showDetailPage(date, userId) {

    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();

    // パラメーターを含んだURLを生成
    const url = `/record/${userId}/${year}-${month}-${day}`;

    // ページのリダイレクト
    location.href = url;
}
