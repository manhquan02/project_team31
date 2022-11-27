<!doctype html>
<html lang="en">

<!-- Mirrored from www.devsnews.com/template/gymee/gymee/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Sep 2022 14:10:40 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">

	<!-- All CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/metisMenu.css">
	<link rel="stylesheet" href="assets/css/odometer.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/main.css">
    @yield('style')
	<title>GYMEE - Fitness and Gym HTML5 Template</title>
</head>

<body>
<!-- preloader -->
<div id="preloader">
	<div class="preloader">
		<img src="assets/img/logo/preloader.gif" alt="preloader">
		<h4>.. loading ..</h4>
	</div>
</div>
<!-- preloader end  -->

<!--    header-area start    -->
@include('layouts.frontend.test.header')
<!--    header-area end    -->
@include('layouts.frontend.test.slide')
<!--    slide-bar start   -->
@yield('content')
<div class="body-overlay"></div>
<!--    slide-bar End   -->

<!--    search-bar start    -->
<div class="search-area">
	<div class="search-area-bg"></div>
	<a href="#" class="search-close">
		<i class="far fa-times"></i>
	</a>
	<div class="search-form">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8">
					<form action="#" method="post">
						<input type="text" placeholder="Search here...">
						<button type="submit">
							<i class="fa fa-search"></i>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--    search-bar end    -->

