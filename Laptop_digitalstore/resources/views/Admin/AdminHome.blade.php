@extends('Layouts.AdminMaster')
@section('content')
<h1 style="margin-left:100px; margin-top:80px;">welcome admin</h1>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie Chart Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .chart-info table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .chart-info th,
        .chart-info td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        .chart-info th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <canvas id="myPieChart"></canvas>
    <div class="chart-info">
        <h3>Laptop Booking Count Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody id="data-table">
                <!-- Table rows will be generated dynamically -->
            </tbody>
        </table>
    </div>
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
                            }
                        }
                    }
                };

                new Chart(ctx, config);

                // Populate the table with counts
                const dataTable = document.getElementById('data-table');
                labels.forEach((label, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${label}</td>
                        <td>${dataValues[index]}</td>
                    `;
                    dataTable.appendChild(row);
                });
            } else {
                console.log('No data available for the chart.');
            }
        });
    </script>
</body>

</html>
@endsection

