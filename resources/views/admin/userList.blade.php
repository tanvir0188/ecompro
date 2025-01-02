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
                    <h1 class="no-margin-bottom">User list({{$users->count()}})</h1>

                </div>


            </div>



            <div class="justify-content-center px-2">
                <div class="table-responsive">
                    <table class="table table-dark table-striped w-100">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>User type</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        {{ $user->usertype }}

                                    </td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{url('manageUser/'.$user->id)}}" class="btn btn-primary">Manage</a>
                                        <a href="{{url('deleteUser/'.$user->id)}}" class="btn btn-danger">Delete</a>
                                    </td>

                                    
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 d-flex justify-content-center">{{$users->links()}}</div>
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
