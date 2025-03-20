@php
    $subtotal = Cart::instance('shopping')->subtotal();
    $subtotal = str_replace(',', '', $subtotal);
    $subtotal = str_replace('.00', '', $subtotal);
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $coupon = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
    $discount = Session::get('discount') ? Session::get('discount') : 0;
    $additional_shipping = 0;
    foreach (Cart::instance('shopping')->content() as $item) {
        $additional_shipping += $item->options->additional_shipping;
    }
@endphp
<table class="cart_table table table-bordered table-striped text-center mb-0">
    <thead>
        <tr>
            <th style="width: 20%;">Delete</th>
            <th style="width: 40%;">Product</th>
            <th style="width: 20%;">Amount</th>
            <th style="width: 20%;">Price</th>
        </tr>
    </thead>

    <tbody>
        @foreach (Cart::instance('shopping')->content() as $value)
            <tr>
                <td>
                    <a class="cart_remove" data-id="{{ $value->rowId }}"><i class="fas fa-trash text-danger"></i></a>
                </td>
                <td class="text-left">
                    <a href="{{ route('product', $value->options->slug) }}"> <img
                            src="{{ asset($value->options->image) }}" />
                        {{ Str::limit($value->name, 20) }}</a>
                    @if ($value->options->product_size)
                        <p>Size: {{ $value->options->product_size }}</p>
                    @endif
                    @if ($value->options->product_color)
                        <p>Color: {{ $value->options->product_color }}</p>
                    @endif
                </td>
                <td class="cart_qty">
                    <div class="qty-cart vcart-qty">
                        <div class="quantity">
                            <button class="minus cart_decrement" data-id="{{ $value->rowId }}">-</button>
                            <input type="text" value="{{ $value->qty }}" readonly />
                            <button class="plus cart_increment" data-id="{{ $value->rowId }}">+</button>
                        </div>
                    </div>
                </td>
                <td><span class="alinur">৳ </span><strong>{{ $value->price }}</strong>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-end px-4">Total</th>
            <td class="px-4">
                <span id="net_total"><span class="alinur">৳
                    </span><strong>{{ $subtotal }}</strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="3" class="text-end px-4">Delivery Charge</th>
            <td class="px-4">
                <span id="cart_shipping_cost"><span class="alinur">৳
                    </span><strong>{{ $shipping }}</strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="3" class="text-end px-4">Additional Shipping</th>
            <td class="px-4">
                <span id="cart_shipping_cost"><span>৳
                    </span><strong>{{ $additional_shipping }}</strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="3" class="text-end px-4">Discount</th>
            <td class="px-4">
                <span id="cart_shipping_cost"><span class="alinur">৳
                    </span><strong>{{ $discount + $coupon }}</strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="3" class="text-end px-4">TOTAL</th>
            <td class="px-4">
                <span id="grand_total"><span class="alinur">৳
                    </span><strong>{{ $subtotal + $shipping + $additional_shipping - ($discount + $coupon) }}</strong></span>
            </td>
        </tr>
    </tfoot>
</table>
<form
    action="@if (Session::get('coupon_used')) {{ route('customer.coupon_remove') }} @else {{ route('customer.coupon') }} @endif"
    class="checkout-coupon-form" method="POST">
    @csrf
    <div class="coupon">
        <input type="text" name="coupon_code"
            placeholder=" @if (Session::get('coupon_used')) {{ Session::get('coupon_used') }} @else Apply Coupon @endif"
            class="border-0 shadow-none form-control" />
        <input type="submit" value="@if (Session::get('coupon_used')) remove @else apply @endif "
            class="border-0 shadow-none btn btn-theme" />
    </div>
</form>

<script src="{{ asset('public/frontEnd/js/jquery-3.6.3.min.js') }}"></script>
<!-- cart js start -->
<script>
    $('.cart_store').on('click', function() {
        var id = $(this).data('id');
        var qty = $(this).parent().find('input').val();
        if (id) {
            $.ajax({
                type: "GET",
                data: {
                    'id': id,
                    'qty': qty ? qty : 1
                },
                url: "{{ route('cart.store') }}",
                success: function(data) {
                    if (data) {
                        return cart_count();
                    }
                }
            });
        }
    });

    $('.cart_remove').on('click', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                type: "GET",
                data: {
                    'id': id
                },
                url: "{{ route('cart.remove') }}",
                success: function(data) {
                    if (data) {
                        $(".cartlist").html(data);
                        return cart_count();
                    }
                }
            });
        }
    });

    $('.cart_increment').on('click', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                type: "GET",
                data: {
                    'id': id
                },
                url: "{{ route('cart.increment') }}",
                success: function(data) {
                    if (data) {
                        $(".cartlist").html(data);
                        return cart_count();
                    }
                }
            });
        }
    });

    $('.cart_decrement').on('click', function() {
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                type: "GET",
                data: {
                    'id': id
                },
                url: "{{ route('cart.decrement') }}",
                success: function(data) {
                    if (data) {
                        $(".cartlist").html(data);
                        return cart_count();
                    }
                }
            });
        }
    });

    function cart_count() {
        $.ajax({
            type: "GET",
            url: "{{ route('cart.count') }}",
            success: function(data) {
                if (data) {
                    $("#cart-qty").html(data);
                } else {
                    $("#cart-qty").empty();
                }
            }
        });
    };
</script>
<!-- cart js end -->
