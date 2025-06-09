@extends('Layouts.AdminMaster')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        #myPieChart {
            max-width: 476px;
            max-height: 405px;
            width: 100%;
            margin-top: 80px;
            margin-left: 250px;
            height: auto;
        }

        .chart-info {
            max-width: 476px;
            margin-left: 250px;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <canvas id="myPieChart"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('myPieChart').getContext('2d');

            // Pass the PHP data correctly
            const labels = {!! json_encode($data->pluck('name')) !!};
            const dataValues = {!! json_encode($data->pluck('booking_count')) !!};

            const backgroundColors = [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(100, 255, 218, 0.6)',
                'rgba(255, 204, 204, 0.6)',
                'rgba(204, 204, 255, 0.6)',
                'rgba(255, 255, 153, 0.6)',
            ];

            if (labels.length > 0 && dataValues.length > 0) {
                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Laptop Booking Count',
                        data: dataValues,
                        backgroundColor: backgroundColors.slice(0, labels.length),
                        borderColor: 'rgba(0, 0, 0, 0.1)',
                        borderWidth: 1
                    }]
                };

                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Laptop Booking Count Report'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (tooltipItem) {
                                        const dataIndex = tooltipItem.dataIndex;

                                        if (typeof dataIndex !== 'undefined' && dataIndex < data.datasets[0].data.length) {
                                            const total = data.datasets[0].data.reduce((acc, value) => acc + value, 0);
                                            const value = data.datasets[0].data[dataIndex];
                                            const percentage = ((value / total) * 100).toFixed(2);
                                            return `${data.labels[dataIndex]}: ${percentage}% (${value})`;
                                        }
                                        return ''; // Return empty string if invalid
                                    }
                                }
                            },
                        },
                        layout: {
                            padding: 10,
                        },
                    },
                    plugins: [ChartDataLabels], // Include the plugin
                };

                // Add data labels inside the pie chart
                Chart.defaults.plugins.datalabels = {
                    color: '#fff',
                    font: {
                        size: 14,
                    },
                    formatter: function (value) {
                        return value; // Display count
                    },
                };

                new Chart(ctx, config);
            } else {
                console.log('No data available for the chart.');
            }
        });
    </script>
</body>

</html>
@endsection
