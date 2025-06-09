@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Laptop</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update_laptop', $Laptops->laptopid)}}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Laptop name</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->laptopname}}" name="laptopname" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Image1</label>

                            <img src="../upload/{{$Laptops->image1}}" class="form-control"
                                style="width:100px; height:100px;">
                            <input type="file" name="image">
                            <input type="hidden" name="oldimage" value="{{$Laptops->image1}}">
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Image2</label>

                            <img src="../upload/{{$Laptops->image2}}" class="form-control"
                                style="width:100px; height:100px;">
                            <input type="file" name="image1">
                            <input type="hidden" name="oldimage1" value="{{$Laptops->image2}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Price</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->price}}" name="price" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Screen Size</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->screensize}}" name="screensize" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Color</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->color}}" name="color" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Hard disk</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->harddisk}}" name="harddisk" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Processor</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->processor}}" name="processor" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">CPU Model</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->cpumodel}}" name="cpumodel" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">RAM memory</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->ram}}" name="ram" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Operating System</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->os}}" name="os" />
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Graphics</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->graphics}}" name="graphics" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Warranty</label>

                            <input type="text" class="form-control" id="basic-default-fullname"
                                Value="{{$Laptops->warranty}}" name="warranty" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">features</label>

                            <textarea name="features" class="form-control"
                                value="{{$Laptops->features}}">{{$Laptops->features}}</textarea>
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