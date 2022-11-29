@extends('layouts.frontend.master')
@section('title', 'Xác Minh')
@section('content')
<main>
    <!--    breadcrumb-area start    -->
    <section class="breadcrumb-area pt-180 pb-180 pt-md-120 pb-md-120 pt-xs-100 pb-xs-100 bg-fix" data-overlay="black" data-opacity="7" data-background="assets/img/bg/breadcrumb-bg-4.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="breadcrumb-content">
                        <h3 class="title">Đăng kí</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li class="active">Đăng kí</li>
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
            <div class="row justify-content-between mt-100">
                <div class="col-md-6 col-lg-5">
                    <div class="contact-text text-left">
                        <div class="about-img-2 mb-70">
                            <img src="{{asset('frontend/assets/img/thumb/thumb-4.jpg')}}" alt="about">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="contact-form contact-form-2">
                        <h1 class="text-center">XÁC MINH</h1>
                        <form action="{{route('post_very_email', $email)}}" method="post">
                            @csrf
                            <div class="row">
                                @if(session()->has('error'))
                                <div class="col-xl-12">
                                    <span class="text-danger"><strong>{{session()->get('error')}}</strong></span>
                                </div>
                                @else
                                <div class="col-xl-12">
                                    <span class="text-danger"><strong>Mã xác minh gồm 6 chữ số đã được gửi về gmail của bạn !</strong></span>
                                </div>
                                @endif
                                <div class="col-xl-12">
                                    <div class="input-wrap input-icon icon-msg">
                                        <input type="text" placeholder="Nhập mã xác minh" name="code" value="{{old('code')}}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" class="btn btn-gra">
                                        XÁC MINH <i class="fas fa-angle-double-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection