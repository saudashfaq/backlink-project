@extends('layouts.app')

@section('title', 'Provide Backlink Details')

@section('content')

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - 2 items</h5>
                    </div>
                    <div class="card-body">
                        <!-- Master checkbox -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="selectAll" onclick="toggleSelectAll()">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>

                        <!-- Item 1 -->
                        <table>
                            <tr>
                                <td>
                                    <!-- Item checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input item-checkbox" type="checkbox" value="" id="item1">
                                    </div>
                                </td>
                                <td>
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                        data-mdb-ripple-color="light">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp"
                                            class="w-50" alt="Blue Jeans Jacket" />
                                        <a href="#!">
                                            <div class="mask"
                                                style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </td>
                                <td>
                                    <!-- Data -->
                                    <p><strong>https://gotopetsshop.com</strong></p>
                                    <p>Details:</p>
                                    <p>Status: A</p>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-sm me-1 mb-2" data-mdb-tooltip-init
                                        title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init
                                        title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <!-- Data -->
                                </td>
                                <td>
                                    <!-- Quantity -->
                                    <table>
                                        <tr>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 me-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <div data-mdb-input-init class="form-outline">
                                                  <label class="form-label" for="form1">Quantity</label>
                                                    <input id="form1" min="1" name="quantity" value="1" type="number"
                                                        class="form-control" />
                                                </div>
                                            </td>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 ms-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Quantity -->
                                </td>
                                <td>
                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>$17.99</strong>
                                    </p>
                                    <!-- Price -->
                                </td>
                            </tr>
                        </table>
                        <!-- Item 1 -->

                        <hr class="my-4" />

                        <!-- Item 2 -->
                        <table>
                            <tr>
                                <td>
                                    <!-- Item checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input item-checkbox" type="checkbox" value="" id="item2">
                                    </div>
                                </td>
                                <td>
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                        data-mdb-ripple-color="light">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp"
                                            class="w-50" />
                                        <a href="#!">
                                            <div class="mask"
                                                style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </td>
                                <td>
                                    <!-- Data -->
                                    <p><strong>https://gotopetsshop.com</strong></p>
                                    <p>Details:</p>
                                    <p>Status: A</p>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-sm me-1 mb-2" data-mdb-tooltip-init
                                        title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init
                                        title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <!-- Data -->
                                </td>
                                <td>
                                    <!-- Quantity -->
                                    <table>
                                        <tr>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 me-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <div data-mdb-input-init class="form-outline">
                                                  <label class="form-label" for="form2">Quantity</label>
                                                    <input id="form2" min="1" name="quantity" value="1" type="number"
                                                        class="form-control" />
                                                </div>
                                            </td>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 ms-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Quantity -->
                                </td>
                                <td>
                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>$17.99</strong>
                                    </p>
                                    <!-- Price -->
                                </td>
                            </tr>
                        </table>
                        <hr class="my-4" />

                        <!-- Item 3 -->
                        <table>
                            <tr>
                                <td>
                                    <!-- Item checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input item-checkbox" type="checkbox" value="" id="item3">
                                    </div>
                                </td>
                                <td>
                                    <!-- Image -->
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                        data-mdb-ripple-color="light">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp"
                                            class="w-50" />
                                        <a href="#!">
                                            <div class="mask"
                                                style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                    <!-- Image -->
                                </td>
                                <td>
                                    <!-- Data -->
                                    <p><strong>https://gotopetsshop.com</strong></p>
                                    <p>Details:</p>
                                    <p>Status: A</p>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-primary btn-sm me-1 mb-2" data-mdb-tooltip-init
                                        title="Remove item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-danger btn-sm mb-2" data-mdb-tooltip-init
                                        title="Move to the wish list">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                    <!-- Data -->
                                </td>
                                <td>
                                    <!-- Quantity -->
                                    <table>
                                        <tr>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 me-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <div data-mdb-input-init class="form-outline">
                                                  <label class="form-label" for="form3">Quantity</label>
                                                    <input id="form3" min="1" name="quantity" value="1" type="number"
                                                        class="form-control" />
                                                </div>
                                            </td>
                                            <td>
                                                <button data-mdb-button-init data-mdb-ripple-init
                                                    class="btn btn-primary px-3 ms-2 mt-4"
                                                    onclick="this.parentNode.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Quantity -->
                                </td>
                                <td>
                                    <!-- Price -->
                                    <p class="text-start text-md-center">
                                        <strong>$17.99</strong>
                                    </p>
                                    <!-- Price -->
                                </td>
                            </tr>
                        </table>
                        <!-- Item 3 -->
                    </div>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.10.2020 - 14.10.2020</p>
                    </div>
                </div> --}}
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>
                        <img class="me-2" width="45px"
                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                            alt="Visa" />
                        <img class="me-2" width="45px"
                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                            alt="American Express" />
                        <img class="me-2" width="45px"
                            src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                            alt="Mastercard" />
                        <img class="me-2" width="45px"
                            src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg"
                            alt="PayPal acceptance mark" />
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
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Digital</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>

                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleSelectAll() {
        var selectAllCheckbox = document.getElementById('selectAll');
        var itemCheckboxes = document.querySelectorAll('.item-checkbox');
        
        itemCheckboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
</script>

@endsection
