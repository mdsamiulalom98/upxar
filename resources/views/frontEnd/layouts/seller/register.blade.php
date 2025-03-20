@extends('frontEnd.layouts.master')
@section('title','Seller Register')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="form-content seller-auth">
                    <div class="seller-form">
                        <p class="auth-title">Seller Register </p>
                        <form action="{{route('seller.store')}}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Shop Name</label>
                                <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter shop name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- form group end -->
                            <div class="form-group mb-2">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input class="form-control  @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- form group end -->
                            <div class="form-group mb-2">
                                <label for="email" class="form-label">Email Address</label>
                                <input class="form-control  @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email address" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- form group end -->
                            <div class="form-group mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
                                    <div class="input-group-text password-toggle" onclick="togglePassword('password', this)">
                                        <i class="fa-solid fa-eye-slash"></i> <!-- Initially hidden -->
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" placeholder="Confirm password" required>
                                    <div class="input-group-text password-toggle" onclick="togglePassword('confirm-password', this)">
                                        <i class="fa-solid fa-eye-slash"></i> <!-- Initially hidden -->
                                    </div>
                                </div>
                                @error('confirm-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- form group end -->
                            <div class="mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept with <a href="{{route('page',['slug'=>'conditions'])}}"><u>Conditions</u></a> & <a href="{{route('page',['slug'=>'privacy-policy'])}}"><u>Privacy Policy</u></a></label>
                                </div>
                            </div>
                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                            </div>
                        </form>
                         <div class="register-now no-account">
                            <p> Already Have An Account?  <a href="{{route('seller.login')}}"><i data-feather="edit-3"></i> Click To Login</a></p>
                           
                        </div>
                    </div>
                    <!-- seller form -->
                    <div class="seller-img">
                        <img src="{{asset('public/frontEnd/images/seller-register.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
<script>
    function togglePassword(fieldId, toggleElement) {
        let input = document.getElementById(fieldId);
        let icon = toggleElement.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // Show open eye
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // Show closed eye
        }
    }
</script>

@endpush