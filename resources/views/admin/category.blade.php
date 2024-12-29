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
                    <h1 class="no-margin-bottom">Category</h1>
                    <div class="d-flex justify-content-center mt-4">
                        <form action="{{url('add_category')}}" method="post" class="d-flex ">
                            @csrf
                            <div class="form-group me-2 mr-2">
                                <input 
                                    type="text" 
                                    name="category" 
                                    class="form-control" 
                                    placeholder="Enter category name"
                                    required
                                >
                            </div>
                            <div>
                                <input class="btn btn-primary" type="submit" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
            
                
            
            <div class="container">
                @if ($categories->isNotEmpty())
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Created At</th>
                        <th>Name</th>
                        <th>Action</th>
                        
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($category->created_at)->format('d M, Y')}}</td>
                            <td>{{$category->category_name}}</td>
                            <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $category->id)}}">Delete</a></td>
                        </tr>
                    @endforeach
                    
                </table>
                @endif
                
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
                title: "Are you sure you want to delete this category?",
                text: "Once deleted, you will not be able to recover this category!",
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


</body>

</html>
