@extends('Layouts.AdminMaster')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5>
                    <!-- <small class="text-muted float-end">Default label</small> -->
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update_stock', $Laptops->laptopid)}}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Current Stock</label>

                            <input type="text" class="form-control" id="old"
                                Value="{{$Laptops->stock}}" name="old" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">New Stock</label>


                            <input type="text" class="form-control" id="newstock" name="newstock" onchange="Calctotal()" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Total Stock</label>


                            <input type="text" class="form-control" id="stock" name="stock" />
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


<script>
    function Calctotal() {
        var old = document.getElementById('old').value;
        var newstock = document.getElementById('newstock').value;
        // alert()
        var t = parseInt(old) + parseInt(newstock);
        // document.getElementById('total').innerHTML = t;
        document.getElementById('stock').value = t;


    }

</script>


@endsection