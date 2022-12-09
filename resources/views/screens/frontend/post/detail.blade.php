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
						<h3 class="title">Trang bài viết</h3>
						<ul>
							<li><a href="{{route('home')}}">Trang chủ</a></li>
							<li class="active">Bài viết</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--    breadcrumb-area end    -->

	<!-- team-area start -->
	<div class="blog-standard-details-area pt-130 pb-130">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8">
					<div class="blog-standard-details-posts">
						<div class="blog-details-wrap mb-40">
							<div class="blog-thumb mb-35">
								<a href="blog-details.html">
									<img height="600px" src="{{asset($post->avatar)}}" alt="blog">
								</a>
							</div>
							<div class="blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> {{date('d-m-Y',strtotime($post->created_at))}}</span>
							<span><i class="far fa-user"></i>{{$post->user->name}}</span>
							</div>
							<div class="blog-title">
								<h3>
									{{$post->title}}
								</h3>
							</div>
							<div class="blog-content">
								{!! $post->content_post !!}
								
								<div class="row mb-30">
									<div class="col-md-6">
										<div class="blog-tag">
											<h4>Tags:</h4>
											<ul>
												<li><a href="#"><a href="#">GYM</a></a></li>
												<li><a href="#"><a href="#">Yoga</a></a></li>
												<li><a href="#"><a href="#">Fitness</a></a></li>
												<li><a href="#"><a href="#">Body</a></a></li>
											</ul>
										</div>
									</div>
									<div class="col-md-6">
										<div class="blog-share">
											<h4>Share :</h4>
											<ul>
												<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
												<li><a href="#"><i class="fab fa-twitter"></i></a></li>
												<li><a href="#"><i class="fab fa-instagram"></i></a></li>
												<li><a href="#"><i class="fab fa-google"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="blog-author">
								<div class="row">
									<div class="col-lg-3">
										<div class="author-thumb">
											<img src="assets/img/author/author-lg-4.jpg" alt="Author">
										</div>
									</div>
									<div class="col-lg-9">
										<div class="author-details">
											<h4>Nikoas Zakiloa</h4>
											<p>Pain avoided. But in certain circumstances and owing the claims of duty
												or the obligations of bus frequently occur that pleasures have to be
												repudiated</p>
											<ul>
												<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
												<li><a href="#"><i class="fab fa-twitter"></i></a></li>
												<li><a href="#"><i class="fab fa-instagram"></i></a></li>
												<li><a href="#"><i class="fab fa-google"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="related-news mt-60">
								<h3>Related News</h3>
								<div class="row">
									<div class="col-lg-6">
										<div class="related-news-wrap">
											<h4><a href="#">Mixing Tangible & Intangible Interfaces Using Adobe</a></h4>
											<div class="news-meta">
												<span><i class="far fa-user"></i> Soamlia</span>
												<span><i class="fas fa-calendar-alt"></i> 20 Jan 2020</span>
												<span><i class="far fa-comments"></i> (1k)</span>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="related-news-wrap">
											<h4><a href="#">Mixing Tangible & Intangible Interfaces Using Adobe</a></h4>
											<div class="news-meta">
												<span><i class="far fa-user"></i> Soamlia</span>
												<span><i class="fas fa-calendar-alt"></i> 20 Jan 2020</span>
												<span><i class="far fa-comments"></i> (1k)</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-comments mt-60">
							<div class="blog-comments-title mb-30">
								<h4>Comments</h4>
							</div>
							<div class="latest-comments">
								<ul>
									<li>
										<div class="comments-box">
											<div class="comments-avatar">
												<img src="assets/img/author/author-5.jpg" alt="author-thumb">
											</div>
											<div class="comments-text">
												<div class="comments-author-name">
													<h5>David Angel Makel</h5>
													<span>Web Designer</span>
												</div>
												<p>
													It is a long established fact that a reader will be distracted by
													the readable content of a page when looking at its layout. The point
													of using Lorem Ipsum that more-or-less normal distribution letters,
													as opposed to using
												</p>
												<a href="#" class="replay">
													Reply Comments <i class="fas fa-long-arrow-alt-right"></i>
												</a>
											</div>
										</div>
										<ul class="comments-reply">
											<li>
												<div class="comments-box">
													<div class="comments-avatar">
														<img src="assets/img/author/author-6.jpg" alt="author-thumb">
													</div>
													<div class="comments-text">
														<div class="comments-author-name">
															<h5>Michel Rason Roy</h5>
															<span>Product Engineer</span>
														</div>
														<p>
															It is a long established fact that a reader will be
															distracted the readable of a page when looking at its
															layout. The point ousing that it has a more-or-less normal
															distribution letters
														</p>
														<a href="#" class="replay">
															Reply Comments <i class="fas fa-long-arrow-alt-right"></i>
														</a>
													</div>
												</div>
											</li>
										</ul>
									</li>
									<li>
										<div class="comments-box">
											<div class="comments-avatar">
												<img src="assets/img/author/author-7.jpg" alt="author-thumb">
											</div>
											<div class="comments-text">
												<div class="comments-author-name">
													<h5>David Angel Makel</h5>
													<span>Assistant Manager</span>
												</div>
												<p>
													It is a long established fact that a reader will be distracted by
													the readable content of a when looking at its layout. The point of
													using Lorem Ipsum that more-or-less normal distribution of letters,
													as opposed to using Content here, content ktop publishing packages
													and web page editors
												</p>
												<a href="#" class="replay">
													Reply Comments <i class="fas fa-long-arrow-alt-right"></i>
												</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="blog-comment-form mt-60 mb-md-60 mb-xs-60">
							<div class="blog-comments-title mb-30">
								<h4>Leave A Reply</h4>
							</div>
							<div class="comment-form">
								<form action="#">
									<div class="row">
										<div class="col-lg-6">
											<div class="input-wrap input-icon icon-name">
												<input type="text" name="name" placeholder="Your Name">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-wrap input-icon icon-email">
												<input type="email" name="mail" placeholder="Your Email">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="input-wrap input-icon icon-msg">
												<textarea name="message" placeholder="Your Message" spellcheck="false"></textarea>
											</div>
										</div>
										<div class="col-lg-12">
											<button class="btn btn-gra" type="submit">
												send reply
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-10">
					<div class="sidebar-area">
						<div class="widget-wrap about-widget mb-30">
							<div class="thumb">
								<img src="assets/img/widget/about-widget.jpg" alt="widget">
							</div>
							<div class="about-widget-content">
								<p>
									Which toil and pain can procure hi some great pleasure.To take a trivial examp whiof
									us ever underta orious physical exercise except to obtain some advatage from
								</p>
							</div>
							<div class="about-widget-author">
								<h4>Tom C. Dickerson</h4>
								<span>CEO & Founder</span>
							</div>
						</div>

						<div class="widget-wrap recent-post-widget mb-30">
							<h3 class="widget-title">Recent News</h3>
							<div class="recent-post-wrap">
								<img src="assets/img/widget/widget-blog-1.jpg" alt="widget">
								<h4>
									<a href="blog-details.html">
										Air Side Changed My Design Process
									</a>
								</h4>
							</div>
							<div class="recent-post-wrap">
								<img src="assets/img/widget/widget-blog-2.jpg" alt="widget">
								<h4>
									<a href="blog-details.html">
										Dwelling On Importance Of Self Reflection Part
									</a>
								</h4>
							</div>
							<div class="recent-post-wrap">
								<img src="assets/img/widget/widget-blog-3.jpg" alt="widget">
								<h4>
									<a href="blog-details.html">
										Making Transition From Effects CSS Transitions
									</a>
								</h4>
							</div>
						</div>
						<div class="widget-wrap category-widget mb-30">
							<h3 class="widget-title">Category</h3>
							<ul>
								<li><a href="#">Fitness & GYM</a></li>
								<li><a href="#">Beauty & Spa</a></li>
								<li><a href="#">Food & Medicine</a></li>
								<li><a href="#">Dumbbelling</a></li>
								<li><a href="#">Boxing & Caradio</a></li>
								<li><a href="#">Cycling GYM</a></li>
							</ul>
						</div>

						<div class="widget-wrap add-widget mb-30">
							<div class="add-widget-wrap">
								<a href="#">
									<img src="assets/img/widget/add-widget-2.jpg" alt="widget">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- team-area end -->
</main>
@endsection