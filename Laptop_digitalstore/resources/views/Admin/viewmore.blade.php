@extends('Layouts.AdminMaster')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <div class="card">
        <h5 class="card-header">Total bookings {{$month_name}}</h5>

        @if($bookings->isEmpty())
        <p style="text-align: center; color: #721c24; font-size: 18px;">No bookings for this month.</p>
    @else
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Laptop</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <tr>


                        @foreach ($bookings as $index => $booking)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$index + 1}}</strong></td>
                                <td>{{$booking->laptop->laptopname}}</td>
                                <td>{{$booking->bookingdate}}</td>
                                <td>{{$booking->quantity}}</td>
                                <td>{{$booking->totalamount}}</td>


                               
                            </tr>

                        @endforeach

                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection