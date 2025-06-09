@extends('Layouts.Customermaster')
@section('content')

<style>
    html,
    body,
    .wrapper {
        background: #f5f5f5;
        font-family: 'Arial', sans-serif;
    }

    .panel {
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .panel-heading {
        background-color: #357ebd;
        color: #fff;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 10px 15px;
        font-size: 18px;
    }

    .panel-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #357ebd;
        box-shadow: 0 0 5px rgba(53, 126, 189, 0.5);
    }

    .btn-primary {
        background-color: #357ebd;
        border-color: #357ebd;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #285e8e;
        border-color: #285e8e;
    }

    .step {
        display: inline-block;
        padding: 10px 20px;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 25px;
        margin-right: 15px;
        font-size: 16px;
    }

    .step_complete {
        background-color: #357ebd;
        color: white;
    }

    .step_complete a {
        color: white;
        text-decoration: none;
    }

    .step_line {
        border-left: 20px solid #357ebd;
        height: 2px;
        width: 20px;
        margin-left: 10px;
    }

    .panel-footer {
        padding: 15px;
        background-color: #f8f8f8;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>


    <div class="container wrapper">
        <form class="form-horizontal" method="post" action="{{route('payment_insert')}}" >
            @csrf
            <div class="row" >
                <!-- Shipping Address Section -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                    <div class="panel panel-info"  style="margin-top:200px;">
                        <div class="panel-heading">Shipping Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-12"><strong>Name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country"
                                        value="{{$bookingid->customer->customername}}" readonly/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong>House name:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" required/>
                                    @if ($errors->has('address'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Landmark:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="landmark" class="form-control"
                                        value="{{$bookingid->customer->landmark}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Pincode:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="pincode" class="form-control"
                                        value="{{$bookingid->customer->pincode}}" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Phone</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" class="form-control"
                                        value="{{$bookingid->customer->phone}}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information Section -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-info" style="margin-top:200px;">
                        <div class="panel-heading"><i class="glyphicon glyphicon-lock"></i> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-12"><strong>Amount:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="car_number"
                                        value="{{$bookingid->totalamount}}" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Paydate:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="paydate" value="{{date('Y-m-d')}}" readonly />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12"><strong>Card Number:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" name="cdno" class="form-control" value="" required/>
                                    @if ($errors->has('cdno'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('cdno') }}
                                            </div>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-12"><strong>Card CVV:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="cvv" value="" required />
                                    @if ($errors->has('cvv'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('cvv') }}
                                            </div>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><strong>Expiry Date:</strong></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="date" value="" required/>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="bookingid"
                            value="{{$bookingid->bookingid}}" readonly />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </div>
        </form>
        <!-- @if(session('success'))
                            <script>
                                alert("{{session('success')}}")
                            </script>

                        @endif -->
    </div>


@endsection