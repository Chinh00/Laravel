@extends("./templates/main")

@section("main")
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input" name="coupon">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form>
            			</div><!-- End .checkout-discount -->
            			<form action="/checkout/success" method="POST" >
							@csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Chi tiết hóa đơn</h2><!-- End .checkout-title -->
										<label>Họ và tên *</label>
		                				<input type="text" class="form-control" required name="fullname" value="{{$user[0]->fullname}}">
	            						<label>Số điện thoại *</label>
	            						<input type="text" class="form-control" name="phone" value="{{$user[0]->phone}}">

	            						<label>Email *</label>
	            						<input type="email" class="form-control" required name="email">

	            						<label>Địa chỉ cụ thể *</label>
	            						<input type="text" class="form-control" placeholder="Số nhà, tên đường, ..." required name="address" value="{{$user[0]->address}}">

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Tỉnh / Thành phố *</label>
		                						<input type="text" class="form-control" required name="city">
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Quận / Huyện *</label>
		                						<input type="text" class="form-control" required name="state">
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				
		                						<label>Xã / Phường *</label>
		                						<input type="text" class="form-control" required name="xa">

	        							

	                					<label>Ghi chú</label>
	        							<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Hóa đơn thanh toán</h3><!-- End .summary-title -->
										
		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Sản phẩm</th>
		                							<th>Tổng cộng</th>
		                						</tr>
		                					</thead>

		                					<tbody>
		                						@foreach($order as $key)
													<tr>
														<td>
															{{$key->name}}
														</td>
														<td>
															{{number_format($key->total)}}
														</td>
													</tr>
												@endforeach	
		                						<tr class="summary-subtotal">
		                							<td>Tổng giá trị đơn hàng: </td>
		                							<td>{{number_format(DB::table("orders")->select("subtotal")->where("user_id", session()->get("user_id"))->where("status", "1")->get()[0]->subtotal)}}</td>
		                						</tr><!-- End .summary-subtotal -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
										                    Chuyển tiền qua ngân hàng
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
														<p>STK: 0000025040702</p>
														<p>Ngân hàng: MB Bank</p>
														<p>Tên tài khoản: NGUYEN VAN CHINH</p>
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-2">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
										                    Trả tiền khi nhận hàng
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
										            <div class="card-body">
										                Hàng giao trong tuần từ thứ 2 đến thứ 7, trong vòng 3 đến 5 ngày sau khi đặt hàng
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										   
										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Hoàn thành</span>
		                					<span class="btn-hover-text">Đặt hàng</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection