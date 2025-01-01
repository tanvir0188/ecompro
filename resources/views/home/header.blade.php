<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
            <span>
                Giftos
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('shop') }}">
                        Shop
                    </a>
                </li>
                <li class="nav-item {{ Request::is('why') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('why') }}">
                        Why Us
                    </a>
                </li>
                <li class="nav-item {{ Request::is('testimonial') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('testimonial') }}">
                        Testimonial
                    </a>
                </li>
                @auth
                <li class="nav-item {{ Request::is('view_cart') ? 'active' : '' }}">
                    <a href="{{ url('view_cart') }}" class="nav-link">
                        Cart
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        @if ($cart_count)
                        <sup>{{ $cart_count }}</sup>
                        @endif
                    </a>
                </li>
                <li class="nav-item {{ Request::is('wishlist') ? 'active' : '' }}">
                    <a href="{{ url('wishlist') }}" class="nav-link" >
                        
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        
                        @if ($wishlist_items)
                        <sup>{{ $wishlist_items }}</sup>
                        @endif
                        
                    </a>
                </li>
                
                <li class="nav-item {{ Request::is('order_history') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('order_history') }}">
                        <i class="fa fa-history" aria-hidden="true"></i> Orders
                    </a>
                </li>
                @endauth
            </ul>
            <div class="user_option">
                @if (Route::has('login'))
                    @auth
                    <form action="{{ url('/logout') }}" method="POST" class="mr-2">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    @else
                    <a href="{{ url('/login') }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                            Login
                        </span>
                    </a>
                    <a href="{{ url('/register') }}">
                        <i class="fa fa-vcard" aria-hidden="true"></i>
                        <span>
                            Register
                        </span>
                    </a>
                    @endauth
                @endif
                {{-- <form class="form-inline">
                    <button class="btn nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form> --}}
            </div>
        </div>
    </nav>
</header>
