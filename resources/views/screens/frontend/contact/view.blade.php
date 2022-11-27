@extends('layouts.frontend.master')
@section('title', translate('Contact'))
@section('content')
<main>
        <!--    breadcrumb-area start    -->
        <section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix" data-overlay="black"
                 data-opacity="7" data-background="assets/img/bg/breadcrumb-bg-4.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="breadcrumb-content">
                            <h3 class="title">Liên Hệ</h3>
                            <ul>
                                <li><a href="index.html">Trang chủ</a></li>
                                <li class="active">Liên hệ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    breadcrumb-area end    -->
    
        <!-- contact-area start -->
        <div class="contact-area-2 pt-130 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="contact-info contact-info-2 justify-content-end">
                            <div class="icon-box">
                                <i class="flaticon-whatsapp"></i>
                            </div>
                            <div class="info-content">
                                <h4>Contact me</h4>
                                <span>+012 (345) 6789</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="contact-info contact-info-2 justify-content-end">
                            <div class="icon-box">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info-content">
                                <h4>Email us</h4>
                                <span>suport@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="contact-info contact-info-2 justify-content-end">
                            <div class="icon-box">
                                <i class="flaticon-pin"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <span>670 New Road, USA</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between mt-100">
                    <div class="col-md-6 col-lg-5">
                        <div class="contact-text text-left">
                            <div class="section-title-2 bar-theme-color contact-title">
                                <h3>Feel Feel Don't Hesitate To Contact With Us Or Email Us</h3>
                            </div>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus erro sit voluptatem accusantium dolorem datotamc
                                rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                            </p>
                            <a href="#" class="read-more">
                                Get started <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="contact-form contact-form-2">
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-wrap input-icon icon-name">
                                            <input type="text" placeholder="Full name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-wrap input-icon icon-phone">
                                            <input type="text" placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                    <div class="input-wrap input-icon icon-email">
                                            <input type="text" placeholder="Email address">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-wrap input-icon icon-msg">
                                            <textarea rows="5" placeholder="Write Message" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="btn btn-gra">
                                            Send message <i class="fas fa-angle-double-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area end -->
    </main>
@endsection