@extends('layouts.app')

@section('title', 'Provide Backlink Details')

@section('content')

<section class="cart-section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h2 class="mb-0">Cart - 2 items</h2>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="cart-item-image">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp" class="w-100" alt="Blue Jeans Jacket" />
                                    </div>
                                </div>
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <div class="cart-item-details">
                                        <h5 class="mb-3">Blue denim shirt</h5>
                                        <p>Color: blue</p>
                                        <p>Size: M</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="cart-item-actions">
                                        <div class="quantity">
                                            <button class="minus"><i class="fas fa-minus"></i></button>
                                            <input type="number" class="form-control" value="1">
                                            <button class="plus"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <p class="price">$17.99</p>
                                        <div class="actions">
                                            <button class="btn btn-remove"><i class="fas fa-trash"></i> Remove</button>
                                            <button class="btn btn-wishlist"><i class="fas fa-heart"></i> Move to wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single item -->

                        <hr class="my-4" />

                        <!-- Single item -->
                        <div class="cart-item">
                            <div class="row align-items-center">
                                <div class="col-md-3 mb-4 mb-md-0">
                                    <div class="cart-item-image">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp" class="w-100" alt="Red Hoodie" />
                                    </div>
                                </div>
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <div class="cart-item-details">
                                        <h5 class="mb-3">Red hoodie</h5>
                                        <p>Color: red</p>
                                        <p>Size: M</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="cart-item-actions">
                                        <div class="quantity">
                                            <button class="minus"><i class="fas fa-minus"></i></button>
                                            <input type="number" class="form-control" value="1">
                                            <button class="plus"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <p class="price">$17.99</p>
                                        <div class="actions">
                                            <button class="btn btn-remove"><i class="fas fa-trash"></i> Remove</button>
                                            <button class="btn btn-wishlist"><i class="fas fa-heart"></i> Move to wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single item -->
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.10.2020 - 14.10.2020</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h2 class="mb-0">Summary</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
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

                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection