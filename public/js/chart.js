// document.addEventListener('DOMContentLoaded', function() {
//     // recordDetails.data からデータを処理して totals を計算
//     let totals = recordDetails.data.reduce((acc, row) => {
//         if (!acc[row.spending_label_intermediate_id]) {
//             acc[row.spending_label_intermediate_id] = 0;
//         }
//         acc[row.spending_label_intermediate_id] += row.amount;
//         return acc;
//     }, {});

//     // チャート用のデータを構築
//     const chartData = {
//         labels: Object.keys(totals).map(id => `ID: ${id}`),
//         datasets: [{
//             data: Object.values(totals),
//             backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'], // 色は必要に応じて調整
//         }],
//     };

//     // Canvas要素を取得してチャートを描画
//     const ctx = document.getElementById('myChart').getContext('2d');
//     const myPieChart = new Chart(ctx, {
//         type: 'pie',
//         data: chartData,
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    // recordDetails.data からデータを処理して totals を計算
    let totals = recordDetails.data.reduce((acc, row) => {
        if (!acc[row.spending_label_intermediate_id]) {
            acc[row.spending_label_intermediate_id] = 0;
        }
        acc[row.spending_label_intermediate_id] += row.amount;
        return acc;
    }, {});

    // チャート用のデータを構築
    const chartData = {
        labels: Object.keys(totals).map(id => `ID: ${id}`),
        datasets: [{
            label: '金額',
            data: Object.values(totals),
            backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'], // 色は必要に応じて調整
            borderColor: ['#36A2EB', '#FF6384', '#FFCE56'],
            borderWidth: 1
        }],
    };

    // Canvas要素を取得してチャートを描画
    const ctx = document.getElementById('myChart').getContext('2d');
    const myBarChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

