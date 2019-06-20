<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
    <link rel="shortcut icon" type="image/x-icon" href="/Content/Images/Index/logo.png" />

    <!--------------------------------------Bootstrap CSS--------------------------------------------->
    <link href="public/vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!----------------------------------------------------------------------------------->
    <link href="public/vendor/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css" rel="stylesheet" />

    <!----------------------------------------PagedList----------------------------------------------->
    <link href="public/vendor/PagedList.css" rel="stylesheet" />

    <!-------------------------------------Owl Carousel CSS------------------------------------------>
    <link href="public/vendor/owl carousel 2/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="public/vendor/owl carousel 2/assets/owl.theme.default.min.css" rel="stylesheet" />

    <!-----------------------------------Ekko lightbox CSS------------------------------------------->
    <link href="public/vendor/ekko lightbox/ekko-lightbox.css" rel="stylesheet" />

    <!----------------------------------------AOS CSS------------------------------------------------>
    <link href="public/vendor/aos/aos.css" rel="stylesheet" />

    <!----------------------------------------Fontawesome CSS---------------------------------------->
    <link href="public/vendor/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!---------------------------------------Custom CSS---------------------------------------------->
    <link href="public/user/css/usercustom.css" rel="stylesheet" />
    <link href="public/shared/common.css" rel="stylesheet" />
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <title>IHTGO - Trang Chủ</title>


</head>

