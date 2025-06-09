@extends('Layouts.AdminMaster')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Model Management</h4>

    <div class="card shadow-sm">
        <h5 class="card-header text-white" style="background-color: #6c757d;">Model View</h5>

        <div class="p-3">
            <label for="ddlbrand" class="form-label fw-bold">Select Brand</label>
            <select class="form-control" id="ddlbrand">
                <option value="">--Select a Brand--</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->brandid }}">{{ $brand->brandname }}</option>
                @endforeach
            </select>
        </div>

        <div class="table-responsive text-nowrap p-3">
            <table class="table table-bordered table-striped">
                <thead class="table" style="background-color: #99988e;">

                    <tr >
                        <th  style="color: #fbfbf7 !important;">Sl No</th>
                        <th style="color: #fbfbf7 !important;">Model Name</th>
                        <th style="color: #fbfbf7 !important;">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="ddlmodel">
                    @foreach ($lapmodels as $index => $lapmodel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $lapmodel->modelname }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light p-0 dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('editmodel', ['modelid' => $lapmodel->modelid]) }}"
                                            onclick="return confirm('Are you sure you want to edit?');">
                                            <i class="bx bx-edit-alt me-1"></i>Edit
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('deletemodel', ['modelid' => $lapmodel->modelid]) }}"
                                            onclick="return confirm('Are you sure you want to delete?');">
                                            <i class="bx bx-trash me-1"></i>Delete
                                        </a>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ddlbrand').on('change', function () {
            var ddlbrand = $(this).val();

            if (ddlbrand) {
                $.ajax({
                    url: '/getmodel/' + ddlbrand,
                    type: 'GET',
                    success: function (data) {
                        $('#ddlmodel').empty(); // Clear existing models in the table body
                        if (data.length > 0) {
                            var i = 1;
                            $.each(data, function (key, value) {
                                $('#ddlmodel').append(
                                    '<tr>' +
                                    '<td>' + i++ + '</td>' +
                                    '<td>' + value.modelname + '</td>' +
                                    '<td>' +
                                    '<div class="dropdown">' +
                                    '<button type="button" class="btn btn-light p-0 dropdown-toggle" data-bs-toggle="dropdown">' +
                                    '<i class="bx bx-dots-vertical-rounded"></i>' +
                                    '</button>' +
                                    '<div class="dropdown-menu">' +
                                    '<a href="/editmodel/' + value.modelid + '" onclick="return confirm(\'Are you sure you want to edit?\');" class="dropdown-item">Edit</a>' +
                                    '<a href="/deletemodel/' + value.modelid + '" onclick="return confirm(\'Are you sure you want to delete?\');" class="dropdown-item">Delete</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</td>' +
                                    '</tr>'
                                );
                            });
                        } else {
                            // Display a message if no models are found for the selected brand
                            $('#ddlmodel').append(
                                '<tr>' +
                                '<td colspan="3" class="text-center text-danger">No models available for this brand</td>' +
                                '</tr>'
                            );
                        }
                    }
                });
            } else {
                $('#ddlmodel').empty(); // Clear models if no brand is selected
            }
        });
    });
</script>
