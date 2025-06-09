@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Location Registration</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('location_insert')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">District</label>
                            <select class="form-select" name="district" required>
                                <option selected>Choose...</option>
                                @foreach($districts as $district)

                                    <option value="{{$district->districtid}}"> {{$district->districtname}}</option>

                                @endforeach



                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Location</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                placeholder="Location name" name="location" value="{{ old('location') }}" required />


                            @if ($errors->has('location'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                        </div>




                        <button type="submit" class="btn btn-primary" name="submit">Send</button>

                        @if(session('success'))
                            <script>
                                alert("{{session('success')}}")
                            </script>

                        @endif
                        @if(session('failed'))
                            <script>
                                alert("{{session('failed')}}")
                            </script>

                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection