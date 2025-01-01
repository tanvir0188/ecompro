<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .product-title-link {
            text-decoration: none;
            color: #000; /* Default color for the title */
        }
        .product-title-link:hover {
            color: #87ceeb; /* Hover color */
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
        <h1 class="text-center mb-4">My wishlist</h1>

        <div class="table-responsive">
            @if ($wishlist->count() > 0)
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlist as $item)
                            <tr>
                                <!-- Product Details -->
                                <td class="d-flex align-items-center">
                                    <img width="60" height="60" src="{{ asset('admintemplate/img/products/' . $item->product->image) }}"
                                        class="rounded me-3 border" alt="{{ $item->product->title }}">
                                    <a href="{{ url('product_details/' . $item->product->id) }}" 
                                        class="fw-bold product-title-link">
                                        {{ $item->product->title }}
                                    </a>
                                </td>
                                <!-- Product Price -->
                                <td class="fw-semibold text-success">
                                    {{ number_format($item->product->price, 2) }} Tk
                                </td>
                                <!-- Actions -->
                                <td>
                                    <a href="{{ url('add_cart/' . $item->product->id) }}" class="btn btn-sm btn-primary me-2">
                                        <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                                    </a>
                                    <a href="{{ url('delete_wishlist/' . $item->product->id) }}" 
                                        class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash me-1"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center my-4 text-muted">You have no items in your wishlist</h3>
            @endif
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
