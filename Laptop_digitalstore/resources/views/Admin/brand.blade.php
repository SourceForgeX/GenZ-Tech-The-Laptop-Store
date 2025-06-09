@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Brand Registration</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('brand_insert')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Brand name</label>
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Brand name"
                                name="brandname" value="{{ old('brandname') }}" required />
                            @if ($errors->has('brandname'))
                                <div class="error" style="color: red;">
                                    {{ $errors->first('brandname') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Logo</label>
                            <input type="file" class="form-control" id="basic-default-fullname" placeholder="Brand name"
                                name="logo" value="{{ old(key: 'logo') }}" required />
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