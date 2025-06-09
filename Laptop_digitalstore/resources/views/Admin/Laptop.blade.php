@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Laptop Registration</h5>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('laptop_insert')}}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Laptop name</label>
                                    <input type="text" class="form-control" name="laptopname"
                                        value="{{ old('laptopname') }}" required />
                                    @if ($errors->has('laptopname'))
                                        <div class="error" style="color: red;">{{ $errors->first('laptopname') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="limage" required />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Image1</label>
                                    <input type="file" class="form-control" name="limage1" required />
                                </div>
                            </div>

                        </div>

                        <div class="row">




                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <select class="form-control" name="ddlbrand" id="ddlbrand" required>
                                        <option>--select--</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{$brand->brandid}}">{{$brand->brandname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Model</label>
                                    <select class="form-control" name="ddlmodel" id="ddlmodel" required>
                                        <option>--select--</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                                        required />
                                    @if ($errors->has('price'))
                                        <div class="error" style="color: red;">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Screen Size</label>
                                    <input type="text" class="form-control" name="screensize"
                                        value="{{ old('screensize') }}" required />
                                    @if ($errors->has('screensize'))
                                        <div class="error" style="color: red;">{{ $errors->first('screensize') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Color</label>
                                    <input type="text" class="form-control" name="color" value="{{ old('color') }}"
                                        required />
                                    @if ($errors->has('color'))
                                        <div class="error" style="color: red;">{{ $errors->first('color') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Hard Disk Size</label>
                                    <input type="text" class="form-control" name="harddisk"
                                        value="{{ old('harddisk') }}" required />
                                    @if ($errors->has('harddisk'))
                                        <div class="error" style="color: red;">{{ $errors->first('harddisk') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Processor</label>
                                    <input type="text" class="form-control" name="processor"
                                        value="{{ old('processor') }}" required />
                                    @if ($errors->has('processor'))
                                        <div class="error" style="color: red;">{{ $errors->first('processor') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">CPU Model</label>
                                    <input type="text" class="form-control" name="cpumodel"
                                        value="{{ old('cpumodel') }}" required />
                                    @if ($errors->has('cpumodel'))
                                        <div class="error" style="color: red;">{{ $errors->first('cpumodel') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">RAM Memory Installed Size</label>
                                    <input type="text" class="form-control" name="rammemory"
                                        value="{{ old('rammemory') }}" required />
                                    @if ($errors->has('rammemory'))
                                        <div class="error" style="color: red;">{{ $errors->first('rammemory') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Operating System</label>
                                    <input type="text" class="form-control" name="os" value="{{ old('os') }}"
                                        required />
                                    @if ($errors->has('os'))
                                        <div class="error" style="color: red;">{{ $errors->first('os') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Graphics Card Description</label>
                                    <input type="text" class="form-control" name="graphics"
                                        value="{{ old('graphics') }}" required />
                                    @if ($errors->has('graphics'))
                                        <div class="error" style="color: red;">{{ $errors->first('graphics') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Warranty</label>
                                    <input type="text" class="form-control" name="warranty"
                                        value="{{ old('warranty') }}" required />
                                    @if ($errors->has('warranty'))
                                        <div class="error" style="color: red;">{{ $errors->first('warranty') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock" value="{{ old('stock') }}"
                                        required />
                                    @if ($errors->has('stock'))
                                        <div class="error" style="color: red;">{{ $errors->first('stock') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Special Features</label>
                                    <textarea name="features" class="form-control"
                                        required>{{ old('features') }}</textarea>
                                    @if ($errors->has('features'))
                                        <div class="error" style="color: red;">{{ $errors->first('features') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                        @if(session('success'))
                            <script>alert("{{session('success')}}")</script>
                        @endif

                        @if(session('failed'))
                            <script>alert("{{session('failed')}}")</script>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        // alert("a");

        $('#ddlbrand').on('change', function () {

            var ddlbrand = $(this).val();
            // alert(ddlbrand);
            if (ddlbrand) {
                $.ajax({
                    url: '/getmodel/' + ddlbrand,
                    type: 'GET',
                    success: function (data) {
                        // alert(data)
                        $('#ddlmodel').empty();
                        $('#ddlmodel').append('<option value="">--Select a Model--</option>');
                        $.each(data, function (key, value) {
                            $('#ddlmodel').append('<option value="' + value.modelid + '">' + value.modelname + '</option>');
                        });
                    }
                });
            }
            else {
                $('#ddlmodel').empty();
                $('#ddlmodel').append('<option value="">Select a model</option>');
            }
        });
    });

</script>