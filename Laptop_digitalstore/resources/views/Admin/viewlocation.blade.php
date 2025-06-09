@extends('Layouts.AdminMaster')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Location View</h4>

    <div class="card shadow-sm">
    <h5 class="card-header text-white" style="background-color: #6c757d;">Select District</h5>
      
        <div class="p-3">
            <select name="district" id="ddldistrict" class="form-select">
                <option>-- Select District --</option>
                @foreach ($districts as $district)
                    <option value="{{$district->districtid}}">{{$district->districtname}}</option>
                @endforeach
            </select>
        </div>

        <div class="table-responsive text-nowrap">
            <div id="loading" class="text-center mt-3" style="display: none;">
                <span class="spinner-border text-primary" role="status"></span>
                <p>Loading locations...</p>
            </div>
            <table class="table table-bordered table-striped mt-3" id="location">
                <!-- Dynamic Content -->
            </table>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ddldistrict').on('change', function () {
            var ddldistrict = $(this).val();
            $('#location').empty();
            if (ddldistrict) {
                $('#loading').show();
                $.ajax({
                    url: '/getlocation/' + ddldistrict,
                    type: 'GET',
                    success: function (data) {
                        $('#loading').hide();
                        $('#location').append(`
                            <thead class="table" style="background-color: #99988e;color: #9d5656;">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Location Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        `);
                        var i = 1;
                        if (data.length > 0) {
                            $.each(data, function (key, value) {
                                $('#location tbody').append(`
                                    <tr>
                                        <td>${i++}</td>
                                        <td>${value.locationname}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                                   <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/editlocation/${value.locationid}" class="dropdown-item">Edit</a>
                                                    <a href="/deletelocation/${value.locationid}" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                `);
                            });
                        } else {
                            // Append message when no locations are found
                            $('#location tbody').append(`
                                <tr>
                                    <td colspan="3" class="text-center text-danger">No locations available for this district</td>
                                </tr>
                            `);
                        }
                    },
                    error: function () {
                        $('#loading').hide();
                        alert('Failed to load locations. Try again.');
                    }
                });
            }
        });
    });
</script>