<body class="body-container">
    <!---------------------------HEADER------------------------------->
    <header>
        <!---------------------First Header----------------------->
        <div class="firstheader">
            <h1 class="brand">một thành viên của iht group</h1>
            <ul class="rightside">
                <li class="">0902 926 925</li>
                <li class="">ihtgo.vn@gmail.com</li>
                <li class="">Thứ 2 - 6: 8h - 17h</li>
                <li class="">Thứ 7: 8h - 12h</li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#!">Văn phòng HCM<span class="caret"></span></a>
                    <ul class="dropdown-menu drop-vanphong">
                        <li><a href="#!">Lầu 3, tòa nhà Thành An, số 8 Bà Triệu, P.12<br />Quận 5, TP. HCM</a></li>
                        <li><a href="#!">1610 Võ Văn Kiệt, P7<br />Quận 6, TP. HCM</a></li>
                        <li><a href="#!">3A 64/3 Ấp 3, Xã Phạm Văn Hai<br /> H. Bình Chánh, TP. HCM</a></li>
                        <li><a href="#!">91 Tô Ký<br />Đông Hưng Thuận, Quận 12, TP. HCM</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#!">Văn phòng BD<span class="caret"></span></a>
                    <ul class="dropdown-menu drop-vanphong">
                        <li><a href="#!">C04-05 Đường DA1-1<br />LCG Rubyland, KCN Mỹ Phước II – BC BD</a></li>
                        <li><a href="#!">H10 Lý Thái Tổ, TP Mới Bình Dương<br />Phường Phú Hòa, TXTD1, Bình Dương</a></li>
                        <li><a href="#!">32/1 Đại lộ Hữu Nghị, Khu CN VSIP1<br />Phường Bình Hòa, TX. Thuận An, Bình Dương</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#!">Văn phòng Đồng Nai<span class="caret"></span></a>
                    <ul class="dropdown-menu drop-vanphong">
                        <li><a href="#!">100 KP. Bình Dương, P. Long Bình Tân,<br />Biên Hòa, Đồng Nai.</a></li>


                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

        <!---------------------Second Header---------------------->
        <div id="responsive-barID" class="responsive-bar secondHeadPhoneFix">
            <div style="float:left;">
                <h4>0902 926 925</h4>
                <h4>ihtgo.vn@gmail.com</h4>
            </div>
            <h4 id="responsive-bar-menu" class="menu"><span class="glyphicon glyphicon-menu-hamburger"></span></h4>
            <div style="clear:both;"></div>
        </div>
        <nav class="secondheader secondHeadPhoneFix">
            <h1 class="brandlogo"><a href="{!! url('/'); !!}"><img class="logo-image" src="public/Images/Index/logo.png" alt="logo" title="logo" /></a></h1>
            <ul class="header-link">
                <li class="active"><a href="{!! url('/'); !!}"><strong>TRANG CHỦ</strong></a></li>
                <li class=""><a href="gioi-thieu">GIỚI THIỆU</a></li>
                <li class=""><a href="bang-gia"><strong>BẢNG GIÁ</strong></a></li>
                <li class=" "><a href="tin-tuc"><strong>TIN TỨC</strong></a></li>
                <li class=""><a class="btn btndatgiaohang" href="https://ihtgo.page.link/ihtgo-app "><strong>ĐẶT GIAO HÀNG NGAY</strong></a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
    </header>
    @yield('content')
    <!---------------------------FOOTER------------------------------->
    <footer>
        <div class="footer-imgcontent">
            <div class="w100 footer-imgcontent-inner">
                <div class="col-md-8 col-md-push-2">
                    <div class="imgcont-headtitle">
                        <h2 data-aos="fade-down">
                            <span style="font-weight:700;">TẢI NGAY ỨNG DỤNG</span><span> IHT GO</span>
                        </h2>
                        <p data-aos="fade-up">Tải và cài đặt ứng dụng IHT GO <br /> trên Google Play và App Store, Web App</p>
                    </div>
                </div>
                <div class="w100 col-md-12 imgcont-icon">
                    <div class="imgcont-icon-innner">
                        <a href="https://itunes.apple.com/vn/app/iht-giao-h%C3%A0ng/id1451150698?mt=8&ign-mpt=uo%3D4">
                            <i class="fab fa-apple fa-inverse fa-3x" aria-hidden="true"></i>

                            <span>App Store</span>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.yousoft.giaohang&hl=vi">
                            <i class="fab fa-android fa-inverse fa-3x" aria-hidden="true"></i>
                            <span>Google Play</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-middle">
            <div class="w100">
                <div class="col-md-6 footMid1stCol">
                    <p class="text-uppercase"><strong>IHT GO một thành viên của IHT LOGISTICS co., LTD</strong></p>
                    <ul class="list-unstyled">
                        <li>Địa chỉ: số 8 Bà Triệu, Tòa nhà THÀNH AN, P.12, Q.5, TP.HCM</li>
                        <li>ĐT: (028) 38380888</li>
                        <li>MST: 0310212371</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <li><a class="decNone" href="#!">Chính sách bảo mật</a></li>
                        <li><a class="decNone" href="#!">Các điều khoản và điều kiện</a></li>
                        <li><a class="decNone" href="#!">Tuyển dụng</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <p><strong>HỆ THỐNG CHI NHÁNH</strong></p>
                    <ul class="list-unstyled">
                        <li><a class="decNone" href="#!"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Hồ Chí Minh</a></li>
                        <li><a class="decNone" href="#!"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Bình Dương</a></li>
                        <li><a class="decNone" href="#!"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Đồng Nai</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid center-text footer-bottom" style="background: #dcdcdc; padding-top: 10px;">
            <p style="color:#707070;">Copyright &#9400; 2018 IHTGO. Design by IHT</p>
        </div>
    </footer>

    <!-- The scroll to top feature -->
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-arrow-up"></i>
        </span>
    </div>

    <!---------------------------------Jquery JS------------------------------------------>
    <script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>

    <!--------------------------------Bootstrap JS---------------------------------------->
    <script src="public/vendor/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

    <!--------------------------------Ekko lightbox JS-------------------------------------->
    <script src="public/vendor/ekko lightbox/ekko-lightbox.js"></script>

    <!--------------------------------Owl Carousel JS---------------------------------------->
    <script src="public/vendor/owl carousel 2/owl.carousel.min.js"></script>

    <!-------------------------------------AOS JS------------------------------------------>
    <script src="public/vendor/aos/aos.js"></script>

    <!-----------------------------------Inputmask JS------------------------------------------>
    <script src="public/vendor/inputmask/jquery.inputmask.bundle.min.js"></script>

    <!------------------------------------Custom JS---------------------------------------->
    <script src="public/user/js/usercustom.js"></script>


</body>

</html>