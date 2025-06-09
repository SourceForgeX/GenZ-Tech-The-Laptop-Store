@extends('Layouts.AdminMaster')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <div class="card">
        <h5 class="card-header">Brand View</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Brand name</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <tr>


                        @foreach ($brands as $index => $brand)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$index + 1}}</strong></td>
                                <td>{{$brand->brandname}}</td>
                                <td><img src="../upload/{{$brand->logo}}" width="100px;" height="100px;"></td>


                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{route('editbrand', ['brandid' => $brand->brandid])}}"
                                                onclick="return confirm('Are you want to edit..???')"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{route('deletebrand', ['brandid' => $brand->brandid])}}"
                                                onclick="return confirm('Are you want to delete..???')"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection