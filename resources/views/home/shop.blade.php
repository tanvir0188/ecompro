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
            <h2>
                Browse products
            </h2>
        </div>
        <div class="row">
            <aside class="col-md-3">

                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Product type</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="card-body">
                                <form method="GET" action="" class="pb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>



                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true"
                                class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Categories </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_2" style="">
                            <div class="card-body">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" checked="" class="custom-control-input">
                                    <div class="custom-control-label">Mercedes
                                        <b class="badge badge-pill badge-light float-right">120</b>
                                    </div>
                                </label>

                            </div> <!-- card-body.// -->
                        </div>
                    </article>



                </div> <!-- card.// -->

            </aside>
        
            
            <section class="shop_section ">
                <div class="container">
                    <div class="row">
                        3 products found
                    </div>

                    
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="box">
                                    <a href="{{ url('product_details', $product->id) }}">
                                        <div class="img-box">
                                            <img src="{{ asset('admintemplate/img/products/' . $product->image) }}"
                                                alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                {{ $product->title }}
                                            </h6>
                                            <h6>
                                                Price
                                                <span>
                                                    {{ $product->price }}৳
                                                </span>
                                            </h6>
                                        </div>
        
        
                                        @auth
                                            <div class="d-flex">
                                                <!-- Cart button first -->
                                                <a class="btn btn-primary" href="{{ url('add_cart/' . $product->id) }}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <!-- Wishlist button at the end -->
                                                <a class="btn btn-secondary ml-auto"
                                                    href="{{ url('add_wishlist/' . $product->id) }}">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        @endauth
        
        
        
                                        <div class="new">
                                            <span>
                                                New
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
        
        
                    </div>
        
                </div>
        </div>
    </div>

    

    <div class="mt-2 d-flex justify-content-center">{{ $products->links() }}</div>

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
