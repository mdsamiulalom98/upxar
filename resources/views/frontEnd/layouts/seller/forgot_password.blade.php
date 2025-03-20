@extends('frontEnd.layouts.master')
@section('title','Forgot Password')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="form-content seller-auth">
                    <div class="seller-form">
                        <p class="auth-title">Forgot Password</p>
                        <form action="{{route('seller.forgot.verify')}}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input class="form-control  @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- form group end -->
                            <div class="text-center d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit"> Submit </button>
                            </div>
                            <!-- social-->
                        </form>
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