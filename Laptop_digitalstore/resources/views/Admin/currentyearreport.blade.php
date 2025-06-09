@extends('Layouts.AdminMaster')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yearly Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
        }

        label,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .view-more-btn {
            background-color: #008CBA;
            color: white;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            border: none;
        }

        .view-more-btn:hover {
            background-color: #007bb5;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('currentyearreport') }}" method="GET">
            <label for="year">Choose Year:</label>
            <select id="year" name="year">
                @for ($year = 2000; $year <= date('Y'); $year++)
                    <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
            <button type="submit">Submit</button>
        </form>

        <h3>Report for Year: {{ $currentYear }}</h3>

        <!-- Income Data Table -->
        <table id="incomeTable">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monthlyDatainc as $data)
                    <tr>
                        <td>{{ $data['month_name'] }}</td>
                        <td>{{ number_format($data['totalamount'], 2) }}</td>
                        <td>
                            <!-- View More Button -->
                            <a class="view-more-btn" href="{{route('viewMore', ['month' => $data['month']])}}">View More</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Amount Section -->
        <div style="margin-top: 20px;">
            <strong>Total Income for {{ $currentYear }}: </strong> {{ number_format($totalIncome, 2) }}
        </div>
    </div>

    <script>
        function viewMore(month) {
            alert('View more details for the month: ' + month);
            // Here, you can add further logic to show more details, 
            // for example, redirect to a new page, fetch more data via AJAX, or show a modal with more information.
        }
    </script>

</body>

</html>

@endsection