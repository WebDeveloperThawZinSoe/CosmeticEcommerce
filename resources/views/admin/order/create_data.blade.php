@extends('layouts.admin')

@section('body')
<style>
.product-card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-card .card-img-top {
    width: 150px;
    height: 150px;
    object-fit: contain;
    margin: 0 auto;
}

.product-card .card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
}
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Create Order By Admin</h3>
            <div class="form-group">
                <label for="userSelect">Selected User</label>
                <input type="text" readonly class="form-control" value="{{ $UserData->name }}">
            </div>
            <a href="/admin/order/create/admin" class="btn btn-danger">Reset</a>

            @php $totalPrice = 0; @endphp
           
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Discounted Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    @if(isset($cartItems) && $cartItems->count() > 0)
                    @foreach($cartItems as $item)
                    @php
                    $originalPrice = $item->product_variant->price;
                    $discountAmount = $item->product_variant->discount_amount;
                    $discountType = $item->product_variant->discount_type;

                    $finalPrice = $discountType === 1 ? $originalPrice - $discountAmount : ($discountType === 2 ? $originalPrice * (1 - $discountAmount / 100) : $originalPrice);
                    $subtotal = $finalPrice * $item->qty;
                    $totalPrice += $subtotal;
                    @endphp
                    <tr id="row-{{ $item->id }}" data-price="{{ $finalPrice }}">
                        <td>{{ $item->product_variant->product->name }} ({{ $item->product_variant->attribute_name }} - {{ $item->product_variant->attribute_value }})<br>
                            <img src="{{ asset($item->product_variant->image) }}" style="width:80px;height:80px" class="img-fluid">
                        </td>
                        <td>
                            @if ($originalPrice != $finalPrice)
                            <!-- <del>{{ number_format($originalPrice, 2) }}</del> -->
                            @endif
                            {{ number_format($finalPrice, 2) }} KS
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-secondary me-2 update-qty" data-id="{{ $item->id }}" data-action="decrease">-</button>
                                <input id="quantity-{{ $item->id }}" type="text" value="{{ $item->qty }}" readonly class="form-control" style="width: 50px; text-align: center;">
                                <button class="btn btn-sm btn-secondary ms-2 update-qty" data-id="{{ $item->id }}" data-action="increase">+</button>
                            </div>
                        </td>
                        <td class="item-subtotal">{{ number_format($subtotal, 2) }} KS</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm delete-item" data-id="{{ $item->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            @if(isset($cartItems) )
            <div class="mt-4">
                <h5>Total: <span id="total-price">{{ number_format($totalPrice, 2) }}</span> KS</h5> 
                <hr>
                <form action="{{route('admin.cart.checkout')}}" method="Post">
                    @csrf 
                    <input type="hidden" name="user_id" value="{{ $userId }}">

                    <input type="submit" class="btn btn-success" onclick="return confirm('Are You Sure To CheckOut ?')" value="CheckOut">
                </form>
                <hr>
            </div>
            @endif

            @if(isset($products) && $products->count() > 0)
            <h3 class="mt-4">Available Products</h3>
            <div class="row mt-4">
                @foreach($products as $product)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card product-card">
                        <img class="card-img-top" src="{{ asset($product->image) }}" alt="{{ $product->product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product->name }}</h5>
                            <p class="card-text">
                                <span>({{ $product->attribute_name }} - {{ $product->attribute_value }})</span> <br>
                                <strong>Price:</strong> {{ number_format($product->price, 2) }} KS
                                @if($product->discount_type == 1)
                                <strong>Discount:</strong> {{ $product->discount_amount }} KS
                                @elseif($product->discount_type == 2)
                                <strong>Discount:</strong> {{ $product->discount_amount }}%
                                @endif
                            </p>
                            <form action="{{ route('admin.cart.add') }}" method="POST" class="add-to-cart">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $userId }}">
                                <input type="hidden" name="product_variant_id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="number" name="qty" min="1" value="1" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Function to update total price
    function updateTotalPrice() {
        let totalPrice = 0;
        $('#cart-items tr').each(function() {
            const subtotal = parseFloat($(this).find('.item-subtotal').text());
            if (!isNaN(subtotal)) {
                totalPrice += subtotal;
            }
        });
        $('#total-price').text(totalPrice.toFixed(2));
    }

    // Attach events to dynamically added elements
    function attachEvents() {
        $('.update-qty').off('click').on('click', function(e) {
            e.preventDefault();
            const itemId = $(this).data('id');
            const action = $(this).data('action');

            $.ajax({
                url: `/admin/cart/update/${itemId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    action: action
                },
                success: function(response) {
                    if (response.new_qty) {
                        $(`#quantity-${itemId}`).val(response.new_qty);

                        // Update the subtotal for this row
                        const pricePerItem = parseFloat($(`#row-${itemId}`).data('price'));
                        const newSubtotal = pricePerItem * response.new_qty;
                        $(`#row-${itemId} .item-subtotal`).text(newSubtotal.toFixed(2));

                        // Update the total price
                        updateTotalPrice();
                    }
                },
                error: function(error) {
                    console.error('Error updating quantity:', error);
                }
            });
        });

        $('.delete-item').off('click').on('click', function(e) {
            e.preventDefault();
            const itemId = $(this).data('id');

            $.ajax({
                url: `/admin/cart/remove/${itemId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the deleted row
                        $(`#row-${itemId}`).remove();

                        // Update the total price
                        updateTotalPrice();
                    }
                },
                error: function(error) {
                    console.error('Error deleting item:', error);
                }
            });
        });
    }

    // Handle Add to Cart
    $('.add-to-cart').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    const item = response.cartItem;

                    // Check if table is empty and create structure if needed
                    if ($('#cart-items tr').length === 0) {
                        $('#cart-items').html('');
                    }

                    // Check if item already exists in the cart
                    const existingRow = $(`#row-${item.id}`);
                    if (existingRow.length > 0) {
                        const newQty = item.qty;
                        const newSubtotal = parseFloat(item.subtotal).toFixed(2);

                        existingRow.find(`#quantity-${item.id}`).val(newQty);
                        existingRow.find('.item-subtotal').text(newSubtotal);
                    } else {
                        // Append the new row to the cart
                        $('#cart-items').append(`
                            <tr id="row-${item.id}" data-price="${item.price}">
                                <td>${item.product_name} (${item.attribute_name} - ${item.attribute_value})<br>
                                    <img src="${item.image}" style="width:80px;height:80px" class="img-fluid">
                                </td>
                                <td>
                                    
                                    ${parseFloat(item.price).toFixed(2)} KS
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-secondary me-2 update-qty" data-id="${item.id}" data-action="decrease">-</button>
                                        <input id="quantity-${item.id}" type="text" value="${item.qty}" readonly class="form-control" style="width: 50px; text-align: center;">
                                        <button class="btn btn-sm btn-secondary ms-2 update-qty" data-id="${item.id}" data-action="increase">+</button>
                                    </div>
                                </td>
                                <td class="item-subtotal">${parseFloat(item.subtotal).toFixed(2)} KS</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete-item" data-id="${item.id}">Delete</button>
                                </td>
                            </tr>
                        `);
                    }

                    updateTotalPrice();
                    attachEvents();
                }
            },
            error: function(error) {
                console.error('Error adding item to cart:', error);
            }
        });
    });

    // Attach events to initial elements
    attachEvents();
});
</script>
@endsection
