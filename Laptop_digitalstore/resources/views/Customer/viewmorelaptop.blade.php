@extends('Layouts.Customermaster')
@section('content')
<form action="{{route('booking')}}" method="post">
    @csrf
    <div class="laptop-details-section py-5">

        <div class="container">
            <div class="row align-items-center">
                <!-- Laptop Images Section -->
                <div class="col-md-6">
                    <div class="laptop-images d-flex flex-column gap-3">
                        <div class="main-image">
                            <figure>
                                <img src="../upload/{{$laptops->image1}}" alt="Laptop Image 1"
                                    class="img-fluid rounded shadow-sm">
                            </figure>
                        </div>
                        <div class="secondary-image">
                            <figure>
                                <img src="../upload/{{$laptops->image2}}" alt="Laptop Image 2"
                                    class="img-fluid rounded shadow-sm">
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- Laptop Details Section -->
                <div class="col-md-6">
                    <div class="laptop-details bg-light p-4 rounded shadow-sm">
                        <h2 class="text-primary fw-bold mb-3">{{$laptops->laptopname}}</h2>
                        <h3 class="text-success fw-bold mb-4">₹{{$laptops->price}}</h3>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Screen Size:</strong> {{$laptops->screensize}}</li>
                            <li class="list-group-item"><strong>Colour:</strong> {{$laptops->color}}</li>
                            <li class="list-group-item"><strong>Hard Disk Size:</strong> {{$laptops->harddisk}}</li>
                            <li class="list-group-item"><strong>Processor:</strong> {{$laptops->processor}}</li>
                            <li class="list-group-item"><strong>CPU Model:</strong> {{$laptops->cpumodel}}</li>
                            <li class="list-group-item"><strong>RAM Memory Installed Size:</strong> {{$laptops->ram}}
                            </li>
                            <li class="list-group-item"><strong>Operating System:</strong> {{$laptops->os}}</li>
                            <li class="list-group-item"><strong>Warranty:</strong> {{$laptops->warranty}}</li>
                            <li class="list-group-item"><strong>Graphics Card Description:</strong>
                                {{$laptops->graphics}}
                            </li>
                            <li class="list-group-item"><strong>Special Features:</strong> {{$laptops->features}}</li>
                            <input type="hidden" name="stock" id="stock" value="{{$laptops->stock}}"
                                class="form-control">
                            <input type="hidden" name="amt" id="amt" value="{{$laptops->price}}" class="form-control">
                            <input type="hidden" name="laptopid" id="laptopid" value="{{$laptops->laptopid}}"
                                class="form-control">

                            <li class="list-group-item"><strong>Quantity:</strong><input type="number" min="1"
                                    max="{{$laptops->stock}}" name="qty" id="qty" class="form-control"
                                    onchange="Calctotal()" required></li>

                            <li class="list-group-item"><strong>Total:</strong><input type="text" name="total"
                                    id="total" class="form-control" readonly></li>

                        </ul>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-lg me-2">Buy Now</button>
                            <!-- <a href="#" class="btn btn-outline-secondary btn-lg">Add to Wishlist</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script>
            alert("{{session('success')}}")
        </script>

    @endif


</form>
@endsection
<script>
    function Calctotal() {
        var stock = document.getElementById('stock').value; // Get the available stock value
        var qty = document.getElementById('qty').value; // Get the entered quantity
        var amt = document.getElementById('amt').value; // Get the price (amt)

        // Check if the quantity exceeds the available stock
        if (qty > stock) {
            alert("Quantity cannot be greater than available stock."); // Show alert
            document.getElementById('qty').value = stock; // Reset quantity to the available stock value
            qty = stock; // Ensure the quantity used in total calculation is correct
        }

        // Calculate the total if the quantity is valid
        var total = amt * qty;
        document.getElementById('total').value = total; // Set the total value
    }


</script>