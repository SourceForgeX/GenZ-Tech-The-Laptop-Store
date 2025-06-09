@extends('Layouts.CustomerMaster')
@section('content')

<!-- <div id="" class="best"> -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage"  style="margin-top:200px;">
                    <h2>Build With Best </h2>
                    <span>My Brands</span>
                </div>
            </div>
        </div>
        <div class="row">


            @if(!empty($brand))
                @foreach ($brand as $b)

                    <div class="col-md-4">
                        <div class="best_box" style="width:300px;height:300px;">
                            <a href="{{route('laptopview', ['bid' => $b->brandid])}}" class="block-20">  <img src="../upload/{{$b->logo}}" style="width:180px;height:180px;"></a>
                              
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

@endsection