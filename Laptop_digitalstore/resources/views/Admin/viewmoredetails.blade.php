@extends('Layouts.AdminMaster')
@section('content')

<h3 class="pb-1 mb-4 text-center" style="margin-top:80px;">View More Details</h3>

<div class="row mb-5">
    <!-- Customer Details Section -->
    <div class="col-md">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="card-img card-img-left" src="../upload/{{$payments->booking->laptop->image1}}"
                        alt="Laptop Image" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Customer Details</h5>
                        <p><strong>Customer Name:</strong> {{$payments->booking->Customer->customername}}</p>
                        <p><strong>House Name:</strong> {{$payments->housename}}</p>
                        <p><strong>Phone:</strong> {{$payments->booking->Customer->phone}}</p>
                        <p><strong>Landmark:</strong> {{$payments->booking->Customer->landmark}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Section -->
    <div class="col-md">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Order Details</h5>
                        <p><strong>Laptop Name:</strong> {{$payments->booking->laptop->laptopname}}</p>
                        <p><strong>Quantity:</strong> {{$payments->booking->quantity}}</p>
                        <p><strong>Total Amount:</strong> ₹{{$payments->booking->totalamount}}</p>
                        <p><strong>Color:</strong> {{$payments->booking->laptop->color}}</p>
                        <a href="{{route('delivered', ['bookingid' => $payments->booking->bookingid])}}"
                            onclick="return confirm('Are you sure you want to mark this laptop as delivered?')">
                            <button type="submit" class="btn btn-success">Mark as Delivered</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="card-img card-img-right" src="../upload/{{$payments->booking->laptop->image2}}"
                        alt="Laptop Image" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Centered Payment Details Section -->
<div class="row justify-content-center mb-5">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Payment Details</h5>
                <p><strong>Customer Name:</strong> {{$payments->booking->Customer->customername}}</p>
                <p><strong>Total Amount:</strong> ₹{{$payments->booking->totalamount}}</p>
                <p><strong>Account Number:</strong> 6789 8677 5678 9879</p>
                <p><strong>Payment Date:</strong> {{$payments->paymentdate}}</p>

                <!-- Conditional rendering for the Confirm button -->
                @if ($payments->booking->status !== 'Confirmed')
                    <a href="{{route('confirm', ['bookingid' => $payments->booking->bookingid])}}"
                        onclick="return confirm('Are you sure you want to confirm this payment?')">
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </a>
                @else
                    <p><span class="text-success font-weight-bold">Payment Confirmed</span></p>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection