@extends('frontEnd.layouts.master')
@section('title', 'Seller Shop')
@section('content')
    <section class="product-section">
        <div class="container">
            <div class="sorting-section">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="seller_page">
                            <div class="seller_banner">
                                <img src="{{$seller_info->banner}}" alt="">
                                <div class="seller_bio">
                                <img src="{{$seller_info->image}}" alt="">
                                <h5>{{$seller_info->name}}</h5>
                                <p>Total Products : {{$products->total()}}</p>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="category-breadcrumb d-flex align-items-center">
                            <a href="{{ route('home') }}">Home</a>
                            <span>/</span>
                            <strong>Seller</strong>
                            <span>/</span>
                            <strong>{{$seller_info->name}}</strong>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="row">
                            <div class="col-xxl-6">
                                <div class="showing-data">
                                    <span>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of
                                        {{ $products->total() }} Results</span>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="page-sort">
                                     @include('frontEnd.layouts.partials.sort_form')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="category-product">
                        @forelse($products as $key => $value)
                            <div class="product_item wist_item">
                                @include('frontEnd.layouts.partials.product')
                            </div>
                        @empty
                        <div class="no-found">
                            <img src="{{asset('public/frontEnd/images/not-found.png')}}" alt="">
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_paginate">
                        {{ $products->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection