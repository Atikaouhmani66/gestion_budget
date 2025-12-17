<!DOCTYPE html>
<html>
<head>
    <title>Graphique des Revenus et Dépenses</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<a href="/dashboard" style="
 display: inline-block;
    position: absolute;
    top: 20px;
    right: 20px;
    padding: 10px 20px;
    background-color: #3490dc;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    ">⬅ Retour au tableau de bord</a>

    <h2>Revenus vs Dépenses</h2>

    <canvas id="myChart" style="max-width: 600px;"></canvas>

    <script>
        const rawData = @json($data);

        const labels = rawData.map(item => item.label + ' (' + item.type + ')');
        const values = rawData.map(item => item.total);
        const colors = rawData.map(item => item.type === 'income' ? 'rgba(54, 162, 235, 0.7)' : 'rgba(255, 99, 132, 0.7)');

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Montants',
                    data: values,
                    backgroundColor: colors,
                    borderColor: colors.map(c => c.replace('0.7', '1')),
                    borderWidth: 1
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

</body>
</html>
