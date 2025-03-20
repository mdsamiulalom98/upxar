@extends('frontEnd.layouts.master')
@section('title','Login')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="form-content seller-auth">
                    <div class="seller-form">
                        <p class="auth-title">Seller Login </p>
                        <form action="{{route('seller.signin')}}" method="POST"  data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="phone">Mobile Number *</label>
                                <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror"  placeholder="Enter your mobile number" name="phone" value="{{ old('phone') }}"  required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- col-end -->
                            <div class="form-group mb-3">
                                <label for="password">Password *</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" value="{{ old('password') }}"  required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- col-end -->
                            <a href="{{route('seller.forgot.password')}}" class="forget-link"><i class="fa-solid fa-unlock"></i> Forgot Password?</a>
                            <div class="form-group mb-3 text-center d-grid">
                                <button class="btn btn-primary"> Login </button>
                            </div>
                         <!-- col-end -->
                         </form>
                         <div class="register-now no-account">
                            <p> You Have No Account?  <a href="{{route('seller.register')}}"><i data-feather="edit-3"></i> Click To Register</a></p>
                           
                        </div>
                    </div>
                    <!-- seller form -->
                    <div class="seller-img">
                        <img src="{{asset('public/frontEnd/images/seller-login.jpg')}}" alt="">
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
@endpush