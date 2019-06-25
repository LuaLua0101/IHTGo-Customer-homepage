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
    <link href="public/css/style.css" rel="stylesheet" />
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
                @if(Auth::user())
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#!">Xin chào {{Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu drop-vanphong">
                        <li><a href="#!" data-toggle="modal" data-target="#InfoUser">Thông tin cá nhân</a></li>
                        <li><a href="#!" data-toggle="modal" data-target="#ChangePassword">Đổi mật khẩu</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endif
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
                <li><a href="{!! url('gioi-thieu'); !!}">GIỚI THIỆU</a></li>
                <li><a href="{!! url('bang-gia'); !!}"><strong>BẢNG GIÁ</strong></a></li>
                <li><a href="{!! url('tin-tuc'); !!}"><strong>TIN TỨC</strong></a></li>
                @if(Auth::user())
                <li><button class="btn btndatgiaohang" data-toggle="modal" data-target="#DatHang" id='dat-hang'><strong>ĐẶT GIAO HÀNG NGAY</strong></button></li>
                <li><a class="btn btndatgiaohang" href="{!! url('don-hang'); !!}" id='don-hang'><strong>QUẢN LÝ ĐƠN HÀNG</strong></a></li>
                @else
                <li><button class="btn btndatgiaohang" data-toggle="modal" data-target="#Login"><strong>ĐĂNG NHẬP</strong></button></li>
                <li><button class="btn btndatgiaohang" data-toggle="modal" data-target="#Registered"><strong>ĐĂNG KÝ</strong></button></li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </nav>
    </header>
    <!--  Modal Dat hang-->
    <div class="modal fade" id="DatHang" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ĐƠN HÀNG MỚI</h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <h4>Thông tin người gửi đơn hàng</h4>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Họ và Tên người gửi">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="SĐT người gửi">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <input type="text" class="form-control" placeholder="Địa chỉ người gửi">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <select class="form-control" id="sel1">
                                    <option>Vui lòng chọn tỉnh - thành phố</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <select class="form-control" id="sel1">
                                    <option>Vui lòng chọn quận - huyện</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Thông tin người nhận đơn hàng</h4>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Họ và Tên người nhận">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="SĐT người nhận">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <input type="text" class="form-control" placeholder="Địa chỉ người nhận">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <select class="form-control" id="sel1">
                                    <option>Vui lòng chọn tỉnh - thành phố</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <select class="form-control" id="sel1">
                                    <option>Vui lòng chọn quận - huyện</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Thông tin đơn hàng</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-balance-scale"></i></span>
                                    <input type="text" class="form-control" placeholder="Kích thước">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-balance-scale"></i></span>
                                    <input type="text" class="form-control" placeholder="Cân nặng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-hand-holding-usd"></i></span>
                                <input type="text" class="form-control" placeholder="Thu hộ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="custom-file col-md-4">
                                <label>Ảnh đơn hàng:</label>
                                <div class="upload-btn-wrapper">
                                    <img id="img1" width="130" src="public/images/Index/notfound.png">
                                    <input type="file" id="customFile" name="image_order" onchange="readURL(event, 1)" />
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Ghi chú:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-comment-alt"></i></span>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="title-form">Giao hỏa tốc:</label>
                            <label class="container">Có
                                <input type="radio" checked="checked" name="radio1">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Không
                                <input type="radio" name="radio1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="title-form">Loại xe:</label>
                            <label class="container">Xe máy
                                <input type="radio" checked="checked" name="radio2">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Xe tải
                                <input type="radio" name="radio2">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="title-form">Trường hợp:</label>
                            <label class="container">Giao nội tỉnh
                                <input type="radio" checked="checked" name="radio3">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Giao ngoại tỉnh
                                <input type="radio" name="radio3">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Giao chứng từ
                                <input type="radio" name="radio3">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="title-form">Phương thức thanh toán</label>
                            <label class="container">Tiền mặt
                                <input type="radio" checked="checked" name="radio4">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Thanh toán theo tháng
                                <input type="radio" name="radio4">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="title-form">Người thanh toán:</label>
                            <label class="container">Người gửi
                                <input type="radio" checked="checked" name="radio5">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container ">Người nhận
                                <input type="radio" name="radio5">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><i class="far fa-save" style="color:white"></i>Lưu</button>
                    <button type="button" class="btn" data-dismiss="modal"><i class="fas fa-times"></i>Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal login-->
    <div class="modal fade" id="Login" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST" action="{{ route('login') }}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ĐĂNG NHẬP</h4>

                    </div>
                    <div class="modal-body ">
                        <div class="form-group">
                            <div class="input-group">
                                <label hidden id='error-email'></label>
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" id=email name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label hidden id='error-password'></label>
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id='password' name="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-sign-in-alt" style="color:white"></i>Đăng nhập</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Modal Registered-->
    <div class="modal fade" id="Registered" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('register') }}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Hãy trở thành khách hàng IHTGO ngay!</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Họ và Tên" name='name'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                <input type="mails" class="form-control" placeholder="Email" name='email'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="SĐT liên hệ" name=phone>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name='re-password' id='re-password'>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="far fa-save" style="color:white"></i>Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Modal Info User-->
    <div class="modal fade" id="InfoUser" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin cá nhân</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="far fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Họ và Tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" placeholder="SĐT">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                            <input type="text" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                            <select class="form-control" id="sel1">
                                <option>Vui lòng chọn tỉnh - thành phố</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                            <select class="form-control" id="sel1">
                                <option>Vui lòng chọn quận - huyện</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><i class="far fa-save" style="color:white"></i>Lưu</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal ChangePassword-->
    <div class="modal fade" id="ChangePassword" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đổi mật khẩu</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mật khẩu hiện tại:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Mật khẩu hiện tại">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Mật khẩu mới">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><i class="far fa-save" style="color:white"></i>Lưu</button>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('error'))
    <div class="noti">
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong>{{ Session::get('error') }}
        </div>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="noti">
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
    </div>
    @endif
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
            <i class="fa fa-2x fa-arrow-up" style="color:white"></i>
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
<script>
    function readURL(event, id) {
        var output = document.getElementById('img' + id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>