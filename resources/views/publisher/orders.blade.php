@extends('layouts.app')

@section('page-title', "Publisher Dashboard")

@section('custom_css')

<link rel="stylesheet" href="{{ asset('css/btcustom.css') }}">

<link rel="stylesheet" href="{{ asset('css/websiteadd.css') }}">

<link rel="stylesheet" href="{{ asset('css/orders.css') }}">

@endsection('custom_css')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-12 mt-3">
            <div class="col-12 row">
                <div class="col-12">
                    <div class="pb-3 heading mb-4">
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-8">
                                    <h1 class="h1-heading">
                                        Advertiser »
                                        <span class="text-muted"> Order </span>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-2 dashboard_sidebar">
            <style>
                .sidebar-list li a:hover{
                    color: black !important;
                                }
            </style>
            <ul class="sidebar-list">

                <li>
                    <strong>Account Balance</strong>
                    <br>
                    <span style="color:yellow !important;" class="fa-2x text-success">$0</span>
                </li>

                <hr style="background-color: white;">

                <li>
                    <a href="{{ route('publisher.index') }}" class="dashboard" class="orders" style="color: white;">Dashboard</a>
                </li>

                <li>
                    <a href="{{ route('publisher.websites') }}" class="dashboard" style="color: white;">Websites</a>
                </li>

                <hr style="background-color: white;">

                <li>
                    <a href="{{ route('publisher.orders') }}" class="orders" style="color: #0090bf; background: #eff1f1; font-weight: 500;">Orders</a>
                </li>

                <li>
                    <a href="{{ route('publisher.earning') }}" class="orders" style="color: white;">Earning</a>
                </li>

            </ul>
            <a href="{{ route('da-dr-increase-service') }}"><img src="https://www.buysellguestpost.com/assets/images/j.jpg" style="width: 100%;margin-top: 20px;margin-bottom: 20px;" alt=""></a>

            <script>
                $(".sidebar-list .websites").addClass("active");
                $('.sidebar-list .websites').css("color:#0090BF;");
                $(".sidebar-list .dashboard,.sidebar-list .inbox,.sidebar-list .ordesidebar-list .earning").css('color', 'white');
            </script>

        </div>

        <div class="col-md-10" style="padding: 0 0 0 40px">
        	<div class="col-md-12">
        		<a onClick="changeActive('Active')" id="Active" class="btn-filtro-orders Active">Active</a>
        		<a onClick="changeActive('Delivered')" id="Delivered"  class="btn-filtro-orders">Delivered</a>
        		<a onClick="changeActive('Complete')" id="Complete"  class="btn-filtro-orders">Completed</a>
        		<a onClick="changeActive('Cancelled')" id="Cancelled"  class="btn-filtro-orders">Cancelled</a>
        		<a onClick="changeActive('ShowAll')" id="ShowAll"  class="btn-filtro-orders">Show Alls</a>
        	</div>
        	<br>

        	<div class="col-md-12">

        		<table class="table properties-table list-table">
                <tbody>
                    <tr>
                        <th class="my-top-bar" colspan="6">
                            Orders
                        </th>
                    </tr>
                    <tr class="text-muted text-uppercase">
                        <th width="12%">Oder</th>
                        <th width="20%">Guest Post Website</th>
                        <th width="13%">Price</th>
                        <th width="15%">Date</th>
                        <th width="15%">Status</th>
                    </tr>
                </tbody>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->website->name ?? 'Unknown Website' }}</td>
                            <td>${{ number_format($order->price, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <td class="text-center" colspan="6">
                            <a href="#" class="btn-advertiser" style="color: #0068a3; border: 1px solid #ccc; font-weight: 400; padding: .5rem .75rem; font-size: 1rem; line-height: 1.25; border-radius: .25rem;">
                                Load More
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>

        	</div>

        </div>

    </div>
</div>

@endsection('content')

<script>

    function changeActive(id){

        console.log('ChangeActive');

        switch (id) {
            case 'Active':

                document.getElementById("Delivered").classList.remove("Active");
                document.getElementById("Complete").classList.remove("Active");
                document.getElementById("Cancelled").classList.remove("Active");
                document.getElementById("ShowAll").classList.remove("Active");
                document.getElementById("Active").classList.add("Active");

                break;
            case 'Delivered':

                document.getElementById("Complete").classList.remove("Active");
                document.getElementById("Cancelled").classList.remove("Active");
                document.getElementById("ShowAll").classList.remove("Active");
                document.getElementById("Active").classList.remove("Active");
                document.getElementById("Delivered").classList.add("Active");


                break;
            case 'Complete':

                document.getElementById("Cancelled").classList.remove("Active");
                document.getElementById("ShowAll").classList.remove("Active");
                document.getElementById("Active").classList.remove("Active");
                document.getElementById("Delivered").classList.remove("Active");
                document.getElementById("Complete").classList.add("Active");

                break;
            case 'Cancelled':

                document.getElementById("Complete").classList.remove("Active");
                document.getElementById("ShowAll").classList.remove("Active");
                document.getElementById("Active").classList.remove("Active");
                document.getElementById("Delivered").classList.remove("Active");
                document.getElementById("Cancelled").classList.add("Active");

                break;
            case 'ShowAll':

                document.getElementById("Complete").classList.remove("Active");
                document.getElementById("Cancelled").classList.remove("Active");
                document.getElementById("Active").classList.remove("Active");
                document.getElementById("Delivered").classList.remove("Active");
                document.getElementById("ShowAll").classList.add("Active");

                break;
            default:
                break;
        }
    }





</script>
