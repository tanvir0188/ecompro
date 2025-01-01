<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .pagination .page-link {
            background-color: #87CEEB; /* Set button background color */
            color: white; /* Text color */
            border: 1px solid #87CEEB; /* Optional: Border color to match */
        }
    
        .pagination .page-link:hover {
            background-color: #4682B4; /* Darker shade on hover */
            color: white;
        }
    
        .pagination .page-item.active .page-link {
            background-color: #4682B4; /* Active page button color */
            border-color: #4682B4;
            color: white;
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

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Products
                </h2>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ url('product_details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('admintemplate/img/products/' . $product->image) }}" alt="">
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
                                        <a class="btn btn-secondary ml-auto" href="{{ url('add_wishlist/' . $product->id) }}">
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
    </section>
    
    <div class="mt-2 d-flex justify-content-center">{{$products->links()}}</div>

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
