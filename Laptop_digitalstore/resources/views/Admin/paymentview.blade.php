@extends('Layouts.AdminMaster')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <div class="card">
        <h5 class="card-header">Booking View</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Laptop Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Viewmore</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <tr>


                        @foreach ($datas as $index => $data)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$index + 1}}</strong></td>
                                <td>{{$data->booking->laptop->laptopname}}</td>
                                <td><img src="../upload/{{$data->booking->laptop->image1}}" width="100px;" height="100px;"></td>

                                <td>{{$data->booking->quantity}}</td>
                                <td>
                                <td><a href="{{route('viewmoredetails', ['paymentid' => $data->paymentid])}}">Viewmore</a></td>
                                </td>
                            </tr>

                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        alert("{{session('success')}}")
    </script>

@endif


@endsection