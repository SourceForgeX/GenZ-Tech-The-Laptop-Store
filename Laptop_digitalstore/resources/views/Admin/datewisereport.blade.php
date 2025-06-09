@extends('Layouts.AdminMaster')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <title>DateWise Booking Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafc;
            margin: 0;
            padding: 30px 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #3b82f6;
            margin-bottom: 30px;
            font-size: 24px;
        }

        /* Form Styling */
        form {
            display: flex;
            justify-content: center;
            gap: 15px;
            align-items: center;
            margin-bottom: 20px;
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
            padding: 10px 20px;
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

        /* Table Styling */
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #3b82f6;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #f3f4f6;
        }

        /* No Results Styling */
        .no-results {
            text-align: center;
            font-size: 18px;
            color: #9ca3af;
            margin-top: 20px;
        }

        /* Download Link Styling */
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
    <h1>Product Booking Report: {{ $from_date }} to {{ $to_date }}</h1>
    <label><h3 style="margin-left:200px;">Choose Date</h3></label>

    <form method="get" action="{{ route('datewisebooking') }}">
  
        <div style="margin-top:-200px;">
       
            <input type="date" name="from_date" value="{{ old('from_date') }}" required>
            <input type="date" name="to_date" value="{{ old('to_date') }}" required>
            <button type="submit">Filter</button>
        </div>
    </form>

    @if (!empty($from_date) && !empty($to_date))
        @if ($laptops->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Laptop Name</th>
                        <th>Quantity</th>
                        <th>Required Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laptops as $laptop)
                        <tr>
                            <td>{{ $laptop->laptop->laptopname }}</td>
                            <td>{{ $laptop->quantity }}</td>
                            <td>{{ $laptop->bookingdate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-results">No products found for the selected dates.</p>
        @endif
    @endif

@endsection
</html>
