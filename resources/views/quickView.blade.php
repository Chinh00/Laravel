<div class="container quickView-container">
	<div class="quickView-content">
		<div class="row">
			<div class="col-lg-7 col-md-6">
				<div class="row">
					<div class="product-left">
						@foreach($a as $key => $val)
                            <a href="{{'#' . $key}}" class="carousel-dot active">
                                <img src="{{asset('images/' . $val)}}">
                            </a>
                        @endforeach
					</div>
					<div class="product-right">
						<div class="owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
	                        "dots": false,
	                        "nav": false, 
	                        "URLhashListener": true,
	                        "responsive": {
	                            "900": {
	                                "nav": true,
	                                "dots": true
	                            }
	                        }
	                    }'>
							

		                    @foreach($a as $key => $val)
                                <div class="intro-slide" data-hash="{{'#' . $key}}">
                                    <img src="{{asset('images/' . $val)}}" alt="Image Desc">
                                </div><!-- End .intro-slide -->
                            @endforeach
		                </div>
					</div>
                </div>
			</div>
			<div class="col-lg-5 col-md-6">
				<h2 class="product-title">{{$product[0]->name}}</h2>
				<h3 class="product-price">{{$product[0]->price}}</h3>

                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                    <span class="ratings-text">( 2 Reviews )</span>
                </div><!-- End .rating-container -->

                <p class="product-txt">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue.</p>


                

                

	            
                <div class="details-filter-row details-row-size">
                    <label for="qty">Số lượng</label>
                    <div class="product-details-quantity">
                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                    </div><!-- End .product-details-quantity -->
                </div><!-- End .details-filter-row -->

                <div class="product-details-action">
                    <a href="#" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
                </div>

                <div class="product-details-footer">
                    <div class="social-icons social-icons-sm">
                        <span class="social-label">Share:</span>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>