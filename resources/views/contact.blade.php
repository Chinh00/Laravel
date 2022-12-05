@extends("./templates/main")

@section("main")
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url({{asset('frontend/assets/images/contact-header-bg.jpg')}})">
        			<h1 class="page-title text-white">Liên hệ<span class="text-white">Giải đáp thắc mắc</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Thông tin liên hệ</h2><!-- End .title mb-2 -->
                			<p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sapiente, labore error praesentium atque ipsa, sunt eos inventore alias voluptatem aperiam quasi minima iusto, ad est laborum suscipit! Eligendi, iure.</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>Cửa hàng</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							175 Tây Sơn
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:#">+12 345 678</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:#">2151062726@e.tlu.edu.vn</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Câu hỏi của bạn?</h2><!-- End .title mb-2 -->
                			<p class="mb-2">Vui lòng điền các thông tin dưới đây</p>

                			<form action="/contact" class="contact-form mb-3" method="POST">
								@csrf
                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" class="form-control" id="cname" placeholder="Họ tên *" required name="name">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                						<input type="email" class="form-control" id="cemail" placeholder="Email *" required name="email">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                				<div class="row">
                					<div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" class="form-control" id="cphone" placeholder="Số điện thoại" name="phone">
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Subject</label>
                						<input type="text" class="form-control" id="csubject" placeholder="Chủ đề" name="subject">
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Câu hỏi *" name="question"></textarea>

                				<button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                					<span>Gửi</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	

                	
                </div><!-- End .container -->
            	
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection