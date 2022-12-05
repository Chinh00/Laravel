@extends("./templates/main")

@section("main")
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
								<form action="" method="post"></form>
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Sản phẩm</th>
											<th>Đơn giá</th>
											<th>Số lượng</th>
											<th>Tổng tiền</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										@foreach($order as $key)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															@php
																$image = (isset(DB::table("product_images")->select("image")->where("product_id", $key->product_id)->get()[0]->image) ? DB::table("product_images")->select("image")->where("product_id", $key->product_id)->get()[0]->image : "" );
															@endphp
															<img src="{{asset('images/' . $image)}}" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a>{{$key->name}}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">{{number_format($key->price)}}</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" min="1" max="10" step="1" data-decimals="0" required value="{{$key->quantity}}" onclick="return alert('dfsdf')">
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">{{$key->total}}</td>
											<td class="remove-col">
												<form action="/cart/delete" method="post">
													@csrf
													<input type="hidden" name="product_id" value="{{$key->product_id}}">
													<button class="btn-remove" type="submit"><i class="icon-close"></i></button>
												</form>
											</td>
										</tr>

										@endforeach
										
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div><!-- .End .input-group-append -->
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->

			            			<a href="#" class="btn btn-outline-dark-2"><span>Đặt hàng</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Hóa đơn</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Tổng tiền: </td>
	                							<td>{{number_format(isset($order[0]->subtotal) ? $order[0]->subtotal : 0 )}}</td>
	                						</tr><!-- End .summary-subtotal -->
	                						
	                						

	                						
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="/checkout" class="btn btn-outline-primary-2 btn-order btn-block" onclick="return check()">Thanh toán</a>
	                			</div><!-- End .summary -->

		            			<a href="/phone" class="btn btn-outline-dark-2 btn-block mb-3"><span>Tiếp tục mua sắm</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection