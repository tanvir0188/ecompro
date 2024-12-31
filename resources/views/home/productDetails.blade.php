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




    <div class="container mt-5">
        <div class="card p-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="preview col-md-6">
                        <!-- Single image instead of tabbed images -->
                        <img style="width:100%;height:auto" src="{{asset('admintemplate/img/products/'.$product->image)}}" alt="Product Image" />
                    </div>
                    <div class="details col-md-6 pl-5 d-flex flex-column justify-content-between">
                        <h3 class="product-title">{{$product->title}}</h3>
                        <p class="product-description">{{$product->description}}</p>
                        <h4 class="price">Price: <span>{{$product->price}}</span></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
    
                        <!-- Quantity field -->
                        <div class="quantity mt-3">
                            <b>Quantity:</b> &nbsp;{{$product->quantity}}
                            
                        </div>
    
                        <!-- Action buttons at the bottom -->
                        <div class="action mt-3">
                            <a class="btn btn-primary" href="{{url('add_cart/'.$product->id)}}"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                            <button class="btn btn-secondary" type="button"><span class="fa fa-heart"></span> Add to Wishlist</button>
                        </div>
                    </div>
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
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
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
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
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
