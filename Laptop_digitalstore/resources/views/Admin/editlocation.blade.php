@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Location</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update_location', $Locations->locationid)}}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Location name</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Locations->locationname}}" name="locationname" />
                        </div>




                        <button type="submit" class="btn btn-primary" name="submit">Send</button>

                        @if(session('success'))
                            <script>
                                alert("{{session('success')}}")
                            </script>

                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection