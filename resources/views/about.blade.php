@extends("./templates/main")

@section("main")
    <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url({{asset('frontend/assets/images/about-header-bg.jpg')}})">
        			<h1 class="page-title text-white">Về chúng tôi<span class="text-white">Phân phối điện thoại chính hãng</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <h2 class="title">One header</h2><!-- End .title -->
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. </p>
                        </div><!-- End .col-lg-6 -->
                        
                        <div class="col-lg-6">
                            <h2 class="title">Two header</h2><!-- End .title -->
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis suscipit laborum similique voluptas voluptate, voluptatem aliquid cumque ipsa consectetur! Suscipit quam aut iure aperiam repellat sint perspiciatis atque asperiores molestiae!</p>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <div class="mb-5"></div><!-- End .mb-4 -->
                </div><!-- End .container -->

                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title">Chúng tôi là ai?</h2><!-- End .title -->
                                <p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id odio itaque voluptates ad libero sint rem consequuntur sed similique iste hic vel sunt ducimus illum, eligendi quibusdam! Porro, quaerat dolorem? </p>

                                <a href="blog.html" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                                    <span>VIEW OUR NEWS</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <img src="assets/images/about/img-1.jpg" alt="" class="about-img-front">
                                    <img src="assets/images/about/img-2.jpg" alt="" class="about-img-back">
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->

                <div class="container">
                    

                    <hr class="mt-4 mb-6">

                    <h2 class="title text-center mb-4">Team chúng tôi</h2><!-- End .title text-center mb-2 -->

                    <div class="row">
                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('frontend/assets/images/team/member-1.jpg')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Samanta Grey<span>Founder & CEO</span></h3><!-- End .member-title -->
                                            <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p> 
                                            <div class="social-icons social-icons-simple">
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Samanta Grey<span>Founder & CEO</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('frontend/assets/images/team/member-2.jpg')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Chinh Nguyễn Văn<span>Leader and Coder team</span></h3><!-- End .member-title -->
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores corporis inventore esse dicta! Amet a, harum autem repellat vitae atque repudiandae. Sequi quae harum, fugiat sapiente architecto dolorem voluptate repellat.</p> 
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com/nhin.len.tren.day.lam.gi.ha/
" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Bruce Sutton<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="member member-anim text-center">
                                <figure class="member-media">
                                    <img src="{{asset('frontend/assets/images/team/member-3.jpg')}}" alt="member photo">

                                    <figcaption class="member-overlay">
                                        <div class="member-overlay-content">
                                            <h3 class="member-title">Janet Joy<span>Product Manager</span></h3><!-- End .member-title -->
                                            <p>Sed pretium, ligula sollicitudin viverra, tortor libero sodales leo, eget blandit nunc.</p> 
                                            <div class="social-icons social-icons-simple">
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .member-overlay-content -->
                                    </figcaption><!-- End .member-overlay -->
                                </figure><!-- End .member-media -->
                                <div class="member-content">
                                    <h3 class="member-title">Janet Joy<span>Product Manager</span></h3><!-- End .member-title -->
                                </div><!-- End .member-content -->
                            </div><!-- End .member -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="mb-2"></div><!-- End .mb-2 -->

                
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection