@extends('Layouts.Guestmaster')
@section('content')


<div id="contact" class="request">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage" style="margin-top:100px;">
                    <h2>Customer Registration</h2>
                    <span>"Are you a new customer? Please fill out the form......."</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="black_bg">
                    <div class="row">
                        <div class="col-md-7 ">
                            <form class="main_form" method="post" action="{{route('customer_insert')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="Name" type="text" name="Name"
                                            value="{{ old('Name') }}" required>

                                        @if ($errors->has('Name'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('Name') }}
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="LandMark" type="text" name="landmark"
                                            value="{{ old('landmark') }}" required>

                                        @if ($errors->has('landmark'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('landmark') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <select name="ddldistrict" class="contactus" id="district" required>
                                            <option>--select a District--</option>
                                            @foreach ($districts as $district)
                                                <option value="{{$district->districtid}}">{{$district->districtname}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="ddllocation" class="contactus" id="location" required>
                                            <option>--select a Location--</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="pincode" type="text" name="pincode"
                                            value="{{ old('pincode') }}" required>
                                        @if ($errors->has('pincode'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('pincode') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="phone" type="text" name="phone"
                                            value="{{ old('phone') }}" required>
                                        @if ($errors->has('phone'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="email" type="text" name="email"
                                            value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="username" type="text" name="username"
                                            value="{{ old('username') }}" required>
                                        @if ($errors->has('username'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="password" type="text" name="password"
                                            value="{{ old('password') }}" required>
                                        @if ($errors->has('password'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="contactus" placeholder="password" type="text" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" required>
                                        @if ($errors->has('password_confirmation'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-sm-12">
                                        <button type="submit" name="submit" class="send_btn">Send</button>
                                    </div>
                                    <!-- @if(session('success'))
                                        <script>
                                            alert("{{session('success')}}")
                                        </script>

                                    @endif -->

                                </div>
                                <!-- @if ($errors->any())
                                    <div class="w-4/8 m-auto text-center">
                                        <ul class="text-red-500 list-none">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-red-500 list-none">
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif -->

                            </form>
                        </div>
                        <div class="col-md-5">
                            <div class="mane_img">
                                <figure><img src="{{asset('Guest/images/reg.jpg')}}" alt="#"
                                        style="margin-left: -25px;height: 884px;width: 486px;" /></figure>
                            </div>
                        </div>
                    </div>
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

        $('#district').on('change', function () {

            var district = $(this).val();
            // alert(district);
            if (district) {
                $.ajax({
                    url: '/getlocation/' + district,
                    type: 'GET',
                    success: function (data) {
                        // alert(data)
                        $('#location').empty();
                        $('#location').append('<option value="">--Select a Location--</option>');
                        $.each(data, function (key, value) {
                            $('#location').append('<option value="' + value.locationid + '">' + value.locationname + '</option>');
                        });
                    }
                });
            }
            else {
                $('#location').empty();
                $('#location').append('<option value="">Select a Location</option>');
            }
        });
    });

</script>