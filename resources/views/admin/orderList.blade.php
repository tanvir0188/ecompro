<!DOCTYPE html>
<html>

<head>
    @include('admin.css')


    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->



        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 class="no-margin-bottom">Orders</h1>

                </div>


            </div>



            <div class="justify-content-center px-2">
                <div class="table-responsive">
                    <table class="table table-dark table-striped w-100">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>User Name</th>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Change status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->rec_address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>
                                        @if (strcasecmp($order->status, 'in progress') === 0)
                                            <span class="badge badge-pill badge-warning">{{ $order->status }}</span>
                                        @elseif (strcasecmp($order->status, 'on the way') === 0)
                                            <span class="badge badge-pill badge-secondary">{{ $order->status }}</span>
                                        @elseif (strcasecmp($order->status, 'delivered') === 0)
                                            <span class="badge badge-pill badge-success">{{ $order->status }}</span>
                                        @endif

                                    </td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->title }}</td>
                                    <td><img src="{{ asset('admintemplate/img/products/' . $order->product->image) }}"
                                            class="img-fluid" alt="Product Image"
                                            style="max-width: 100px; height: auto;"></td>
                                    <td>{{ $order->product->price }} Tk</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('on_the_way', $order->id) }}">On the
                                            way</a>
                                        <a class="btn btn-success"
                                            href="{{ url('delivered', $order->id) }}">Delivered</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    <!-- Pagination or other content -->
                </div>
            </div>


        </div>




        <footer class="footer">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank"
                            href="https://templateshub.net">Templates Hub</a>.</p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    {{-- <script>
        function confirmation(event) {
            event.preventDefault(); //prevents refreshing
            var urlToRedirect = event.currentTarget.getAttribute('href')

            swal({
                title: "Are you sure you want to delete this product?",
                text: "Once deleted, you will not be able to recover this product!",
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })

            .then((willCancel)=>{
                if(willCancel){
                    window.location.href = urlToRedirect;
                    
                }
            })
        }
    </script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript files-->
    <script src="{{ asset('admintemplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admintemplate/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admintemplate/js/charts-home.js') }}"></script>
    <script src="{{ asset('admintemplate/js/front.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</body>

</html>
