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
    <!-- Additional stylesheets or custom styles -->

    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                <a href="" class="btn btn-success mr-2">Buyer</a>
                <a href="" class="btn btn-dark">Seller</a>
            </div>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
          <!-- Vertical Navbar(sidebar) -->
          <nav class="col-md-2 col-lg-2 d-md-block sidebar">
            <div class="position-sticky fixed-top">
                <ul class="navbar-nav">
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
                </ul>
            </div>
          </nav>
        </div>
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS and other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Additional scripts -->
    @yield('additional_scripts')
</body>

</html>
