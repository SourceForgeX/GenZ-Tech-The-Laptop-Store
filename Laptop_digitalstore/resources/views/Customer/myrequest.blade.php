@extends('Layouts.Customermaster')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #f9f9f9;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        h2 {
            color: #4CAF50;
        }

        p {
            color: #555;
            font-size: 16px;
        }

        .filter-buttons {
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-buttons button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .filter-buttons button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function filterTable(status) {
            let rows = document.querySelectorAll('tbody tr');
            let visibleRowCount = 0;

            rows.forEach(row => {
                const rowStatus = row.querySelector('td:nth-child(4)').innerText;
                if (status === 'All' || rowStatus === status) {
                    row.style.display = '';
                    visibleRowCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Display alert if no rows are visible
            if (visibleRowCount === 0) {
                alert('No Items Found');
            }
        }
    </script>
</head>
<body>
    <div class="filter-buttons">
        <button onclick="filterTable('All')">All</button>
        <button onclick="filterTable('Delivered')">Delivered</button>
        <button onclick="filterTable('Confirm')">Confirm</button>
        <button onclick="filterTable('Paid')">Paid</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Laptop</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myrequest as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->laptop->laptopname }}</td>
                    <td>
                        <img src="../upload/{{ $booking->laptop->image1 }}" alt="{{ $booking->laptop->laptopname }}">
                    </td>
                    <td>{{ $booking->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection
