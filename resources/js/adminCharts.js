import Chart from 'chart.js/auto';

// Each chart reads its data from the canvas's data-chart attribute (JSON from Laravel).
const readData = (canvas) => JSON.parse(canvas.dataset.chart);

const reportsCanvas = document.getElementById('chart-reports');

if (reportsCanvas) {
    const data = readData(reportsCanvas);

    new Chart(reportsCanvas, {
        type: 'line',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: 'Hilang',
                    data: data.lost,
                    borderColor: '#EE6D3A',
                    backgroundColor: 'rgba(238, 109, 58, 0.15)',
                    fill: true,
                    tension: 0.3,
                },
                {
                    label: 'Ditemukan',
                    data: data.found,
                    borderColor: '#22A06B',
                    backgroundColor: 'rgba(34, 160, 107, 0.15)',
                    fill: true,
                    tension: 0.3,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } },
                x: { ticks: { maxTicksLimit: 8 } },
            },
            plugins: { legend: { position: 'bottom' } },
        },
    });
}

const statusCanvas = document.getElementById('chart-status');

if (statusCanvas) {
    const data = readData(statusCanvas);

    new Chart(statusCanvas, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: 'Jumlah barang',
                    data: data.values,
                    backgroundColor: ['#EE6D3A', '#F3A683', '#7CC59A', '#22A06B'],
                    borderRadius: 6,
                },
            ],
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true, ticks: { precision: 0 } },
            },
            plugins: { legend: { display: false } },
        },
    });
}
