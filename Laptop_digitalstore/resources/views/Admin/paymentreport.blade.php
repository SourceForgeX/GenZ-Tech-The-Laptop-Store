@extends('layouts.adminmaster')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>DateWise Booking Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #3b82f6;
            font-size: 26px;
            margin-bottom: 20px;
        }

        /* Form styling */
        form {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
            margin-bottom: 30px;
        }

        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #fff;
            transition: border-color 0.3s;
        }

        input[type="date"]:focus {
            border-color: #3b82f6;
            outline: none;
        }

        button {
            padding: 12px 18px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2563eb;
        }

        /* Table styling */
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3b82f6;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        tr:hover {
            background-color: #f3f4f6;
        }

        .no-results {
            text-align: center;
            font-size: 18px;
            color: #9ca3af;
            margin-top: 20px;
        }

        /* Total Amount Section */
        .total-amount {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            color: #3b82f6;
        }

        /* Download Link */
        .download-link {
            display: inline-block;
            text-align: center;
            margin: 20px auto;
            padding: 12px 25px;
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .download-link:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body>
    <h1>Payment Report: From {{ $from_date }} to {{ $to_date }}</h1>
    <label>
        <h3 style="margin-left:200px;">Choose Date</h3>
    </label>

    <form method="get" action="{{ route('paymentreport') }}">
        <div style="margin-top:-200px;">
            <input type="date" name="from_date" value="{{ old('from_date', $from_date) }}" required>
            <input type="date" name="to_date" value="{{ old('to_date', $to_date) }}" required>

            <button type="submit">Filter</button>
        </div>
    </form>

    @if (!empty($from_date) && !empty($to_date))
        @if ($laptops->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Laptop Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalAmount = 0; // Initialize total amount
                    @endphp
                    @foreach ($laptops as $l)
                        @php
                            $laptopAmount = $l->booking->totalamount ?? 0; // Get the product amount
                            $totalAmount += $laptopAmount; // Add to total
                        @endphp
                        <tr>
                            <td>{{ $l->booking->customer->customername }}</td> <!-- Customer Name -->
                            <td>{{ $l->booking->laptop->laptopname }}</td> <!-- Laptop Name -->
                            <td>₹{{ number_format($laptopAmount, 2) }}</td> <!-- Amount -->
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-amount">
                Total Amount: ₹{{ number_format($totalAmount, 2) }}
            </div>
        @else
            <p class="no-results">No products found for the selected dates.</p>
        @endif
    @endif

    @endsection

</body>

</html>