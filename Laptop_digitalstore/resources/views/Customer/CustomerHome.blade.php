@extends('Layouts.Customermaster')
@section('content')

<section class="banner_main">
   <div class="container-fluid">
      <div class="row d_flex">
         <div class="col-md-5">
            <div class="text-bg">
               <h1>Computer and <br>laptop shop</h1>
               <strong>Free Multipurpose Responsive</strong>
               <span>Landing Page 2024</span>
               <a href="{{route('brandview')}}">Buy Now</a>
            </div>
         </div>
         <div class="col-md-7 padding_right1">
            <div class="text-img">
               <figure><img src="{{asset('Customer/images/top_img.png')}}" alt="#" /></figure>
               <h3>01</h3>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
<div id="about" class="about">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>About Pcoint</h2>
               <span>d to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
                  gener</span>
            </div>
         </div>
      </div>
      <div class="row">
         
         <div class="col-md-8 offset-md-2 ">
            <div class="about_box ">
               <figure><img src="{{asset('Customer/images/about_img.png')}}" alt="#" /></figure>
               <a class="read_more" href="#">Read more</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- about -->
<!-- best -->
<div id="" class="best">
   <div class="container">
      <div class="row">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage" style="margin-top:10px;">
                     <h2>Build With Best </h2>
                     <span>Our Brands</span>
                  </div>
               </div>
            </div>
            <div class="row">


               @if(!empty($brand))
               @foreach ($brand as $b)

               <div class="col-md-4">
                <div class="best_box" style="width:300px;height:300px;">
                  <img src="../upload/{{$b->logo}}" style="width:180px;height:180px;">

                  <h4>{{$b->brandname}}</h4>

                </div>
               </div>


            @endforeach
            @else
               <div class="col-md-12 text-center">
                 <p>No products available.</p>
                 @if(session('data'))
                <p>{{ session('data') }}</p>
             @endif
               </div>
            @endif




            </div>
         </div>
      </div>

   </div>
</div>
<!-- end best -->
<!-- request -->

<!-- end request -->
<!-- two_box section -->
<div class="two_box">
   <div class="container-fluid">
      <div class="row d_flex">
         <div class="col-md-6">
            <div class="two_box_img">
               <figure><img src="{{asset('Customer/images/leptop.jpg')}}" alt="#" /></figure>
            </div>
         </div>
         <div class="col-md-6">
            <div class="two_box_img">
               <h2><span class="offer">15% </span>0ffer everyday</h2>
               <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in some form, by injected humour, or randomised words which don't look even slightly
                  believable</p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end two_box section -->
<!-- testimonial -->
<div class="testimonial">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Testimonial</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="carousel-caption ">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="test_box">
                                    <h3>Michl ro</h3>
                                    <p><i class="padd_rightt0"><img src="{{asset('Customer/images/te1.png')}}"
                                             alt="#" /></i>There are many variations of passages of Lorem Ipsum
                                       available, but the majority have suffered alteration in some <i
                                          class="padd_leftt0"><img src="images/te2.png" alt="#" /></i> <br>form, by
                                       injected humour, or randomised words which don't look even slightly believable
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="carousel-caption">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="test_box">
                                    <h3>Michl ro</h3>
                                    <p><i class="padd_rightt0"><img src="{{asset('Customer/images/te1.png')}}"
                                             alt="#" /></i>There are many variations of passages of Lorem Ipsum
                                       available, but the majority have suffered alteration in some <i
                                          class="padd_leftt0"><img src="images/te2.png" alt="#" /></i> <br>form, by
                                       injected humour, or randomised words which don't look even slightly believable
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="carousel-caption">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="test_box">
                                    <h3>Michl ro</h3>
                                    <p><i class="padd_rightt0"><img src="{{asset('Customer/images/te1.png')}}"
                                             alt="#" /></i>There are many variations of passages of Lorem Ipsum
                                       available, but the majority have suffered alteration in some <i
                                          class="padd_leftt0"><img src="images/te2.png" alt="#" /></i> <br>form, by
                                       injected humour, or randomised words which don't look even slightly believable
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
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
@endsection