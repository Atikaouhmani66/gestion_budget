<!-- your_view.blade.php -->
<pre>
    {{ print_r($salaries) }}
</pre>

<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // Type dyal graphique, kayn bzaaf, b7al line, bar, etc.
        data: {
            labels: @json($expenses->pluck('date')), // Tdir labels 3la dates
            datasets: [{
                label: 'Dépenses',
                data: @json($expenses->pluck('amount')), // Dépenses
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }, {
                label: 'Salaires',
                data: @json($salaries->pluck('amount')), // Salaires
                borderColor: 'rgb(54, 162, 235)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
