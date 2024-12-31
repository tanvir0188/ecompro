<!DOCTYPE html>
<html>

<head>
    @include('home.css')

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



    <!-- end shop section -->





        <!-- shop section -->
        <div class="container my-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-details">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-long-arrow-left"></i>
                            <span class="ml-2">Continue Shopping</span>
                        </div>
                        <hr>
                        <h6 class="mb-4">Shopping Cart</h6>
                        <div class="d-flex justify-content-between mb-3">
                            <span>You have <b>{{$cart_count}} </b> items in your cart</span>
                            <div class="d-flex align-items-center">
                                <span class="text-black-50">Sort by:</span>
                                <div class="price ml-2">
                                    <span class="mr-1">Price</span><i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
    
                        @foreach ($cart as $cartItem)
                        <div class="d-flex justify-content-between align-items-center mt-3 p-3 border rounded">
                            <div class="d-flex flex-row">
                                <img class="rounded" src="{{asset('admintemplate/img/products/'.$cartItem->product->image)}}" width="50" alt="product image">
                                <div class="ml-3">
                                    <span class="font-weight-bold d-block">{{ $cartItem->product->title }}</span>
                                    <span class="spec text-muted">{!! Str::limit($cartItem->product->description, 15) !!}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="d-block mr-4">2</span>
                                <span class="d-block mr-3 font-weight-bold">{{ $cartItem->product->price }} Tk</span>
                                <a class="btn-sm btn-danger" href="{{url('delete_cart/'.$cartItem->id)}}"><i class="fa fa-trash-o text-white-70"></i></a>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>




    <!-- end contact section -->



    <!-- info section -->

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
