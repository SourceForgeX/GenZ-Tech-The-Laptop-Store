@extends('Layouts.Guestmaster')
@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg p-5" style="width: 400px; border-radius: 15px; background-color: #f9f9f9;">
        <h3 class="text-center mb-4 text-primary" style="margin-top: 105px;" >Welcome Back!</h3>
        <p class="text-center text-muted mb-4">Sign in to access your account</p>
        <form method="post" action="{{ route('adminlogin_process') }}">
            @csrf
            <!-- Email input -->
            <div class="form-group mb-4">
                <label for="email" class="form-label text-secondary">Email Address</label>
                <input type="text" id="email" name="username" 
                    class="form-control border-primary rounded-pill px-3"
                    placeholder="Enter your email" />
            </div>

            <!-- Password input -->
            <div class="form-group mb-4">
                <label for="password" class="form-label text-secondary">Password</label>
                <input type="password" id="password" name="password" 
                    class="form-control border-primary rounded-pill px-3"
                    placeholder="Enter your password" />
            </div>

            <!-- Submit button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary rounded-pill" >Sign In</button>
            </div>

            <!-- Additional links -->
            <!-- <div class="text-center mt-4">
                <a href="#!" class="text-decoration-none text-primary">Forgot your password?</a>
            </div> -->
        </form>

        @if (session('failed'))
            <script>
                alert('{{ session('failed') }}');
            </script>
        @endif
    </div>
</div>
@endsection
