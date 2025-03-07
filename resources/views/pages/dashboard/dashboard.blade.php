<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Beranda</h1>
    </div>
    <div class="container">
        <canvas id="developmentChart" width="400" height="200"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('{{ route('main.dashboard.kematian') }}')
            .then(response => response.json())
            .then(data => {
                const totalKematianAtas = data.reduce((sum, item) => sum + item.kematian_atas, 0);
                const totalKematianBawah = data.reduce((sum, item) => sum + item.kematian_bawah, 0);

                var ctx = document.getElementById('developmentChart').getContext('2d');
                const config = {
                    type: 'doughnut',
                    data: {
                        labels: ['Kematian Atas', 'Kematian Bawah'],
                        datasets: [
                            {
                                label: 'Kematian',
                                data: [totalKematianAtas, totalKematianBawah],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                };
                var developmentChart = new Chart(ctx, config);
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</x-app-layout>
