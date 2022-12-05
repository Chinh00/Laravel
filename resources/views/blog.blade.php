@extends("./templates/main")

@section("main")
     <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Blog Classic<span>Blog</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Classic</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                        <div class="col-lg-2"></div>
                		<div class="col-lg-8">
                            @foreach($new as $key)
                                <article class="entry">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="{{asset('images/' . $key->image)}}" alt="image desc" style="height: 100px;">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <span class="entry-author">
                                                by <a href="#">Chinh Nguyễn</a>
                                            </span>
                                            <span class="meta-separator">|</span>
                                            <a href="#">{{$key->created_at}}</a>
                                            <span class="meta-separator">|</span>
                                        </div><!-- End .entry-meta -->

                                        <h2 class="entry-title">
                                            <a href="single.html">{{$key->header}}</a>
                                        </h2><!-- End .entry-title -->

                                        

                                        <div class="entry-content">
                                            <p>{!! $key->content !!}</p>
                                            <a href="single.html" class="read-more">Đọc tiếp</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </article><!-- End .entry -->
                            @endforeach


                			
                		</div><!-- End .col-lg-9 -->

                		<div class="col-lg-2"></div>
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection