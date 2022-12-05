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
        			<h1 class="page-title text-white">Đặt hàng thành công<span class="text-white">Kiểm tra hóa đơn trong email</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            
        </main><!-- End .main -->
@endsection