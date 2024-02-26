<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            Tel: +8498374323423       
                            Addres: Mai Dịch - Hà Nội
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">

                            {{-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}

                            @if (Auth()->user())
                                <li><i class="ti-location-pin"></i> <a href="{{ route('user.order') }}">Order</a>
                                </li>
                                {{-- <li><i class="ti-user"></i> <a href="{{ route('home-user') }}"
                                        target="_blank">Dashboard</a></li> --}}
                                {{-- <li><i class="ti-power-off"></i> <a href="{{ route('user.logout') }}">Logout</a></li> --}}
                                <!-- Nav Item - User Information -->
                                <li>
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                        @php
                                            echo Auth()->user()->name;
                                        @endphp
                                        &nbsp;
                                        @if (Auth()->user()->image != null)
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('image/user/' . Auth()->user()->image) }}"
                                                style="width: 30px; height: 30px">
                                        @else
                                            <img class="img-profile rounded-circle"
                                                src="{{ asset('backend/img/avatar.png') }}" style="width: 20px;">
                                        @endif
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            <i class="ti-user"></i>
                                            Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user-form-change-password') }}">
                                            <i class="fa-light fa-key"></i>
                                            Change Password
                                        </a>
                                        <span class="dropdown-item"><i class="ti-power-off"></i> <a
                                                href="{{ route('user.logout') }}">Logout</a></span>
                                    </div>
                                </li>
                            @else
                                <li><i class="ti-power-off"></i><a href="{{ route('user.view-login') }}">Login /</a>
                                    <a href="">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if (Auth()->user())
                        <div class="col-lg-2 col-md-3 col-12">
                            <div class="right-bar" style="width: 200px; margin-right: -550px; margin-top: -8px;">
                                <!-- Search Form -->
                                <div class="sinlge-bar shopping">
                                    <a href="{{ route('wishlist') }}" class="single-icon"><i class="fa fa-heart-o"></i>
                                        <span class="total-count">
                                            @if (count($wishlists) > 0)
                                                {{ count($wishlists) }}
                                            @else
                                                0
                                            @endif
                                        </span></a>
                                    <!-- Shopping Item -->
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                @if ($wishlists)
                                                    <span>{{ count($wishlists) }} Items</span>
                                                @else
                                                    <span>0 Items</span>
                                                @endif
                                                <a href="{{ route('wishlist') }}">View Wishlist</a>
                                            </div>
                                            <ul class="shopping-list">
                                                @foreach ($wishlists as $data)
                                                    @if (auth()->user()->id == $data->user_id)
                                                        <li>
                                                            <a href="" class="remove" title="Remove this item"><i
                                                                    class="fa fa-remove"></i></a>
                                                            <a class="cart-img" href="#"><img
                                                                    src="{{ asset('/image/product/' . $data->product->image) }}"
                                                                    alt=""></a>
                                                            <h4><a href="{{ route('product-detail', $data->product->id) }}"
                                                                    target="_blank">{{ $data->product->name }}</a></h4>
                                                            <p class="quantity">{{ $data->quantity }} x - <span
                                                                    class="amount">{{ number_format($data->price, 0) }}đ</span>
                                                            </p>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount">đ</span>
                                                </div>
                                                <a href="{{ route('cart') }}" class="btn animate">Cart</a>
                                            </div>
                                        </div>
                                    @endauth
                                    <!--/ End Shopping Item -->
                                </div>

                                <div class="sinlge-bar shopping">
                                    <a href="{{ route('cart') }}" class="single-icon"><i class="ti-bag"></i><span
                                            class="total-count">
                                            @if (count($carts) > 0)
                                                {{ count($carts) }}
                                            @else
                                                0
                                            @endif
                                        </span></a>
                                    <!-- Shopping Item -->
                                    @auth
                                        <div class="shopping-item">
                                            <div class="dropdown-cart-header">
                                                @if ($carts)
                                                    <span>{{ count($carts) }} Items</span>
                                                @else
                                                    <span>0 Items</span>
                                                @endif
                                                <a href="{{ route('cart') }}">View Cart</a>
                                            </div>
                                            <ul class="shopping-list">
                                                @foreach ($carts as $data)
                                                    <li>
                                                        <a href="{{ route('cart.delete', $data->id) }}" class="remove"
                                                            title="Remove this item"><i class="fa fa-remove"></i></a>
                                                        <a class="cart-img" href="#"><img
                                                                src="{{ asset('image/product/' . $data->product->image) }}"></a>
                                                        <h4><a href="{{ route('product-detail', $data->product->id) }}"
                                                                target="_blank">{{ $data->product['name'] }}</a></h4>
                                                        <p class="quantity">{{ $data->quantity }} x - <span
                                                                class="amount">{{ number_format($data->product->price, 0) }}đ</span>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    @php
                                                        $sum = 0;
                                                        foreach ($carts as $value) {
                                                            $sum += $value->price * $value->quantity;
                                                        }
                                                    @endphp
                                                    <span>Total</span>
                                                    <span class="total-amount">{{ number_format($sum, 0) }}đ</span>
                                                </div>
                                                <a href="{{ route('checkout') }}" class="btn animate">Checkout</a>
                                            </div>
                                        </div>

                                    @endauth
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- End Top Right -->
                </div>

            </div>

        </div>
    </div>
    <!-- End Topbar -->
    {{-- <div class="middle-inner">
        <div class="container">
            
        </div>
    </div> --}}
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class=""><a href="{{ route('home-user') }}">Home</a></li>
                                            <li class=""><a href="{{ route('aboutUs') }}">About Us</a></li>
                                            <li class=""><a href="{{ route('product-lists') }}">Products</a>
                                            </li>
                                            <li class=""><a href="{{ route('blog.list') }}">Blog</a></li>
                                            <li class=""><a href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-12">
                                <!-- Logo -->
                                <div class="logo">

                                </div>
                                <!--/ End Logo -->
                                <!-- Search Form -->
                                <div class="search-top">
                                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                                    <!-- Search Form -->
                                    <div class="search-top">
                                        <form class="search-form">
                                            <input type="text" placeholder="Search..." name="search">
                                            <button value="search" type="submit"><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                    <!--/ End Search Form -->
                                </div>
                                <!--/ End Search Form -->
                                <div class="mobile-nav"></div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-12">
                                <div class="search-bar-top">
                                    <div class="search-bar">
                                        <form class="txt-form-search" method="POST"
                                            action="{{ route('product.search') }}">
                                            @csrf
                                            <input id="header-search" name="search" placeholder="Search....."
                                                type="search" />
                                            <button class="btn-search btnn" type="submit"><i
                                                    class="ti-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>

<style>
    .btn-search {
        background-color: #aaa !important;
    }

    .txt-form-search {
        background-color: #f0f2f5;
        width: calc(100% - 62px) !important;
    }

    #header-search {
        width: 100%;
        border: none;
        outline: none;
    }
</style>
