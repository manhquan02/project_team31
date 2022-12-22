<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('frontend/assets/css/account/account.css')}}">
<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" style="color: rgb(0, 0, 0);" href="{{route('home')}}" target="_blank">Về trang chủ</a>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="max-height: 500px; background-image: url({{asset('frontend/assets/img/gallery/gallery-17.jpg')}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <!-- <span class=" bg-gradient-default opacity-8"></span> -->
      <span class="mask bg-gradient-default opacity-8"></span>

      <!-- Header container -->
      <div style="margin-right: 300px" class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1  class="display-2 text-white">
                <img width="250px" src="{{asset('frontend/assets/img/logo/logo-white.png')}}" alt="">
            </h1>
            <p class="text-white mt-0 mb-5">Vì một sức khoẻ tốt && Vì một con người đẹp </p>
            <!-- <a href="#!" class="btn btn-info">Edit profile</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        
        <div class="col-xl-3 order-xl-1 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div  class="card-profile-image">
                  <a href="#">
                    <img src="{{asset(Auth::check() ? Auth::user()->avatar : 'https://vtv1.mediacdn.vn/thumb_w/650/2014/incognito-chrome-spicytricks-1420018283508.jpg')}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                {{-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a> --}}
              </div>
            </div>
            <div style="margin-top: 20px" class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-2">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  {{Auth::user()->name}}
                  {{-- <span class="font-weight-light">, 27</span> --}}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4">
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-9 order-xl-2">
          <div class="card bg-secondary shadow">
            <div style="border: 2px dotted;" class="card-header bg-white border-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-profile">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    @hasrole('member')
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link navbar-profile-li" href="{{route('account.profile')}}">Thông tin cá nhân</a>
                        </li>
                        <li class="nav-item">
                            <div style="color: #16181b;" class="nav-link navbar-profile-li" >|</div>
                          </li>
                        <li class="nav-item active">
                            <a class="nav-link navbar-profile-li"  href="{{route('account.schedule')}}">Lịch tập </a>
                        </li>
                        <li class="nav-item">
                          <div style="color: #16181b;" class="nav-link navbar-profile-li" >|</div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link navbar-profile-li"  href="#">Chỉ số cơ thể </a>
                        </li>
                      </ul>
                    </div>
                    @endhasrole
                    @hasrole('coach')
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item active">
                            <a class="nav-link navbar-profile-li" href="{{route('accountPt.profile')}}">Thông tin cá nhân</a>
                          </li>
                          <li class="nav-item">
                              <div style="color: #16181b;" class="nav-link navbar-profile-li" >|</div>
                            </li>
                          <li class="nav-item active">
                              <a class="nav-link navbar-profile-li"  href="{{route('accountPt.scheduleCoach')}}">Lịch dạy </a>
                          </li>
                          <li class="nav-item">
                            <div style="color: #16181b;" class="nav-link navbar-profile-li" >|</div>
                          </li>
                          <li class="nav-item active">
                              <a class="nav-link navbar-profile-li"  href="#">Chỉ số cơ thể </a>
                          </li>
                          <li class="nav-item">
                              <div style="color: #16181b;" class="nav-link navbar-profile-li" >|</div>
                            </li>
                          <li class="nav-item active">
                              <a class="nav-link navbar-profile-li"  href="#">Danh sách hội viên </a>
                          </li>
                          
                        </ul>
                      </div>
                    @endhasrole
                  </nav>
            </div>
            <!-- <br> -->
             @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')