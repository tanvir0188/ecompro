<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .product-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.9em;
            padding: 0.5em 0.75em;
        }

        .navbar-brand img {
            margin-right: 8px;
        }

        .table-responsive {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .btn-outline-primary:hover {
            transform: translateY(-1px);
            transition: transform 0.2s;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->



        <!-- end slider section -->
    </div>
    <div class="container my-5">
        <h1 class="text-center mb-4">Orders</h1>

        <h2 class="text-start mb-4">Pending Orders</h2>
        <div class="table-responsive">
            @if ($pendingOrders->count() > 0)
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>

                            <th>Product</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>See progress</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pendingOrders as $order)
                            <tr>

                                <td>
                                    <img src="{{ asset('admintemplate/img/products/' . $order->product->image) }}"
                                        class="product-img me-2" alt="TV">
                                    {{ $order->product->title }}
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if (strcasecmp($order->status, 'in progress') === 0)
                                        <span class="badge badge-pill badge-warning">{{ $order->status }}</span>
                                    @elseif (strcasecmp($order->status, 'on the way') === 0)
                                        <span class="badge badge-pill badge-secondary">{{ $order->status }}</span>
                                    @elseif (strcasecmp($order->status, 'delivered') === 0)
                                        <span class="badge badge-pill badge-success">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->product->price }} Tk</td>
                                <td><button class="btn btn-sm btn-outline-primary">Track order</button></td>
                            </tr>
                        @endforeach





                    </tbody>
                </table>
            @else
                <h3 class="text-center mb-4">No pending orders</h3>
            @endif
        </div>

        <br>
        <h2 class="text-start mb-4">Previous Orders</h2>
        <div class="table-responsive">
            @if ($previousOrders->count() > 0)

                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>

                            <th>Product</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>See progress</th>
                            <th>Detail</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($previousOrders as $order)
                            <tr>

                                <td>
                                    <img src="{{ asset('admintemplate/img/products/' . $order->product->image) }}"
                                        class="product-img me-2" alt="TV">
                                    {{ $order->product->title }}
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    @if (strcasecmp($order->status, 'in progress') === 0)
                                        <span class="badge badge-pill badge-warning">{{ $order->status }}</span>
                                    @elseif (strcasecmp($order->status, 'on the way') === 0)
                                        <span class="badge badge-pill badge-secondary">{{ $order->status }}</span>
                                    @elseif (strcasecmp($order->status, 'delivered') === 0)
                                        <span class="badge badge-pill badge-success">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->product->price }} Tk</td>
                                <td><button class="btn btn-sm btn-outline-primary">View Details</button></td>
                            </tr>
                        @endforeach





                    </tbody>
                </table>
            @else
                <h3 class="text-center mb-4">No previous orders</h3>
            @endif
        </div>
    </div>

    <section class="info_section  layout_padding2-top mt-5">
        <div class="social_container">
            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Gb road 123 london Uk </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+01 12345678901</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section -->
        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Web Tech Knowledge</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>

    <!-- end info section -->


    @include('home.js')

</body>

</html>
