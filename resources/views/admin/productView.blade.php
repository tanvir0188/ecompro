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
                    <h1 class="no-margin-bottom">Product</h1>
                                       
                </div>

                
            </div>
            
                
            
            <div class="container">
                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-success">
                </form>
                
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                        
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td><img src="{{asset('admintemplate/img/products/'. $product->image)}}" alt="image" width="100" height="100"></td>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->description, 30)!!}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{url('edit_product',$product->id)}}">Edit</a>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $product->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                     
                
                    
                </table>
                <div class="mt-2 d-flex justify-content-center">{{$products->links()}}</div>
                
                
                
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
    <script>
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
    </script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
