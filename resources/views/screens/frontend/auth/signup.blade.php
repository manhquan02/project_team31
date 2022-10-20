<!DOCTYPE html>
<html>

<!-- Mirrored from colorlib.com/etc/regform/colorlib-regform-22/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 15:16:51 GMT -->
<head>
<meta charset="utf-8">
<title>RegistrationForm_v6 by Colorlib</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="auth/css/style.css">
<meta name="robots" content="noindex, follow">
<script nonce="4ae6ad6d-5db4-4cd4-baa3-130fdff60bf4">(function(w,d){!function(Z,_,ba,bb){Z.zarazData=Z.zarazData||{};Z.zarazData.executed=[];Z.zaraz={deferred:[],listeners:[]};Z.zaraz.q=[];Z.zaraz._f=function(bc){return function(){var bd=Array.prototype.slice.call(arguments);Z.zaraz.q.push({m:bc,a:bd})}};for(const be of["track","set","debug"])Z.zaraz[be]=Z.zaraz._f(be);Z.zaraz.init=()=>{var bf=_.getElementsByTagName(bb)[0],bg=_.createElement(bb),bh=_.getElementsByTagName("title")[0];bh&&(Z.zarazData.t=_.getElementsByTagName("title")[0].text);Z.zarazData.x=Math.random();Z.zarazData.w=Z.screen.width;Z.zarazData.h=Z.screen.height;Z.zarazData.j=Z.innerHeight;Z.zarazData.e=Z.innerWidth;Z.zarazData.l=Z.location.href;Z.zarazData.r=_.referrer;Z.zarazData.k=Z.screen.colorDepth;Z.zarazData.n=_.characterSet;Z.zarazData.o=(new Date).getTimezoneOffset();Z.zarazData.q=[];for(;Z.zaraz.q.length;){const bl=Z.zaraz.q.shift();Z.zarazData.q.push(bl)}bg.defer=!0;for(const bm of[localStorage,sessionStorage])Object.keys(bm||{}).filter((bo=>bo.startsWith("_zaraz_"))).forEach((bn=>{try{Z.zarazData["z_"+bn.slice(7)]=JSON.parse(bm.getItem(bn))}catch{Z.zarazData["z_"+bn.slice(7)]=bm.getItem(bn)}}));bg.referrerPolicy="origin";bg.src="../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));bf.parentNode.insertBefore(bg,bf)};["complete","interactive"].includes(_.readyState)?zaraz.init():Z.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body>
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="auth/images/registration-form-6.jpg" alt="">
        </div>
        <form action="{{route('postSignup')}}" method="POST">
            @csrf
            @method('post')
            <h3>Make An Appointment</h3>
            <div class="form-row">
                <input type="text" name="name" class="form-control" placeholder="Name">
                <input type="text" name="email" class="form-control" placeholder="Mail">
            </div>  
            <div class="form-row">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>  
            <div class="form-row">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
                <div class="form-holder">
                    <select name="gender" id="" class="form-control">
                        <option value="" disabled selected>Sex</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Bí mật</option>
                    </select>
                    <i class="zmdi zmdi-chevron-down"></i>
                </div>
            </div>
                <textarea name="address" id="" placeholder="Address" class="form-control" style="height: 130px;"></textarea>
            <button>Signup Now
                <i class="zmdi zmdi-long-arrow-right"></i>
            </button>
        </form>
    </div>
</div>
<script src="auth/js/jquery-3.3.1.min.js"></script>
<script src="auth/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"75ca7a2ce964e2bf","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.10.3","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from colorlib.com/etc/regform/colorlib-regform-22/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Oct 2022 15:16:52 GMT -->
</html>