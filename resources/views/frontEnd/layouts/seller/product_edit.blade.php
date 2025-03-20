@extends('frontEnd.layouts.seller.master')
@section('title', 'Product Edit')
@push('css')
    <style>
        .increment_btn,
        .remove_btn,
        .btn-warning {
            margin-top: -17px;
            margin-bottom: 10px;
        }
    </style>
    <link href="{{ asset('public/backEnd') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backEnd') }}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet"
        type="text/css" />
@endpush
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('seller.products.index') }}" class="btn btn-primary rounded-pill">Manage</a>
                    </div>
                    <h4 class="page-title">Product Edit</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('seller.products.update') }}" method="POST" class="row"
                            data-parsley-validate="" enctype="multipart/form-data" name="editForm">
                            @csrf
                            <input type="hidden" value="{{ $edit_data->id }}" name="id" />
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Product Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $edit_data->name }}" id="name" required="" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('up_size') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Categories *</label>
                                    <select
                                        class="form-control form-select select2 @error('category_id') is-invalid @enderror"
                                        name="category_id" value="{{ old('category_id') }}" required>
                                        <optgroup>
                                            <option value="">Select..</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($edit_data->category_id == $category->id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pro_barcode') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="form-label">Sub Categories </label>
                                    <select
                                        class="form-control form-select select2-multiple @error('subcategory_id') is-invalid @enderror"
                                        id="subcategory_id" name="subcategory_id" data-placeholder="Choose ...">
                                        <optgroup>
                                            <option value="">Select..</option>
                                            @foreach ($subcategory as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('childcategory_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="childcategory_id" class="form-label">Child Categories </label>
                                    <select
                                        class="form-control form-select select2-multiple @error('childcategory_id') is-invalid @enderror"
                                        id="childcategory_id" name="childcategory_id" data-placeholder="Choose ...">
                                        <optgroup>
                                            <option value="">Select..</option>
                                            @foreach ($childcategory as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('childcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('up_color') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="brand_id" class="form-label">Brands</label>
                                    <select class="form-control select2 @error('brand_id') is-invalid @enderror"
                                        value="{{ old('brand_id') }}" name="brand_id">
                                        <option value="">Select..</option>
                                        @foreach ($brands as $value)
                                            <option value="{{ $value->id }}"
                                                @if ($edit_data->brand_id == $value->id) selected @endif>{{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="pro_video" class="form-label">Product Video </label>
                                    <input type="text" class="form-control @error('pro_video') is-invalid @enderror"
                                        name="pro_video" value="{{ $edit_data->pro_video }}" id="pro_video" />
                                    @error('pro_video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <label for="made_in" class="form-label">Made In</label>
                                    <input type="text" class="form-control @error('made_in') is-invalid @enderror"
                                        name="made_in" value="{{ $edit_data->made_in }}" id="made_in" />
                                    @error('made_in')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <label for="pack_size" class="form-label">Pack Size </label>
                                    <input type="text" class="form-control @error('pack_size') is-invalid @enderror"
                                        name="pack_size" value="{{ $edit_data->pack_size }}" id="pack_size" />
                                    @error('pack_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Gender </label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        value="{{ old('gender') }}" id="gender">
                                        <option value="male" {{ $edit_data->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="male" {{ $edit_data->gender == 'female' ? 'selected' : '' }}>
                                            Female</option>
                                        <option value="others" {{ $edit_data->gender == 'others' ? 'selected' : '' }}>
                                            Others</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-3">
                                <div class="form-group mb-3">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                        name="weight" value="{{ $edit_data->weight }}" id="weight" />
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="image">Product Image (ctrl to multiple) *</label>
                                    <div class="input-group control-group increment">
                                        <input type="file" name="image[]" multiple
                                            class="form-control @error('image') is-invalid @enderror" />
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="product_img">
                                    @foreach ($edit_data->images as $image)
                                        <img src="{{ asset($image->image) }}" class="edit-image border"
                                            alt="" />
                                        <a href="{{ route('seller.products.image.destroy', ['id' => $image->id]) }}"
                                            class="btn btn-xs btn-danger waves-effect waves-light"><i
                                                class="mdi mdi-close"></i></a>
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="pro_barcode" class="form-label">Product Barcode </label>
                                    <input type="text"
                                        class="barcode form-control @error('stock') is-invalid @enderror"
                                        name="pro_barcode" value="{{ old('pro_barcode') }}" id="pro_barcode">
                                    @error('pro_barcode[]')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="type" class="form-label">Product Type</label>
                                    <select class="form-control select2 @error('type') is-invalid @enderror" disabled
                                        value="{{ old('type') }}" id="product_type" name="type">
                                        <option value="1" @if ($edit_data->type == 1) selected @endif>Normal
                                            Product</option>
                                        <option value="0" @if ($edit_data->type == 0) selected @endif>Variable
                                            Product</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- col-end -->

                            @if ($edit_data->type == 0)
                                <div class="variable_product">
                                    <!-- variable edit part -->
                                    @foreach ($variables as $variable)
                                        <input type="hidden" value="{{ $variable->id }}" name="up_id[]">
                                        <div class="row mb-2">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_size" class="form-label">Size/Weight</label>
                                                    <select class="form-control" name="up_sizes[]">
                                                        <option value="">Select</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->name }}"
                                                                @if ($variable->size == $size->name) selected @endif>
                                                                {{ $size->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('up_size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--col end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_color" class="form-label">Color </label>
                                                    <select class="form-control" name="up_colors[]">
                                                        <option value="">Select</option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->name }}"
                                                                @if ($variable->color == $color->name) selected @endif>
                                                                {{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('up_color')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--col end -->

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_purchase_prices" class="form-label">Purchase Price
                                                        *</label>
                                                    <input type="text"
                                                        class="form-control @error('up_purchase_prices') is-invalid @enderror"
                                                        name="up_purchase_prices[]"
                                                        value="{{ $variable->purchase_price }}"
                                                        id="up_purchase_prices" />
                                                    @error('purchase_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_old_prices" class="form-label">Old Price</label>
                                                    <input type="text"
                                                        class="form-control @error('up_old_prices') is-invalid @enderror"
                                                        name="up_old_prices[]" value="{{ $variable->old_price }}"
                                                        id="up_old_prices" />
                                                    @error('old_prices')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_new_prices" class="form-label">New Price *</label>
                                                    <input type="text"
                                                        class="form-control @error('up_new_prices') is-invalid @enderror"
                                                        name="up_new_prices[]" value="{{ $variable->new_price }}"
                                                        id="up_new_prices" />
                                                    @error('up_new_prices')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="up_stocks" class="form-label">Stock *</label>
                                                    <input type="text" class="form-control" name="up_stocks[]"
                                                        value="{{ $variable->stock }}">
                                                    @error('up_stocks')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="up_images">Color Image </label>
                                                    <div class="input-group control-group">
                                                        <input type="file" name="up_images[]"
                                                            class="form-control @error('up_images') is-invalid @enderror" />
                                                        <div class="input-group-btn">
                                                        </div>
                                                        @error('images[]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @if ($variable->image)
                                                    <img src="{{ asset($variable->image) }}"
                                                        class="edit-image border mt-1">
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="pro_barcodes" class="form-label">Product Barcode </label>
                                                    <input type="text"
                                                        class="form-control @error('stock') is-invalid @enderror"
                                                        name="pro_barcodes[]" value="{{ old('pro_barcodes') }}"
                                                        id="pro_barcodes">
                                                    @error('pro_barcodes[]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- col end -->
                                            <div class="input-group-btn">
                                                <a href="{{ route('seller.products.price.destroy', ['id' => $variable->id]) }}"
                                                    class="btn btn-danger btn-xs text-white"
                                                    onclick="return confirm('Are you want delete this?')"
                                                    type="button"><i class="mdi mdi-close"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--edit variable product  end-->

                                    <!-- new variable add-->
                                    <div class="row mt-3">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="roles" class="form-label">Size/Weight *</label>
                                                <select class="form-control" name="sizes[]">
                                                    <option value="">Select</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->name }}">{{ $size->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sizes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--col end -->
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="color" class="form-label">Color </label>
                                                <select class="form-control" name="colors[]">
                                                    <option value="">Select</option>
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->name }}">{{ $color->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--col end -->

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="purchase_prices" class="form-label">Purchase Price *</label>
                                                <input type="text"
                                                    class="form-control @error('purchase_prices') is-invalid @enderror"
                                                    name="purchase_prices[]" value="{{ old('purchase_prices') }}"
                                                    id="purchase_prices" />
                                                @error('purchase_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <!-- col-end -->
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="old_prices" class="form-label">Old Price</label>
                                                <input type="text"
                                                    class="form-control @error('old_prices') is-invalid @enderror"
                                                    name="old_prices[]" value="{{ old('old_prices') }}"
                                                    id="old_prices" />
                                                @error('old_prices')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="new_prices" class="form-label">New Price *</label>
                                                <input type="text"
                                                    class="form-control @error('new_prices') is-invalid @enderror"
                                                    name="new_prices[]" value="{{ old('new_prices') }}"
                                                    id="new_prices" />
                                                @error('new_prices')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="stocks" class="form-label">Stock *</label>
                                                <input type="text" class="form-control" name="stocks[]">
                                                @error('stocks')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <div class="form-group">
                                                <label for="images">Color Image </label>
                                                <div class="input-group control-group">
                                                    <input type="file" name="images[]"
                                                        class="form-control @error('images') is-invalid @enderror" />
                                                    <div class="input-group-btn">
                                                    </div>
                                                    @error('images[]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- col end -->

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="pro_barcodes" class="form-label">Product Barcode </label>
                                                <input type="text" class="form-control" name="pro_barcodes[]">
                                                @error('pro_barcodes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col end -->
                                        <div class="input-group-btn mt-2">
                                            <button class="btn btn-success increment_btn  btn-xs text-white"
                                                type="button"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="clone_variable" style="display:none">
                                        <div class="row increment_control">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="roles" class="form-label">Size/Weight</label>
                                                    <select class="form-control" name="sizes[]">
                                                        <option value="">Select</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->name }}">{{ $size->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--col end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="color" class="form-label">Color </label>
                                                    <select class="form-control " name="colors[]">
                                                        <option value="">Select</option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->name }}">
                                                                {{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--col end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="purchase_prices" class="form-label">Purchase Price
                                                        *</label>
                                                    <input type="text"
                                                        class="form-control @error('purchase_prices') is-invalid @enderror"
                                                        name="purchase_prices[]" value="{{ old('purchase_prices') }}"
                                                        id="purchase_prices" />
                                                    @error('purchase_prices')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="old_prices" class="form-label">Old Price</label>
                                                    <input type="text"
                                                        class="form-control @error('old_prices') is-invalid @enderror"
                                                        name="old_prices[]" value="{{ old('old_prices') }}"
                                                        id="old_prices" />
                                                    @error('old_prices')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="new_prices" class="form-label">New Price *</label>
                                                    <input type="text"
                                                        class="form-control @error('new_prices') is-invalid @enderror"
                                                        name="new_prices[]" value="{{ old('new_prices') }}"
                                                        id="new_prices" />
                                                    @error('new_prices')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col-end -->
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="stocks" class="form-label">Stock *</label>
                                                    <input type="text"
                                                        class="form-control @error('stock') is-invalid @enderror"
                                                        name="stocks[]" value="{{ old('stocks') }}" id="stocks">
                                                    @error('stocks[]')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-8 ">
                                                <div class="form-group">
                                                    <label for="images">Color Image </label>
                                                    <div class="input-group control-group">
                                                        <input type="file" name="images[]"
                                                            class="form-control @error('images') is-invalid @enderror" />
                                                        <div class="input-group-btn">
                                                        </div>
                                                        @error('images[]')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end -->
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="pro_barcodes" class="form-label">Product Barcode</label>
                                                    <input type="text" class="form-control" name="pro_barcodes[]">
                                                    @error('pro_barcodes')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- col end -->
                                            <div class="input-group-btn mt-2">
                                                <button class="btn btn-danger remove_btn  btn-xs text-white"
                                                    type="button"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="normal_product">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">
                                                <label for="purchase_price" class="form-label">Purchase Price *</label>
                                                <input type="text"
                                                    class="form-control @error('purchase_price') is-invalid @enderror"
                                                    name="purchase_price" value="{{ $edit_data->purchase_price }}"
                                                    id="purchase_price" />
                                                @error('purchase_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <!-- col-end -->
                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">
                                                <label for="old_price" class="form-label">Old Price</label>
                                                <input type="text"
                                                    class="form-control @error('old_price') is-invalid @enderror"
                                                    name="old_price" value="{{ $edit_data->old_price }}"
                                                    id="old_price" />
                                                @error('old_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">
                                                <label for="new_price" class="form-label">New Price *</label>
                                                <input type="text"
                                                    class="form-control @error('new_price') is-invalid @enderror"
                                                    name="new_price" value="{{ $edit_data->new_price }}"
                                                    id="new_price" />
                                                @error('new_price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->

                                        <div class="col-sm-3">
                                            <div class="form-group mb-3">
                                                <label for="stock" class="form-label">Stock *</label>
                                                <input type="text"
                                                    class="form-control @error('stock') is-invalid @enderror"
                                                    name="stock" value="{{ $edit_data->stock }}" id="stock" />
                                                @error('stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                    </div>
                                </div>
                                <!-- normal product end -->
                            @endif
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea name="description" rows="6"
                                        class="summernote form-control @error('description') is-invalid @enderror" required>{{ $edit_data->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="stock_alert" class="form-label">Stock Alert </label>
                                    <input type="text" class="form-control @error('stock_alert') is-invalid @enderror"
                                        name="stock_alert" value="{{ $edit_data->stock_alert }}" id="stock_alert" />
                                    @error('stock_alert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-8">
                                <div class="form-group mb-3">
                                    <label for="meta_title" class="form-label">Meta Title (SEO)</label>
                                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                        name="meta_title" value="{{ $edit_data->meta_title }}" id="meta_title" />
                                    @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="meta_description" class="form-label">Meta Description (SEO)</label>
                                    <textarea name="meta_description" rows="6"
                                        class="summernote form-control @error('meta_description') is-invalid @enderror">{{ $edit_data->meta_description }}</textarea>
                                    @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label for="meta_keyword" class="form-label">Meta Keyword (SEO)</label>
                                    <textarea name="meta_keyword" rows="6"
                                        class="summernote form-control @error('meta_keyword') is-invalid @enderror">{{ $edit_data->meta_keyword }}</textarea>
                                    @error('meta_keyword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <!-- col end -->
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="status" class="d-block">Status</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="status"
                                            @if ($edit_data->status == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="topsale" class="d-block">Best Deals</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="topsale"
                                            @if ($edit_data->topsale == 1) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                    @error('topsale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->


                            <!-- col end -->

                            <div>
                                <input type="submit" class="btn btn-success" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('public/backEnd/') }}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-advanced.init.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/backEnd/') }}/assets/libs//summernote/summernote-lite.min.js"></script>
    <script>
        $(".summernote").summernote({
            placeholder: "Enter Your Text Here",
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#product_type').change(function() {
                var id = $(this).val();
                if (id == 1) {
                    $('.normal_product').show();
                    $('.variable_product').hide();
                } else {
                    $('.variable_product').show();
                    $('.normal_product').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var serialNumber = 1;
            $(".increment_btn").click(function() {
                var html = $(".clone_variable").html();
                var newHtml = html.replace(/stock\[\]/g, "stock[" + serialNumber + "]");
                $(".variable_product").after(newHtml);
                serialNumber++;
            });
            $("body").on("click", ".remove_btn", function() {
                $(this).parents(".increment_control").remove();
                serialNumber--;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });

        // category to sub
        $("#category_id").on("change", function() {
            var ajaxId = $(this).val();
            if (ajaxId) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('ajax-product-subcategory') }}?category_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#subcategory_id").empty();
                            $("#subcategory_id").append('<option value="0">Choose...</option>');
                            $.each(res, function(key, value) {
                                $("#subcategory_id").append('<option value="' + key + '">' +
                                    value + "</option>");
                            });
                        } else {
                            $("#subcategory_id").empty();
                        }
                    },
                });
            } else {
                $("#subcategory_id").empty();
            }
        });

        // subcategory to childcategory
        $("#subcategory_id").on("change", function() {
            var ajaxId = $(this).val();
            if (ajaxId) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('ajax-product-childcategory') }}?subcategory_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#childcategory_id").empty();
                            $("#childcategory_id").append('<option value="0">Choose...</option>');
                            $.each(res, function(key, value) {
                                $("#childcategory_id").append('<option value="' + key + '">' +
                                    value + "</option>");
                            });
                        } else {
                            $("#childcategory_id").empty();
                        }
                    },
                });
            } else {
                $("#childcategory_id").empty();
            }
        });
    </script>
    <script type="text/javascript">
        document.forms["editForm"].elements["category_id"].value = "{{ $edit_data->category_id }}";
        document.forms["editForm"].elements["subcategory_id"].value = "{{ $edit_data->subcategory_id }}";
        document.forms["editForm"].elements["childcategory_id"].value = "{{ $edit_data->childcategory_id }}";
    </script>
@endpush
