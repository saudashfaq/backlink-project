<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/website_index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/website_create.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/website_app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/website_show.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/website_edit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/splash_screen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/provide-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/add-to-cart.css') }}">
    {{-- <script src="{{asset('assets/css/javascript/main.js')}}"></script> --}}
    
    <!-- Additional stylesheets or custom styles -->

    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top position-sticky">
        <!-- Navbar content -->
        <a class="navbar-brand" href="/">Your App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/websites">Websites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.view_orders_as_seller')}}">View Orders as Sellers</a>
                </li>
            </ul> --}}
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}
              
            <!-- Toggle buttons -->
            <div class="navbar-nav ml-auto">
                <a class="btn btn-outline-success my-2 my-sm-0 mr-2" href="">
                    <i class="fas fa-shopping-cart mr-1"></i>Cart
                  </a>
                <a href="" class="btn btn-success mr-2">Buyer</a>
                <a href="" class="btn btn-dark">Seller</a>
            </div>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Toggle button for sidebar -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main content and sidebar -->
            <div class="d-flex flex-column flex-md-row">

                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-2 col-lg-2 d-md-block collapse">
                    <!-- Sidebar content -->
                    <div class="position-sticky fixed-top">
                        <!-- Dropdown Menu -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i> My assets
                                </a>
                                <div class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                                    <!-- Create New Website Button -->
                                    <a class="dropdown-item create-website-btn" href="{{ route('websites.create') }}">Create New Website</a>
                                    <!-- Other links with bullet point icons -->
                                    <a class="dropdown-item" href="#">Verified publishers</a>
                                    <a class="dropdown-item" href="#">All publishers</a>
                                    <a class="dropdown-item" href="#">Favorite publishers</a>
                                </div>
                            </li>
                            <!-- Home Link -->
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <!-- Other Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="/websites">
                                    <i class="fas fa-globe"></i> Websites
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/orders">
                                    <i class="fas fa-shopping-cart"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders.view_orders_as_seller')}}">
                                    <i class="fas fa-user"></i> View Orders as Sellers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-tasks"></i> Tasks
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-shopping-cart"></i> Content Purchase
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-list"></i> Lists
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-link"></i> Recommended sites
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-wallet"></i> Balance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fas fa-money-bill-wave"></i> Earn
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main content -->
                <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-md-4">

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Additional scripts -->
    @yield('additional_scripts')

    <script>
        // Script to toggle sidebar
        $(document).ready(function() {
            // Toggle sidebar on smaller screens
            $('.navbar-toggler').click(function() {
                $('#sidebar').toggleClass('show');
            });
        });
    </script>
    
</body>

</html>
