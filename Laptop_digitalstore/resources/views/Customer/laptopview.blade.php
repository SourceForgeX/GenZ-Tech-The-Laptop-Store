@extends('Layouts.Customermaster')
@section('content')


<div class="container">
   <div class="row">
      <div class="col-md-12">
         <select class="form-control" id="modelid" name="ddlbrand" style="margin-top:200px;">
            <option>--Choose a Model--</option>
            @foreach ($lapmodels as $model)
            <option value="{{ $model->modelid }}">{{ $model->modelname }}</option>
         @endforeach
         </select>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="titlepage">
            <h2>View Best Laptops</h2>
            <span>"Choose a model to discover a curated selection of the best laptops that perfectly match your needs
               and preferences."</span>
         </div>
      </div>
   </div>

   <!-- Laptops Display Section -->
   <div class="row" id="laptop">
      <!-- Laptops will be dynamically appended here -->
   </div>
</div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $(document).ready(function () {
      $('#modelid').on('change', function () {
         var modelid = $(this).val();

         if (modelid) {
            $.ajax({
               url: '/getlaptop/' + modelid,
               type: 'GET',
               success: function (data) {
                  $('#laptop').empty(); // Clear previous data
                  if (data.length > 0) {
                     $.each(data, function (key, value) {
                        $('#laptop').append(
                           '<div class="col-md-4 mb-4">' +
                           '<div class="best_box" style="width:300px;height:300px;">' +
                           '<a href="/viewmorelaptop/' + value.laptopid + '">' +
                           '<img src="../upload/' + value.image1 + '" class="img-fluid" alt="Laptop Image" style="width:180px;height:180px;"">' +
                           '</a>' +
                           '<h4>' + value.laptopname + '</h4>' +
                           '<p>Price: ₹' + value.price + '</p>' +
                           '</div>' +
                           '</div>'

                        );
                     });
                  } else {
                     // Show an alert if no data is returned
                     alert('No laptops found for the selected model. choose another model');
                  }
               },

               error: function () {
                  $('#laptop').empty();
                  alert('Failed to load laptops. Please try again.');
               }
            });
         } else {
            $('#laptop').empty();
            alert('No laptops found for the selected model.');
         }
      });
   });
</script>