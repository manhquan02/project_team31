<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./profile.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"
      
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
  </head>
  <style>
    /* Profile_page */
body {
  background: #dcdcdc;
  margin-top: 20px;
}
.profile-cover {
  position: relative;
  z-index: 0;
}

.panel {
  margin-bottom: 30px;
  color: #696969;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
}

.profile-cover__action {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  padding: 120px 30px 10px 153px;
  border-radius: 5px 5px 0 0;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-pack: end;
  -webkit-box-pack: end;
  justify-content: flex-end;
  overflow: hidden;
  background: url(https://bootdey.com/img/Content/bg1.jpg) no-repeat;
  background-size: cover;
}

.profile-cover__action > .btn {
  margin-left: 10px;
  margin-bottom: 10px;
}

.profile-cover__img {
  position: absolute;
  top: 120px;
  left: 30px;
  text-align: center;
  z-index: 1;
}

.profile-cover__img > img {
  max-width: 120px;
  border: 5px solid #fff;
  border-radius: 50%;
}

.profile-cover__img > .h3 {
  color: #393939;
  font-size: 20px;
  line-height: 30px;
}

.profile-cover__img > img + .h3 {
  margin-top: 6px;
}

.profile-cover__info .nav {
  margin-right: 28px;
  padding: 15px 0 10px 170px;
  color: #999;
  font-size: 16px;
  line-height: 26px;
  font-weight: 300;
  text-align: center;
  text-transform: uppercase;
  -ms-flex-pack: end;
  -webkit-box-pack: end;
  justify-content: flex-end;
}

/* .profile-cover__info .nav li {
margin-top: 13px;
margin-bottom: 13px;
}

.profile-cover__info .nav li:not(:first-child) {
margin-left: 30px;
padding-left: 30px;
border-left: 1px solid #eee;
}

.profile-cover__info .nav strong {
display: block;
margin-bottom: 10px;
color: #e16123;
font-size: 34px;
} */

@media (min-width: 481px) {
  .profile-cover__action > .btn {
    min-width: 125px;
  }

  .profile-cover__action > .btn > span {
    display: inline-block;
  }
}

@media (max-width: 600px) {
  .profile-cover__info .nav {
    display: block;
    margin: 90px auto 0;
    padding-left: 30px;
    padding-right: 30px;
  }

  .profile-cover__info .nav li:not(:first-child) {
    margin-top: 8px;
    margin-left: 0;
    padding-top: 18px;
    padding-left: 0;
    border-top: 1px solid #eee;
    border-left-width: 0;
  }
}

.panel {
  margin-bottom: 30px;
  color: #696969;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
}


/* profile  */
        body {
    /* background: rgb(23, 11, 27) */
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    /* background: #342836; */
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
  </style>
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
                  <a
                    href="./profile.html"
                    class="nav-link text-white text-uppercase text-bold"
                    >Thông tin cá nhân</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href="./schedule.html"
                    class="nav-link text-white text-uppercase text-bold"
                    >Lịch trinh tập luyện</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href="./updateMK.html"
                    class="nav-link text-white text-uppercase text-bold"
                    >Đổi mật khẩu</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    href=""
                    class="nav-link text-white text-uppercase text-bold"
                  ></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="container">
        @yield('content')
        
      </div>
      
    </div>
  </body>
</html>