<main>
	<!-- slider-area start -->
	<div class="slider-area">
		<div class="swiper-container home-slider-1">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<div class="swiper-slide single-slide">
					<div class="container">
						<div class="row">
							<div class="col-xl-10 col-lg-8 col-xl-6">
								<div class="slider-content-1">
									<span data-animation="fadeInUp" data-delay="0.3s">
										Making Different Form Others
									</span>
									<h2 data-animation="fadeInUp" data-delay="0.6s">Build A Perferct Health
										Growth</h2>
									<a href="#" class="btn btn-gra" data-animation="fadeInUp" data-delay="0.9s">
										join with us
										<i class="fas fa-angle-double-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-shape-1">
						<img src="assets/img/shape/shape-29.png" alt="shape">
					</div>
					<div class="slide-shape-2">
						<img src="assets/img/shape/shape-30.png" alt="shape">
					</div>
					<div class="slide-thumb-1" data-animation="fadeInRight" data-delay="0.3s">
						<img src="assets/img/thumb/thumb-29.png" alt="thumb">
					</div>
				</div>
				<div class="swiper-slide single-slide">
					<div class="container">
						<div class="row">
							<div class="col-xl-10 col-lg-8 col-xl-6">
								<div class="slider-content-1">
									<span data-animation="fadeInUp" data-delay="0.3s"> Different Form Others </span>
									<h2 data-animation="fadeInUp" data-delay="0.6s">Build A Perferct Health
										Growth</h2>
									<a href="#" class="btn btn-gra" data-animation="fadeInUp" data-delay="0.9s">
										join with us
										<i class="fas fa-angle-double-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-shape-1">
						<img src="assets/img/shape/shape-29.png" alt="shape">
					</div>
					<div class="slide-shape-2">
						<img src="assets/img/shape/shape-30.png" alt="shape">
					</div>
					<div class="slide-thumb-1" data-animation="fadeInRight" data-delay="0.3s">
						<img src="assets/img/thumb/thumb-29.png" alt="thumb">
					</div>
				</div>
			</div>
			<!-- If we need pagination -->
			<div class="swiper-pagination"></div>
			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev"><i class="far fa-angle-left"></i></div>
			<div class="swiper-button-next"><i class="far fa-angle-right"></i></div>
		</div>
	</div>
	<!-- slider-area end -->

	<!-- feature-area start -->
	<div class="feature-area pt-130 pb-130">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-8 col-md-10">
					<div class="section-title mb-70 mb-xs-50">
						<h3>Welcome To Gymee An Exclusive Gymasian</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="feature-slider-1">
						<div class="swiper-container">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-weight"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Crosfit Tools</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-gym-7"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Health Caring</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-gym-3"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>GYM Strategies</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-yoga-3"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Beauty & Spa</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-weight"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Crosfit Tools</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-gym-7"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Health Caring</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-gym-3"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>GYM Strategies</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="swiper-slide">
									<div class="feature-wrap">
										<div class="feature-icon-wrap">
											<div class="feature-icon">
												<i class="flaticon-yoga-3"></i>
											</div>
										</div>
										<div class="feature-details">
											<h3>Beauty & Spa</h3>
											<p>Many desktop publish pages and web page editw</p>
											<a href="about.html" class="read-more">
												READ MORE
												<i class="fas fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- If we need navigation buttons -->
						<div class="swiper-button-prev"><i class="far fa-angle-double-left"></i></div>
						<div class="swiper-button-next"><i class="far fa-angle-double-right"></i></div>
					</div>
				</div>
			</div>
		</div>
		<div class="feature-icon-thumb">
			<img src="assets/img/icon/icon-1.png" alt="icon">
		</div>
	</div>
	<!-- feature-area end -->

	<!-- service-area start -->
	<div class="service-area service-area-spacing pt-130">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-xl-12 col-lg-12">
					<div class="section-title-2 text-white text-center mb-60">
						<h3>We Offer Exclusive Services For Build Health</h3>
						<span>Services</span>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-xl-12">
					<div class="service-slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide single-slide">
									<div class="service-item">
										<div class="service-img">
											<img src="assets/img/service/service-1.jpg" alt="Services">
										</div>
										<div class="service-content">
											<div class="icon">
												<i class="flaticon-gym-7"></i>
											</div>
											<h3>Dumbbelling</h3>
											<p>Ratione voluptatem sequi neunte Neque porro quisquam estde.</p>
											<a href="service.html" class="read-more">
												READ MORE <i class="fas fa-angle-double-right"></i>
											</a>
											<span class="service-number">01</span>
										</div>
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="service-item">
										<div class="service-img">
											<img src="assets/img/service/service-2.jpg" alt="Services">
										</div>
										<div class="service-content">
											<div class="icon">
												<i class="flaticon-gym-5"></i>
											</div>
											<h3>Cycling GYM</h3>
											<p>
												Great pleasure. To take a trivial example, which of us ever utakes laborious physical
												exercise
											</p>
											<a href="service.html" class="read-more">
												READ MORE <i class="fas fa-angle-double-right"></i>
											</a>
											<div class="service-number">02</div>
										</div>
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="service-item">
										<div class="service-img">
											<img src="assets/img/service/service-3.jpg" alt="Services">
										</div>
										<div class="service-content">
											<div class="icon">
												<i class="flaticon-workout"></i>
											</div>
											<h3>Grid Training</h3>
											<p>Ratione voluptatem sequi neunte Neque porro quisquam estde.</p>
											<a href="service.html" class="read-more">
												READ MORE <i class="fas fa-angle-double-right"></i>
											</a>
											<div class="service-number">03</div>
										</div>
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="service-item">
										<div class="service-img">
											<img src="assets/img/service/service-4.jpg" alt="Services">
										</div>
										<div class="service-content white-color">
											<div class="icon">
												<i class="flaticon-fight"></i>
											</div>
											<h3>Boxing</h3>
											<p>Ratione voluptatem sequi neunte Neque porro quisquam estde.</p>
											<a href="service.html" class="read-more">
												READ MORE <i class="fas fa-angle-double-right"></i>
											</a>
											<div class="service-number">04</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="service-left-shape">
				<span class="flaticon-dumbbells"></span>
			</div>
			<div class="service-right-shape">
				<span class="flaticon-rings-1"></span>
			</div>
		</div>
		<div class="gradient-bg"></div>
	</div>
	<!-- service-area end -->

	<!-- about-area start -->
	<section class="about-area pt-130 pb-130">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 col-md-8">
					<div class="about-img mb-md-60 mb-xs-60">
						<img src="assets/img/thumb/thumb-1.jpg" alt="About image">
						<div class="line-animation-wrap">
							<div class="animation-wrap">
								<div class="line-item one"></div>
								<div class="line-item two"></div>
								<div class="line-item three"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="about-content">
						<div class="section-title mb-30">
							<h3>We Are More Effective To Making Different Yourself From Others</h3>
						</div>
						<div class="about-text">
							<p>
								Master-builder of human happiness. No one rejects dislikes or avoids pleasure itself
								because it is plsure but because those who do not know how to pursue pleasure rationally
								encounter consequences that are extremely painful again is there anyone
							</p>
							<a href="about.html" class="btn btn-theme mt-40">
								LEARN MORE <i class="fas fa-angle-double-right"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about-area end -->

	<!-- team-area start -->
	<div class="team-area pt-130 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-8">
					<div class="section-title-2 bar-theme-color mb-25">
						<h3>
							We Have Expert Team Member Meet Our Trainer
						</h3>
						<span>Team</span>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="team-wrap mb-30">
								<div class="team-img">
									<img src="assets/img/team/team.jpg" alt="Team">
									<div class="team-social-link">
										<ul>
											<li>
												<a href="#"><i class="fab fa-facebook-f"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-google"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="team-content">
									<h3><a href="trainer-details.html">Howard C. Skinner</a></h3>
									<span>Dumbbell Trainer</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="team-wrap mb-30">
								<div class="team-img">
									<img src="assets/img/team/team-2.jpg" alt="img">
									<div class="team-social-link">
										<ul>
											<li>
												<a href="#"><i class="fab fa-facebook-f"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-google"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="team-content">
									<h3><a href="trainer-details.html">Raymond L. Brown</a></h3>
									<span>Boxing Trainer</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="team-wrap mb-30">
								<div class="team-img">
									<img src="assets/img/team/team-3.jpg" alt="">
									<div class="team-social-link">
										<ul>
											<li>
												<a href="#"><i class="fab fa-facebook-f"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-google"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="team-content">
									<h3><a href="trainer-details.html">Charles T. McAllister</a></h3>
									<span>Caradio Trainer</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="team-wrap mb-30">
								<div class="team-img">
									<img src="assets/img/team/team-4.jpg" alt="">
									<div class="team-social-link">
										<ul>
											<li>
												<a href="#"><i class="fab fa-facebook-f"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="#"><i class="fab fa-google"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="team-content">
									<h3><a href="trainer-details.html">Solomon K. Sawyers</a></h3>
									<span>Beauty Trainer</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="team-right mb-30">
			<img src="assets/img/team/team-5.jpg" alt="team">
			<div class="team-button">
				<a href="trainer.html" class="btn btn-gra">VIEW ALL TRAINER <i class="fas fa-angle-double-right"></i></a>
			</div>
		</div>
		<div class="gray-bg"></div>
	</div>
	<!-- team-area end -->

	<!-- process-area start -->
	<div class="process-area pt-130 pb-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-12">
					<div class="section-title-2 text-white bar-theme-color text-center mb-35">
						<h3>
							We Do Our Work By Following Some Steps
						</h3>
						<span>Process</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="process-wrap mb-30">
						<div class="process-icon-wrap">
							<div class="process-icon">
								<i class="flaticon-running"></i>
								<span class="process-number">01</span>
							</div>
						</div>
						<div class="process-content">
							<h3>Visit Our Gymee</h3>
							<p>Soluta nobis est eligedi optio cumque nihil impedit quo</p>
						</div>
						<div class="process-next">
							<i class="fas fa-forward"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="process-wrap mb-30">
						<div class="process-icon-wrap red-gradient">
							<div class="process-icon">
								<i class="fas fa-recycle"></i>
								<span class="process-number">02</span>
							</div>
							<div class="process-next">
								<i class="fas fa-forward"></i>
							</div>
						</div>
						<div class="process-content">
							<h3>Time Maintenance</h3>
							<p>Actual teachings of the great explorer of the truth</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="process-wrap mb-30">
						<div class="process-icon-wrap red-gradient">
							<div class="process-icon">
								<i class="flaticon-gym-2"></i>
								<span class="process-number">03</span>
							</div>
						</div>
						<div class="process-content">
							<h3>Hard Work Out</h3>
							<p>Pursue pleasure ratio encoter consequences that are</p>
						</div>
						<div class="process-next">
							<i class="fas fa-forward"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="process-wrap mb-30">
						<div class="process-icon-wrap">
							<div class="process-icon">
								<i class="flaticon-abdominal"></i>
								<span class="process-number">04</span>
							</div>
						</div>
						<div class="process-content">
							<h3>Get Result</h3>
							<p>Take a trivial example which of us ever underts</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="process-shape-1">
			<img src="assets/img/shape/shape-1.png" alt="shape">
		</div>
		<div class="process-shape-2">
			<img src="assets/img/shape/shape-2.png" alt="shape">
		</div>
	</div>
	<!-- process-area end -->

	<!-- calculator-area start -->
	<div class="calculator-area pt-130 pb-100">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-6 offset-lg-6">
					<div class="calculator-chart mb-70">
						<h3>BMI Calculator Chart</h3>
						<table class="table bg-white">
							<thead>
							<tr>
								<th scope="col">BMI</th>
								<th scope="col">Weight Status</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Below 18.5</td>
								<td>Underweight</td>
							</tr>
							<tr>
								<td>18.5 - 24.9</td>
								<td>Healthy</td>
							</tr>
							<tr>
								<td>25.0 - 29.9</td>
								<td>Overweight</td>
							</tr>
							<tr>
								<td>30.0 - and Above</td>
								<td>Obese</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="calculator-form">
						<h3>BMI Calculator Chart</h3>
						<form action="#">
							<div class="input-wrap">
								<input type="text" placeholder="Height/cm">
							</div>
							<div class="input-wrap">
								<input type="text" placeholder="Weight/kg">
							</div>
							<div class="input-wrap">
								<input type="text" placeholder="Weight/kg">
							</div>
							<div class="input-wrap">
								<select id="gender">
									<option value="gender">Gender</option>
									<option value="male">Male</option>
									<option value="fmale">fmale</option>
								</select>
							</div>
							<div class="input-wrap">
								<select id="factory">
									<option value="factory">Activity Factory</option>
									<option value="one">One</option>
									<option value="two">Two</option>
								</select>
							</div>
							<div class="input-wrap">
								<a href="#" class="btn btn-gra">
									Calculate <i class="fas fa-angle-double-right"></i>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="calculator-thumb">
			<img src="assets/img/thumb/thumb-2.png" alt="thumb">
		</div>
		<div class="calculator-shape-1">
			<img src="assets/img/shape/shape-3.png" alt="shape">
		</div>
		<div class="calculator-shape-2">
			<img src="assets/img/shape/shape-4.png" alt="shape">
		</div>
	</div>
	<!-- calculator-area end -->

	<!-- schedule-area start -->
	<div class="schedule-area pt-130 pb-130">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="section-title-2 bar-theme-color text-center mb-35">
						<h3>
							Our Class Schedule We Making Scdedule Perfectly
						</h3>
						<span>Schedule</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12">
					<div class="schedule-table">
						<table class="table bg-white">
							<thead>
							<tr>
								<th>Routine</th>
								<th>10 am</th>
								<th>11 am</th>
								<th>03 pm</th>
								<th>05 pm</th>
								<th>07 pm</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td class="day">Sunday</td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td class="day">Monday</td>
								<td></td>
								<td class="active">
									<h4>Boxing</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="day">Tuesday</td>
								<td class="active">
									<h4>Yoga</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td></td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td class="active">
									<h4>Boxing</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="day">Wednesday</td>
								<td class="active">
									<h4>Gym</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Yoga</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Yoga</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="day">Thursday</td>
								<td></td>
								<td class="active">
									<h4>Racing</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td class="day">Friday</td>
								<td class="active">
									<h4>Dumbbelling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Grid Training</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
								<td class="active">
									<h4>Jumping</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="day">Satarday</td>
								<td></td>
								<td></td>
								<td class="active">
									<h4>Grid Training</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td class="active">
									<h4>Cycling</h4>
									<p>10 am - 11 am</p>
									<div class="hover">
										<h4>Cycling</h4>
										<p>10 am - 11 am</p>
										<span>Zakila Russow</span>
									</div>
								</td>
								<td></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- schedule-area end -->

	<!-- testimonial-area start -->
	<div class="testimonial-area pt-130 pb-130" data-background="assets/img/bg/testimonial-bg.jpg" data-overlay="dark"
	     data-opacity="4">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="section-title-2 text-white bar-theme-color mb-35">
						<h3>
							What Our Clients Say About Our Services
						</h3>
						<span>Says</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-8 col-md-10">
					<div class="testimonial-slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide single-slide">
									<div class="testimonial-wrap">
										<div class="author-info">
											<img src="assets/img/author/author-1.jpg" alt="author">
											<div class="author-content">
												<h4>Dustin R. Gardner</h4>
												<span>CEO & Founder (DL)</span>
											</div>
										</div>
										<div class="testimonial-content">
											<p>Pleasure itself because ecse
												those who not know pleasures
												rationally take trivial example
												which ever underti mistakens
												idea of denouncing pleasure</p>
											<ul>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
											</ul>
										</div>
										<div class="testimonial-icon">
											<i class="fab fa-twitter"></i>
										</div>
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="testimonial-wrap">
										<div class="author-info">
											<img src="assets/img/author/author-1.jpg" alt="author">
											<div class="author-content">
												<h4>Dustin R. Gardner</h4>
												<span>CEO & Founder (DL)</span>
											</div>
										</div>
										<div class="testimonial-content">
											<p>Pleasure itself because ecse
												those who not know pleasures
												rationally take trivial example
												which ever underti mistakens
												idea of denouncing pleasure</p>
											<ul>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
											</ul>
										</div>
										<div class="testimonial-icon">
											<i class="fab fa-twitter"></i>
										</div>
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="testimonial-wrap">
										<div class="author-info">
											<img src="assets/img/author/author-1.jpg" alt="author">
											<div class="author-content">
												<h4>Dustin R. Gardner</h4>
												<span>CEO & Founder (DL)</span>
											</div>
										</div>
										<div class="testimonial-content">
											<p>Pleasure itself because ecse
												those who not know pleasures
												rationally take trivial example
												which ever underti mistakens
												idea of denouncing pleasure</p>
											<ul>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star"></i></li>
												<li><i class="fas fa-star-half-alt"></i></li>
											</ul>
										</div>
										<div class="testimonial-icon">
											<i class="fab fa-twitter"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- If we need navigation buttons -->
						<div class="swiper-button-prev"><i class="far fa-angle-double-left"></i></div>
						<div class="swiper-button-next"><i class="far fa-angle-double-right"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonial-area end -->

	<!-- product-area start -->
	<div class="product-area pt-130 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="section-title-2 bar-theme-color text-center mb-35">
						<h3>
							Our Popular Product Visit Store To Buy Gym Product
						</h3>
						<span>Product</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="product-wrap mb-30">
						<div class="product-img">
							<img src="assets/img/product/product-1.png" alt="product">
							<div class="product-badge">New</div>
							<div class="product-card">
								<ul>
									<li>
										<a href="#"><i class="far fa-heart"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-expand"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-exchange-alt"></i></a>
									</li>
								</ul>
							</div>
							<div class="cart-btn">
								<a href="shop-2.html" class="btn btn-gra">add to cart <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="product-content">
							<h3>
								<a href="shop-2.html">Red Boxing Gloves</a>
							</h3>
							<span class="price">$205.00</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="product-wrap mb-30">
						<div class="product-img">
							<img src="assets/img/product/product-2.png" alt="product">
							<div class="product-card">
								<ul>
									<li>
										<a href="#"><i class="far fa-heart"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-expand"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-exchange-alt"></i></a>
									</li>
								</ul>
							</div>
							<div class="cart-btn">
								<a href="shop-2.html" class="btn btn-gra">add to cart <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="product-content">
							<h3>
								<a href="shop-2.html">New Sports Jercy</a>
							</h3>
							<span class="price">$30.00</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="product-wrap mb-30">
						<div class="product-img">
							<img src="assets/img/product/product-3.png" alt="product">
							<div class="product-badge">New</div>
							<div class="product-card">
								<ul>
									<li>
										<a href="#"><i class="far fa-heart"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-expand"></i></a>
									</li>
									<li>
										<a href="#"><i class="fas fa-exchange-alt"></i></a>
									</li>
								</ul>
							</div>
							<div class="cart-btn">
								<a href="shop-2.html" class="btn btn-gra">add to cart <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
						<div class="product-content">
							<h3>
								<a href="shop-2.html">Vitamin Pill Product</a>
							</h3>
							<span class="price">$405.00</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- product-area end -->

	<!-- brand-area start -->
	<div class="brand-area pt-70 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="brand-slider">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-1.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-2.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-3.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-4.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-5.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-6.png" alt="brand">
									</div>
								</div>
								<div class="swiper-slide single-slide">
									<div class="brand-wrap">
										<img src="assets/img/brand/brand-1.png" alt="brand">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- brand-area end -->
