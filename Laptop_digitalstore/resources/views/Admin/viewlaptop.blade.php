@extends('Layouts.AdminMaster')
@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Laptop Management</h4>

    <div class="card shadow-sm">
        <h5 class="card-header text-white" style="background-color: #6c757d;">Laptop View</h5>

        <!-- Brand Dropdown -->
        <div class="mb-3">
            <label for="ddlbrand" class="form-label">Select Brand</label>
            <select name="brand" id="ddlbrand" class="form-select shadow-none">
                <option value="">--Select A Brand--</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->brandid}}">{{$brand->brandname}}</option>
                @endforeach
            </select>
        </div>

        <!-- Model Dropdown -->
        <div class="mb-3">
            <label for="ddlmodel" class="form-label">Select Model</label>
            <select name="model" id="ddlmodel" class="form-select shadow-none">
                <option value="">--Select a Model--</option>
            </select>
        </div>

        <!-- Table of Laptops -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="laptop">
                <!-- Table header and content will be dynamically inserted via AJAX -->
            </table>
        </div>
    </div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        // Fetch models based on selected brand
        $('#ddlbrand').on('change', function () {
            var ddlbrand = $(this).val();
            if (ddlbrand) {
                $.ajax({
                    url: '/getmodel/' + ddlbrand,
                    type: 'GET',
                    success: function (data) {
                        $('#ddlmodel').empty();
                        $('#ddlmodel').append('<option value="">--Select a Model--</option>');
                        $.each(data, function (key, value) {
                            $('#ddlmodel').append('<option value="' + value.modelid + '">' + value.modelname + '</option>');
                        });
                    }
                });
            } else {
                $('#ddlmodel').empty();
                $('#ddlmodel').append('<option value="">Select a model</option>');
            }
        });

        // Fetch laptops based on selected model
        $('#ddlmodel').on('change', function () {
            var ddlmodel = $(this).val();
            if (ddlmodel) {
                $.ajax({
                    url: '/getlaptop/' + ddlmodel,
                    type: 'GET',
                    success: function (data) {
                        $('#laptop').empty();
                        if (data.length > 0) {
                            var i = 1;
                            $('#laptop').append(`
                                <thead class="table" style="background-color: #99988e;">
                                    <tr>
                                        <th class="text-center" style="color: #fbfbf7 !important;">Sl No</th>
                                        <th style="color: #fbfbf7 !important;">Laptop</th>
                                        <th style="color: #fbfbf7 !important;">Image</th>
                                        <th style="color: #fbfbf7 !important;">Price</th>
                                        <th style="color: #fbfbf7 !important;">Stock</th>
                                        <th style="color: #fbfbf7 !important;">Features</th>
                                        <th style="color: #fbfbf7 !important;">AddStock</th>
                                        <th style="color: #fbfbf7 !important;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                            `);
                            $.each(data, function (key, value) {
                                $('#laptop').append(`
                                    <tr>
                                        <td class="text-center">${i++}</td>
                                        <td>${value.laptopname}</td>
                                        <td><img src="../upload/${value.image1}" alt="Laptop Image" class="img-fluid" style="width: 70px; height: 70px;"></td>
                                        <td>$${value.price}</td>
                                        <td>${value.stock}</td>
                                        <td>${value.features}</td>
                                        <td><a href="/addstock/${value.laptopid}">AddStock</a></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-outline-primary p-0 dropdown-toggle" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/editlaptop/${value.laptopid}" class="dropdown-item text-warning">Edit</a>
                                                    <a href="/deletelaptop/${value.laptopid}" class="dropdown-item text-danger">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                            });
                            $('#laptop').append('</tbody>');
                        } else {
                            // Display message if no laptops are found
                            $('#laptop').append(`
                                <thead class="table-light">
                                    <tr>
                                        <th colspan="8" class="text-center text-danger">No laptops available for this model</th>
                                    </tr>
                                </thead>
                            `);
                        }
                    }
                });
            } else {
                $('#laptop').empty();
            }
        });
    });
</script>

