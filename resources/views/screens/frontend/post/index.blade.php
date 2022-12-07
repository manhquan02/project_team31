@extends('layouts.frontend.master')
@section('content')

<main>
	<!--    breadcrumb-area start    -->
	<section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix" data-overlay="black"
	         data-opacity="7" data-background="assets/img/bg/breadcrumb-bg-2.jpg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<div class="breadcrumb-content">
						<h3 class="title">Blog Grid Layout</h3>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li class="active">Blog Grid</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--    breadcrumb-area end    -->

	<!-- team-area start -->
	<div class="blog-content-area pt-130 pb-130">
		<div class="container">
			<div class="row">
                @foreach($post as $item)
				<div class="col-xl-4 col-md-6">
					<div class="blog-wrap-2 mb-30">
						<div class="blog-thumb mb-35">
							<a href="blog-details.html">
								<img src="{{asset($item->avatar)}}" alt="blog">
							</a>
						</div>
						<div class="blog-meta">
							<span><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($item->created_at))}}</span>
							<span><i class="far fa-user"></i>{{$item->user->name}}</span>
						</div>
						<div class="blog-content">
							<h3>
								<a href="blog-details.html">
									{{$item->title}}
								</a>
							</h3>

							<a href="blog-details.html" class="read-more">
								Đọc thêm <i class="fas fa-angle-double-right"></i>
							</a>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- team-area end -->
</main>
@endsection