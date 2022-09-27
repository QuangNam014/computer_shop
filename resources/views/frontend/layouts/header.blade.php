<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->

                            <li class="currency">
                                <a href="#">
                                    usd
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="currency_selection">
                                    <li><a href="#">cad</a></li>
                                    <li><a href="#">aud</a></li>
                                    <li><a href="#">eur</a></li>
                                    <li><a href="#">gbp</a></li>
                                    <li><a href="#">vnd</a></li>
                                </ul>
                            </li>
                            <li class="language">
                                <a href="#">
                                    English
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="language_selection">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Vietnamese</a></li>
                                </ul>
                            </li>
                            @if (auth()->check())
                                <li class="account">
                                    <a href="#">
                                        {{auth()->user()->name}}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="{{ route('customer.logout') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="account">
                                    <a href="#">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection">
                                        <li><a href="{{ route('customer.login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                        <li><a href="{{ route('customer.register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="index.html">Computer <span>Store<span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{ route('customer.index') }}">home</a></li>
                            <li><a href="{{ route('customer.product') }}">shop</a></li>
                            <li><a href="single.html">promotion</a></li>
                            <li><a href="#">pages</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                        <ul class="navbar_user"> 
                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            @if (auth()->check())
                                <li><a href="{{ route('customer.infoCart', auth()->user()->id) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
                                <li><a href="{{ route('customer.infoCustomer') }}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            @endif
                            <li class="checkout">
                                <a href="{{ route('customer.cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    @if (session()->has('cart') != null)
                                        <span id="total_show_quantity" class="checkout_items">{{session()->get('cart')->totalQuantity}}</span>
                                    @else
                                        <span id="total_show_quantity" class="checkout_items">0</span> 
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>