</main>

<!--    footer-area start    -->
<footer class="footer-area">
	<div class="footer-top" data-background="assets/img/bg/footer-bg.jpg">
		<div class="container">
			<div class="footer-top-bg">
				<div class="row">
					<div class="col-lg-6">
						<div class="footer-newsletter mb-40">
							<h3>Newsletters Subscribe</h3>
							<form action="#" class="news-form">
								<div class="input-wrap">
									<input type="email" placeholder="Enter Your Email">
									<button><i class="fas fa-angle-double-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="footer-apps mb-40">
							<h3>Download Our Apps</h3>
							<div class="btn-wrap">
								<a href="#" class="btn btn-secondary rounded-pill mr-10">
									<i class="fab fa-android"></i> Google Store
								</a>
								<a href="#" class="btn btn-gra rounded-pill">
									<i class="fab fa-windows"></i> Windows
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-80 pb-40">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widgets footer-about-widget">
						<div class="footer-logo">
							<a href="index.html">
								<img src="assets/img/logo/logo-white.png" alt="Logo">
							</a>
						</div>
						<p>
							Ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
							sit amet, consectetur, adipisci velit, sed quia non um quam eius modi tempora incidunt ut
							labore et magnam aliquam quaerat voluptatem.
						</p>
						<a class="read-more" href="about.html">
							Learn more <i class="fas fa-angle-double-right"></i>
						</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widgets latest-news">
						<h3 class="widget-title">Useful Links</h3>
						<div class="news-wrap">
							<div class="news-img">
								<a href="#">
									<img src="assets/img/widget/widget-1.png" alt="widget">
								</a>
							</div>
							<div class="news-content">
								<h4>
									<a href="blog-details.html">
										Monthly Web Develop UpdateFunctional CSS, Android
									</a>
								</h4>
								<span><i class="fas fa-calendar-alt"></i> 05 Jan 20</span>
							</div>
						</div>
						<div class="news-wrap">
							<div class="news-img">
								<a href="#">
									<img src="assets/img/widget/widget-2.png" alt="widget">
								</a>
							</div>
							<div class="news-content">
								<h4>
									<a href="blog-details.html">
										We're Touring Southeast Asia Join To Mozilla Developer
									</a>
								</h4>
								<span><i class="fas fa-calendar-alt"></i> 05 Jan 20</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widgets contact-widget">
						<h3 class="widget-title">Contact Us</h3>
						<ul>
							<li>
								<i class="fas fa-home"></i>
								<span>No.123 Chalingt Gates, Supper market New York</span>
							</li>
							<li>
								<a href=#"">
									<i class="fas fa-envelope"></i>
									<span>support@gmail.com</span>
								</a>
							</li>
							<li>

								<a href="#">
									<i class="fas fa-phone"></i>
									<span>+012 (4567) 789</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-7 col-lg-6">
					<div class="copyright">
						<p>Copyright <a href="index.html">GYMEE</a> ©2020. All Rights Reserved</p>
					</div>
				</div>
				<div class="col-md-5 col-lg-6">
					<div class="footer-social-link">
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
	</div>
</footer>
<!--    footer-area end    -->

<div id="scrollUp"><i class="fas fa-level-up-alt"></i></div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/jquery.knob.min.js"></script>
<script src="assets/js/odometer.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from www.devsnews.com/template/gymee/gymee/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Sep 2022 14:10:46 GMT -->
</html>