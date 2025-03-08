<x-app-layout>
    <div class="pagetitle px-4">
        <h1>Beranda</h1>
    </div>
    <div class="section p-4 d-flex">
        <div class="card mb-4 chart-container" style="flex: 1; margin-right: 20px;">
            <div class="card-body text-center chart-wrapper">
                <h8>Data ABW</h8><br><br>
                <canvas id="abwChart"></canvas>
            </div>
        </div>
        <div>
            <div class="card mb-4 chart-container">
                <div class="card-body text-center chart-wrapper">
                    <h7>Data Kematian</h7><br><br>
                    <canvas id="kematianChart"></canvas>
                </div>
            </div>
            <div class="card mb-4 chart-container">
                <div class="card-body text-center chart-wrapper">
                    <h8>Data Pakan</h8><br><br>
                    <canvas id="pakanChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        fetch('{{ route('main.dashboard.abw') }}')
            .then(response => response.json())
            .then(data => {
                const labels = ['ABW Data Atas', 'ABW Data Bawah'];
                const abwData = [data.abw_normal_atas, data.abw_normal_bawah];

                var ctxAbw = document.getElementById('abwChart').getContext('2d');
                const configAbw = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'ABW Data',
                                data: abwData,
                                backgroundColor: [
                                    'rgba(142, 65, 70, 0.2)',
                                    'rgba(46, 153, 172, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(142, 65, 70, 1)',
                                    'rgba(46, 153, 172, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };
                var abwChart = new Chart(ctxAbw, configAbw);
            })
            .catch(error => console.error('Error fetching data:', error));

        fetch('{{ route('main.dashboard.kematian') }}')
            .then(response => response.json())
            .then(data => {
                const totalKematianAtas = data.reduce((sum, item) => sum + item.kematian_atas, 0);
                const totalKematianBawah = data.reduce((sum, item) => sum + item.kematian_bawah, 0);

                var ctxKematian = document.getElementById('kematianChart').getContext('2d');
                const configKematian = {
                    type: 'doughnut',
                    data: {
                        labels: ['Kematian Atas', 'Kematian Bawah'],
                        datasets: [
                            {
                                label: 'Kematian',
                                data: [totalKematianAtas, totalKematianBawah],
                                backgroundColor: [
                                    'rgba(53, 123, 135, 0.2)',
                                    'rgba(46, 153, 172, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(53, 123, 135, 1)',
                                    'rgba(46, 153, 172, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
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
                var kematianChart = new Chart(ctxKematian, configKematian);
            })
            .catch(error => console.error('Error fetching data:', error));

        fetch('{{ route('main.dashboard.pakan') }}')
            .then(response => response.json())
            .then(data => {
                const totalSB10 = data.filter(item => item.jenis === 'SB 10').reduce((sum, item) => sum + item.jumlah, 0);
                const totalSB11 = data.filter(item => item.jenis === 'SB 11').reduce((sum, item) => sum + item.jumlah, 0);
                const totalSB12 = data.filter(item => item.jenis === 'SB 12').reduce((sum, item) => sum + item.jumlah, 0);

                const labels = ['SB 10', 'SB 11', 'SB 12'];
                const jumlah = [totalSB10, totalSB11, totalSB12];

                var ctxPakan = document.getElementById('pakanChart').getContext('2d');
                const configPakan = {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Pakan',
                                data: jumlah,
                                backgroundColor: [
                                    'rgba(53, 123, 135, 0.2)',
                                    'rgba(46, 153, 172, 0.2)',
                                    'rgba(142, 65, 70, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(53, 123, 135, 1)',
                                    'rgba(46, 153, 172, 1)',
                                    'rgba(142, 65, 70, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
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
                var pakanChart = new Chart(ctxPakan, configPakan);
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.querySelector('.sidebar');
            var charts = document.querySelectorAll('.chart-wrapper canvas');

            function resizeCharts() {
                charts.forEach(function(chart) {
                    chart.style.width = '80%';
                    chart.style.height = '120%';
                });
            }

            var sidebarToggle = document.querySelector('.sidebar-toggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    setTimeout(resizeCharts, 200);
                });
            }

            window.addEventListener('resize', resizeCharts);
            resizeCharts();
        });
    </script>
</x-app-layout>
