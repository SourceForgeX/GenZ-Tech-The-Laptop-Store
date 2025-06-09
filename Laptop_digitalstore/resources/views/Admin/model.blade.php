@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Model Registration</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('model_insert')}}">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Choose a brand</label>
                            <select name="ddlbrand" class="form-control" required value="{{ old('ddlbrand') }}">
                                <option>--select--</option>
                                @foreach ($brands as $brand)


                                    <option value="{{$brand->brandid}}">{{$brand->brandname}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Model</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                                 placeholder="Model name" name="model" value="{{ old('model') }}" required/>
                            @if ($errors->has('model'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('model') }}
                                </div>
                            @endif
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