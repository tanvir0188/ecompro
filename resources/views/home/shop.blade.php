<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .pagination .page-link {
            background-color: #87CEEB;
            /* Set button background color */
            color: white;
            /* Text color */
            border: 1px solid #87CEEB;
            /* Optional: Border color to match */
        }

        .pagination .page-link:hover {
            background-color: #4682B4;
            /* Darker shade on hover */
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #4682B4;
            /* Active page button color */
            border-color: #4682B4;
            color: white;
        }

        .icon-control {
            margin-top: 5px;
            float: right;
            font-size: 80%;
        }



        .btn-light {
            background-color: #fff;
            border-color: #e4e4e4;
        }

        .list-menu {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }

        .list-menu a {
            color: #343a40;
        }

        .card-product-grid .info-wrap {
            overflow: hidden;
            padding: 18px 20px;
        }

        [class*='card-product'] a.title {
            color: #212529;
            display: block;
        }

        .card-product-grid:hover .btn-overlay {
            opacity: 1;
        }

        .card-product-grid .btn-overlay {
            -webkit-transition: .5s;
            transition: .5s;
            opacity: 0;
            left: 0;
            bottom: 0;
            color: #fff;
            width: 100%;
            padding: 5px 0;
            text-align: center;
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
        }

        .img-wrap {
            overflow: hidden;
            position: relative;
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
    <!-- end hero area -->

    <!-- shop section -->
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Browse products</h2>
        </div>
        <div class="row">
            <!-- Sidebar for Filters -->
            <aside class="col-md-3">
                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Product type</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1">
                            <div class="card-body">
                                <form method="GET" action="{{ route('home.shop') }}" class="pb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Categories</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_2">
                            <div class="card-body">
                                <form method="GET" action="{{ route('home.shop') }}">
                                    @foreach ($categories as $category)
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                                                class="custom-control-input"
                                                {{ is_array(request('categories')) && in_array($category->id, request('categories')) ? 'checked' : '' }}>
                                            <div class="custom-control-label">{{ $category->category_name }}</div>
                                        </label>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
                                </form>
                            </div>
                        </div>
                    </article>
                </div>
            </aside>
    
            <!-- Main Section for Product Cards -->
            <div class="col-md-9">
                <div class="row d-flex">
                    <div class="">
                        <b>Products found:</b> &nbsp; {{ $products->count() }}
                    </div>
                    
                    
                </div>
                <div class="row">
                    
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="{{ asset('admintemplate/img/products/'. $product->image) }}" alt="Product Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                                    
                                        <div class="badge bg-light text-dark position-absolute top-0 start-0 m-2 px-3 py-1 rounded-pill" style="font-size: 0.8rem;">
                                            New
                                        </div>
                                    
                                </div>
                                <div class="info-wrap">
                                    <a href="{{ url('product_details', $product->id) }}" class="title">{{ $product->title }}</a>
                                    <div class="price mt-2">Price: {{ $product->price }}৳</div>
                                    <div class="d-flex justify-content-between gap-2 mt-3">
                                        <a href="{{ url('add_cart/' . $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="{{ url('add_wishlist/' . $product->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-heart"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    
                <!-- Pagination -->
                
            </div>
        </div>
    </div>
    

    

    <div class="mt-2 d-flex justify-content-center">
        {{ $products->appends(request()->input())->links() }}
    </div>
    

    <!-- end shop section -->




    <!-- contact section -->



    <br><br><br>

    <!-- end contact section -->



    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->


    @include('home.js')

</body>

</html>
