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
        <div class="btn-box">
            <a href="{{url('shop')}}">
                View All Products
            </a>
        </div>
    </div>
</section>
