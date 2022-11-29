<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="panel profile-cover">
            <div class="profile-cover__img">
              <img
                src="https://bootdey.com/img/Content/avatar/avatar6.png"
                alt=""
              />
              <h3 class="h3">Nguyễn Tiến Hoàng</h3>
            </div>
            <div class="profile-cover__action bg--img" data-overlay="0.3">
              <button class="btn btn-rounded btn-info">
                <i class="fa fa-plus"></i>
                <span>Follow</span>
              </button>
              <button class="btn btn-rounded btn-info">
                <i class="fa fa-comment"></i>
                <span>Message</span>
              </button>
            </div>
            <div class="bg-light my-6">
              <br style="padding: 30 0 30 0" />
              <br style="padding: 30 0 30 0" />
              <br style="padding: 30 0 30 0" />
              <br style="padding: 30 0 30 0" />
              <br style="padding: 30 0 30 0" />
            </div>
            <div class="profile-cover__info bg-dark">
              <nav class="navbar navbar-expand-sm bg-dark text-white">
                <div class="container-fluid">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="./profile.html" class="nav-link text-white text-uppercase text-bold">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                      <a href="./schedule.html" class="nav-link text-white text-uppercase text-bold">Lịch trinh tập luyện</a>
                    </li>
                    <li class="nav-item">
                      <a href="./updateMK.html" class="nav-link text-white text-uppercase text-bold">Đổi mật khẩu</a>
                    </li>
                    <li class="nav-item"><a href="" class="nav-link text-white text-uppercase text-bold"></a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        <div class="row">
            
            <div style="margin-top: 10px ; padding-top: 20px;" class=" border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Họ Và Tên</label>
                            <input type="text" class="form-control" placeholder="Họ Và Tên" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Ngày Sinh</label>
                            <input type="number" class="form-control" value="" placeholder="Ngày Sinh"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Số Điện Thoại</label>
                            <input type="text" class="form-control" placeholder="Số Điện Thoại" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="Email" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa Chỉ" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Giới Tính</label>
                            <input type="text" class="form-control" placeholder="Giới Tính" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Cân nặng</label>
                            <input type="text" class="form-control" placeholder="Cân nặng" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Chiều cao</label>
                            <input type="text" class="form-control" placeholder="Chiều cao" value="">
                        </div>
                        <div class=" col-md-12 mt-2">
                            <h4 class="labels text-bold text-uppercase">Thông tin gói tập</h4>
                            <!-- <input type="text" class="form-control" placeholder="Thông tin gói tập" value=""> -->
                            <div class="row mt-2" >
                                <p class="text-left col-md-6 ">Tên Gói Tập : Gói thường</p>
                                <span class="col-md-6">Giá : 300000 VND</span>
                            </div>
                            <p>Bao Gồm :  Gym + boxing + bơi</p>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Số Buổi tập còn lại</label>
                            <input type="number" class="form-control" placeholder="Số Buổi tập còn lại" value="">
                        </div>
                    </div>
                 
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>
</body>
</html>