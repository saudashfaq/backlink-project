@extends('layouts.app')

@section('title', 'Provide Backlink Details')

@section('content')
@if($cartItems->count() > 0)
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">{{$cartItems->count()}} item</h5>
                    </div>
                    <div class="card-body">
                        <!-- Master checkbox -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="selectAll" onclick="toggleSelectAll()">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>

                        <!-- Table for all items -->
                        <table>
                            @foreach($cartItems as $item)
                            <!-- Item 1 -->
                            <tr>
                                <td>
                                    <!-- Item checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input item-checkbox" type="checkbox" value="" id="item1">
                                    </div>
                                </td>
                                <td>
                                    <!-- Image -->
                                    {{-- <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                        data-mdb-ripple-color="light">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp"
                                            class="w-50" alt="Blue Jeans Jacket" />
                                        <a href="#!">
                                            <div class="mask"
                                                style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div> --}}
                                    <!-- Image -->
                                </td>
                                <td>
                                    <!-- Data -->
                                    <p><strong>{{$item->name}}</strong></p>
                                    <p>Details:</p>
                                    <p>Status: A</p>
                                    <form action="{{ route('cart.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                        <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-button-init data-mdb-ripple-init data-mdb-tooltip-init title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init
                                        title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <!-- Data -->
                                </td>
                                <td>
                                    <!-- Quantity -->
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                        <table>
                                            <tr>
                                                <td>
                                                    <button type="button" class="stepDown btn btn-primary px-3 me-2 mt-4" onclick="updateQuantity(this, -1)">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <div class="form-outline">
                                                      <label class="form-label" for="form1">Quantity</label>
                                                        <input id="form1" min="1" name="quantity" value="{{$item->qty}}" type="number" class="form-control" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="stepUp btn btn-primary px-3 ms-2 mt-4" onclick="updateQuantity(this, 1)">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    <!-- Quantity -->
                                </td>
                                <td>
                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>${{ $item->price * $item->qty }}</strong>
                                    </p>
                                    <!-- Price -->
                                </td>
                            </tr>
                            <!-- Item 1 -->
                            <tr>
                                <td colspan="5"><hr class="my-4"></td>
                            </tr>
                            @endforeach
                        </table>
                        <!-- Table for all items -->
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa" />
                        <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express" />
                        <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" />
                        <img class="me-2" width="45px" src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" alt="PayPal acceptance mark" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Digital</span>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including tax)</p>
                                    </strong>
                                </div>
                                <span><strong>${{Cart::instance('cart')->subtotal()}}</strong></span>
                            </li>
                        </ul>

                        <a href="" type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
<div class="row justify-content-center">
    <div class="col-md-12 text-center">
        <h2>Your cart is empty!</h2>
        <a href="{{route('websites.index')}}" class="btn btn-warning">Add to cart now</a>
    </div>
</div>
@endif
</section>

<script>
    function toggleSelectAll() {
        var selectAllCheckbox = document.getElementById('selectAll');
        var itemCheckboxes = document.querySelectorAll('.item-checkbox');
        
        itemCheckboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }

    function updateQuantity(button, change) {
    // Find the input field for quantity in the closest form
    var input = button.closest('form').querySelector('input[name="quantity"]');
    
    // Calculate the new value by adding the change to the current quantity
    var newValue = parseInt(input.value) + change;

    // Ensure the quantity is at least 1
    if (newValue < 1) {
        newValue = 1;
    }

    // Update the input field with the new quantity
    input.value = newValue;

    // Submit the form to update the quantity on the server
    button.closest('form').submit();
}

</script>

@endsection
