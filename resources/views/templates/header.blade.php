@section("header")
    <header class="header header-intro-clearance header-4">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="/" class="logo">
                            <img src="{{asset('frontend/assets/images/demos/demo-4/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </div>
                                <p>Users</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <ul class="compare-products">
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                    </li>
                                </ul> -->
                                @if(session()->has("user_id"))
                                    <form action="/logout" method="post">
                                        @csrf
                                        <div class="compare-actions">
                                            <button type="submit" class="btn btn-outline-primary-2"><span>Đăng xuất</span><i class="icon-long-arrow-right"></i></button>
                                        </div>
                                    </form>
                                @else
                                    <div class="compare-actions">
                                        <a href="#signin-modal" data-toggle="modal" id="login">Sign in / Sign up</a>
                                    </div>
                                @endif
                                
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">{{(DB::table("orders")->select("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->where("orders.user_id", session()->get("user_id"))->where("orders.status", "0")->join("order_detail", "order_detail.order_id", "=", "orders.id")->groupBy("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->get()->count() > 0) ? (DB::table("orders")->select("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->where("orders.user_id", session()->get("user_id"))->where("orders.status", "0")->join("order_detail", "order_detail.order_id", "=", "orders.id")->groupBy("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->get()->count()) : 0}}</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @foreach(DB::table("orders")->select("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->where("orders.user_id", session()->get("user_id"))->where("orders.status", "0")->join("order_detail", "order_detail.order_id", "=", "orders.id")->groupBy("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->get() as $key)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{$key->name}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$key->quantity}}</span>
                                                    {{number_format($key->price)}}
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    @php
                                                        $image = isset(DB::table("product_images")->select("image")->where("product_id", $key->product_id)->get()[0]->image) ? DB::table("product_images")->select("image")->where("product_id", $key->product_id)->get()[0]->image : "" ;
                                                    @endphp
                                                    <img src="{{asset('images/' . $image)}}" alt="product">
                                                </a>
                                            </figure>
                                            <form action="/cart/delete" method="post">
													@csrf
													<input type="hidden" name="product_id" value="{{$key->product_id}}">
													<button class="btn-remove" type="submit"><i class="icon-close"></i></button>
												</form>
                                        </div><!-- End .product -->
                                    @endforeach
                                    
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">{{(isset(DB::table("orders")->select("subtotal")->where("user_id", session()->get("user_id"))->where("orders.status", "0")->get()[0]->subtotal)) ? DB::table("orders")->select("subtotal")->where("user_id", session()->get("user_id"))->where("orders.status", "0")->get()[0]->subtotal : 0}}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="/cart" class="btn btn-primary">Giỏ hàng</a>
                                    <a href="/checkout" class="btn btn-outline-primary-2" onclick="return check()"><span>Thanh toán</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        
                    </div><!-- End .header-left -->

                    <div class="header-center" style="justify-content: center;">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows center">
                                <li class="">
                                    <a href="/" class="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="/phone" class="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="/news" class="">Tin tức</a>
                                </li>
                                <li>
                                    <a href="/contact" class="">Liên hệ</a>
                                </li>
                                <li>
                                    <a href="/about" class="">Giới thiệu</a>
                                </li>
                                
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

@endsection
