@extends('frontend.layouts.master')
@section('title', 'Bakery || HOME PAGE')
@section('main-content')
    <!-- Slider Area -->
    @if (count($banners) > 0)
        <section id="Gslider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $key => $banner)
                    <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                    </li>
                @endforeach

            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img class="first-slide" src="{{ asset('image/banner/' . $banner->image) }}" alt="First slide">
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 style="margin-left: -900px">Hot Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($hotProducts as $product)
                            @if ($product->hot == 1)
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('product-detail', $product->id) }}">
                                            <img class="default-img" src="{{ asset('image/product/' . $product->image) }}"
                                                alt="" style="width: 255px; height: 200px">
                                            <img class="hover-img" src="{{ asset('image/product/' . $product->image) }}"
                                                alt="">
                                            {{-- <span class="out-of-stock">Hot</span> --}}
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a style="margin-right: 10px" title="Wishlist" href="{{ route('add-to-wishlist', $product->id) }}"><i
                                                        class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a href="{{ route('add-to-cart', $product->id) }}">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ route('product-detail', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>{{ number_format($product->price, 0) }}đ</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 style="margin-left: -900px">New Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $product_lists = DB::table('products')
                        ->inRandomOrder()
                        ->where('status', '1')
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'DESC')
                        ->limit(6)
                        ->get();
                @endphp
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($product_lists as $product)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('product-detail', $product->id) }}">
                                        <img class="default-img" src="{{ asset('image/product/' . $product->image) }}"
                                            alt="" style="width: 255px; height: 200px">
                                        <img class="hover-img" src="{{ asset('image/product/' . $product->image) }}"
                                            alt="">
                                        {{-- <span class="out-of-stock">Hot</span> --}}
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a style="margin-right: 10px" title="Wishlist" href="{{ route('add-to-wishlist', $product->id) }}"><i
                                                    class=" ti-heart "></i><span>Yêu thích</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a href="{{ route('add-to-cart', $product->id) }}">Thêm giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('product-detail', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        <span>{{ number_format($product->price, 0) }}đ</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 style="margin-left: -1000px">From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($blogs)
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Blog  -->
                            <div class="shop-single-blog">
                                <img src="{{ asset('image/blog/' . $blog->image) }}" alt="{{ $blog->image }}"
                                    style="height: 353px;">
                                <div class="content">
                                    <p class="date">{{ $blog->created_at->format('d M , Y. D') }}</p>
                                    <a href="{{ route('blog.detail', $blog->id) }}" class="title">{{ $blog->name }}</a>
                                    <a href="{{ route('blog.detail', $blog->id) }}" class="more-btn">Continue Reading</a>
                                </div>
                            </div>
                            <!-- End Single Blog  -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    @include('frontend.layouts.newsletter')
@endsection

@push('styles')
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
        async='async'></script>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
        async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
            background: #000000;
            color: black;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
            bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
            font-size: 18px;
            color: black;
            margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
            bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        /*==================================================================
                                [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function() {
            $filter.on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });

        });

        // init Isotope
        $(window).on('load', function() {
            var $grid = $topeContainer.each(function() {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function() {
            $(this).on('click', function() {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>
@endpush
