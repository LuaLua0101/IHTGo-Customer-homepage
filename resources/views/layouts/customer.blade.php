<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('public/Images/Index/logo.png') }}" />

    <!--------------------------------------Bootstrap CSS--------------------------------------------->
    <link href="{{ URL::asset('public/vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!----------------------------------------------------------------------------------->
    <link href="{{ URL::asset('public/vendor/bootstrap-3.3.7/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet" />

    <!----------------------------------------PagedList----------------------------------------------->
    <link href="{{ URL::asset('public/vendor/PagedList.css" rel="stylesheet') }}" />

    <!-------------------------------------Owl Carousel CSS------------------------------------------>
    <link href="{{ URL::asset('public/vendor/owl carousel 2/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/vendor/owl carousel 2/assets/owl.theme.default.min.css') }}" rel="stylesheet" />

    <!-----------------------------------Ekko lightbox CSS------------------------------------------->
    <link href="{{ URL::asset('public/vendor/ekko lightbox/ekko-lightbox.css') }}" rel="stylesheet" />

    <!----------------------------------------AOS CSS------------------------------------------------>
    <link href="{{ URL::asset('public/vendor/aos/aos.css') }}" rel="stylesheet" />

    <!----------------------------------------Fontawesome CSS---------------------------------------->
    <link href="{{ URL::asset('public/vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!---------------------------------------Custom CSS---------------------------------------------->
    <link href="{{ URL::asset('public/user/css/usercustom.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/shared/common.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>IHTGO - Trang Chủ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="body-container">
    <!---------------------------HEADER------------------------------->
    <header>
        <!---------------------First Header----------------------->

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{!! url('/'); !!}"><img class="logo-image" src="{{ URL::asset('public/Images/Index/logo.png') }}" alt="logo" title="logo" /></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::path() == 'gioi-thieu' ? 'active' : '' }}"><a href="{!! url('gioi-thieu'); !!}"><strong>{{ __('messages.about_us') }}</strong></a></li>
                        <li class="{{ Request::path() == 'bang-gia' ? 'active' : '' }}"><a href="{!! url('bang-gia'); !!}"><strong>{{ __('messages.price_list') }}</strong></a></li>
                        <li class="{{ Request::path() == 'tin-tuc' ? 'active' : '' }}"><a href="{!! url('tin-tuc'); !!}"><strong>{{ __('messages.news') }}</strong></a></li>
                        <li><a href="{{ url('locale/en') }}"><i class="fa fa-language"></i> EN</a></li>

                        <li><a href="{{ url('locale/vi') }}"><i class="fa fa-language"></i> VI</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::user())
                        <li><a data-toggle="modal" data-target="#DatHang" id='dat-hang'><strong>{{ __('messages.create_order') }}</strong></a></li>
                        <li class="{{ Request::path() == 'don-hang' ? 'active' : '' }}"><a href="{!! url('don-hang'); !!}" id='don-hang'><strong>{{ __('messages.order_management') }}</strong></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ __('messages.hello') }} {{Auth::user()->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#InfoUser">{{ __('messages.personal_information') }}</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#ChangePassword">{{ __('messages.change_password') }}</a></li>
                                <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">{{ __('messages.log_out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                        </li>

                        @else
                        <li><a class=" " data-toggle="modal" data-target="#Login"><span class="glyphicon glyphicon-user"></span> {{ __('messages.login') }}</a></li>
                        <li><a class=" " data-toggle="modal" data-target="#Registered"><span class="glyphicon glyphicon-log-in"></span> {{ __('messages.registration') }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <!--  Modal Dat hang-->
    @if(Auth::user())
    <div class="modal fade" id="DatHang" role="dialog">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ url('create-order') }}" class='formModal' id='formCreateOrder' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ __('messages.create_order') }}</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-6">
                            <h4>{{ __('messages.sender_information') }}(*)</h4>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-name'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="{{ __('messages.name') }}(*)" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-phone'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" name="sender_phone" id="sender_phone" placeholder="{{ __('messages.phone') }}(*)" value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-province-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="sender_province_id" name="sender_province_id">
                                        <option value="0">Vui lòng chọn tỉnh - thành phố(*)</option>
                                        @foreach($province as $p)
                                        <option value="{{$p->province_id}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-district-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="sender_district_id" name="sender_district_id">
                                        <option>Vui lòng chọn quận - huyện(*)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-address'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    @if($customer==null)
                                    <input type="text" class="form-control" name="sender_address" id="sender_address" placeholder="{{ __('messages.sender_address') }}(*)">
                                    @else
                                    <input type="text" class="form-control" name="sender_address" id="sender_address" placeholder="{{ __('messages.sender_address') }}(*)" value="{{$customer->address}}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ __('messages.receiver_information') }}(*) <span id="iconHistoryDelivery" data-toggle="modal" data-target="#historyDelivery"><i class="fas fa-question"></i></span></h4>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-name'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" name="receive_name" id="receive_name" placeholder="{{ __('messages.name') }}(*)">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-phone'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" name="receive_phone" id="receive_phone" placeholder="{{ __('messages.phone') }}(*)">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-province-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="receive_province_id" name="receive_province_id">
                                        <option>Vui lòng chọn tỉnh - thành phố(*)</option>
                                        @foreach($province as $p)
                                        <option value="{{$p->province_id}}">{{$p->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-district-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="receive_district_id" name="receive_district_id">
                                        <option value="0">Vui lòng chọn quận - huyện(*)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-address'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <input type="text" class="form-control" id="receive_address" name="receive_address" placeholder="{{ __('messages.receiver_address') }}(*)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>{{ __('messages.order_information') }}(*)</h4>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-box-open"></i></span>
                                    <input type="text" class="form-control" placeholder="{{ __('messages.order_name') }}" id="name" name="name">
                                </div>
                            </div>
                            <label class="title-form">{{ __('messages.size') }} (cm)= ({{ __('messages.length') }} * {{ __('messages.width') }} * {{ __('messages.height') }})/5000</label> <span class="text-danger" id='error-size-order'></span>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="text" class="form-control" placeholder="{{ __('messages.length') }}(cm)*" id="length" name="length">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="text" class="form-control" placeholder="{{ __('messages.width') }}(cm)*" id="width" name="width">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="text" class="form-control" placeholder="{{ __('messages.height') }}(cm)*" id="height" name="height">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-weight-order'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-balance-scale"></i></span>
                                    <input type="text" class="form-control" placeholder="{{ __('messages.weight') }}(< 25kg)*" id="weight" name="weight">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-hand-holding-usd"></i></span>
                                    <input type="text" class="form-control" placeholder="{{ __('messages.cash_on_delivery') }}(VND)" id="take_money" name="take_money">
                                </div>
                            </div>
                            <div class="row">
                                <div class="custom-file col-md-4">
                                    <label>{{ __('messages.photo_order') }}:<span class="text-danger" id='error-image-order'></span></label>
                                    <div class="upload-btn-wrapper">
                                        <img id="img1" width="130" src="{{ URL::asset('public/images/Index/notfound.png') }}">
                                        <input type="file" id="customFile" name="image_order" onchange="readURL(event, 1)" />
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>{{ __('messages.note') }}:<span class="text-danger" id='error-note-order'></span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-comment-alt"></i></span>
                                        <textarea class="form-control" rows="5" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 formRadio">
                            <div class="form-group col-md-6 col-sm-6 ">
                                <label class="title-form">{{ __('messages.express_delivery') }}:</label>
                                <label class="container">{{ __('messages.yes') }}
                                    <input type="radio" checked="checked" name="is_speed" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ __('messages.no') }}
                                    <input type="radio" name="is_speed" value="0">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="title-form">{{ __('messages.payer') }}:</label>
                                <label class="container">{{ __('messages.receicer') }}
                                    <input type="radio" name="payer" value="1" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ __('messages.sender') }}
                                    <input type="radio" name="payer" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="title-form">{{ __('messages.case') }}:</label>
                                <label class="container">{{ __('messages.delivery_in_province') }}
                                    <input type="radio" checked="checked" name="car_option" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ __('messages.delivery_outside_province') }}
                                    <input type="radio" name="car_option" value="3">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ __('messages.delivery_of_documents') }}
                                    <input type="radio" name="car_option" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if($customer->type == 2)
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="title-form">{{ __('messages.payment_methods') }}:</label>
                                <label class="container">{{ __('messages.cash') }}
                                    <input type="radio" checked="checked" name="payment_type" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">{{ __('messages.monthly') }}
                                    <input type="radio" name="payment_type" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id="btnCreateOrder" data-toggle="modal" data-target="#orderConfirmation">{{ __('messages.save') }}</button>
                        <button type="button" class="btnClose" data-dismiss="modal">{{ __('messages.close') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal  history delivery-->
    <div id="historyDelivery" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('messages.the_latest_recipient_history') }}</h4>
                </div>
                <div class="modal-body formRadio">
                    @foreach($receive as $r)
                    <label class="container"><i class="fas fa-user"></i> {{$r->receive_name}} <i class="fas fa-phone"></i> {{$r->receive_phone}} <i class="fas fa-map-marker-alt"></i> {{$r->receive_address}},{{$r->receive_district_name}},{{$r->receive_province_name}}
                        <input type="radio" name="rdoHistoryDelivery" id="rdoHistoryDelivery" value="{{$r->id}}">
                        <span class="checkmark"></span>
                    </label>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnSave" id="btnHistoryDelivery" data-dismiss="modal">{{ __('messages.choose') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  Order confirmation-->
    <div id="orderConfirmation" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">xác nhận đơn hàng</h4>
                </div>
                <div class="modal-body formRadio">
                    <p>Đơn hàng thành công</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnSave" id="btnHistoryDelivery" data-dismiss="modal">Chọn</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Modal login-->
    <div class="modal fade" id="Login" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST" action="{{ route('login') }}" class='formModal' id='formLogin'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ __('messages.login') }}</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="form-group">
                            <span class="text-danger" id='error-phone1'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="text" class="form-control" id='phone1' name="phone" placeholder="{{ __('messages.phone') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-password1'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id='password1' name="password" placeholder="{{ __('messages.password') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnLogin' disabled>{{ __('messages.login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Registered-->
    <div class="modal fade" id="Registered" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ url('register') }}" class='formModal' id='formRegister'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ __('messages.become_a_ihtgo_customer_now') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="text-danger" id='error-name2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="{{ __('messages.name') }}" id='name2' name='name' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-email2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                <input type="mails" class="form-control" placeholder="Email" id='email2' name='email' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-phone2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="{{ __('messages.phone') }}" id='phone2' name=phone required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-password2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="{{ __('messages.password') }}" name="password" id="password2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-re-password2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="{{ __('messages.confirm_password') }}" name='re-password' id='re-password2' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-sender-address'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <input type="text" class="form-control" name="address" id="address" placeholder="{{ __('messages.address') }}">
                            </div>
                        </div>
                        <div class=" row">
                            <div class="formRadio col-md-12">
                                <label class="col-md-3">Loại khách hàng: </label>
                                <label class="container col-md-2">Cá nhân
                                    <input type="radio" checked="checked" name="type" id='rdoPersonal' value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container col-md-3">Doanh nghiệp
                                    <input type="radio" name="type" id='rdoCompany' value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="listCompany">
                            <label>Danh sách công ty:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-building"></i></span>
                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" style="width: 100%" id="company_id" name="company_id">
                                    @foreach($company as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnRegister' disabled>LƯU</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(Auth::user())
    <!-- Modal Info User-->
    <div class="modal fade" id="InfoUser" role="dialog">
        <div class="modal-dialog">
            <form method="POST" action="{{ url('edit-user') }}" class='formModal' id='formInfoUser'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">THÔNG TIN CÁ NHÂN</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="text-danger" id='error-name3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Họ và Tên" name="name" id="name3" value="{{Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-name3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" disabled value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-phone3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="Số điện thoại" disabled value="{{Auth::user()->phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-address3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                @if($customer==null)
                                <input type="text" class="form-control" name="address" id="address3" placeholder="Địa chỉ" value="">
                                @else
                                <input type="text" class="form-control" name="address" id="address3" placeholder="Địa chỉ" value="{{$customer->address}}">
                                @endif
                            </div>
                        </div>

                        <div class=" row">
                            <div class="formRadio col-md-12">
                                <label class="col-md-3">Loại khách hàng: </label>
                                <label class="container col-md-2">Cá nhân
                                    <input type="radio" name="radio" {{($customer->type == 1) ? 'checked' :null}} id='rdoPersonal2'>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container col-md-3">Doanh nghiệp
                                    <input type="radio" name="radio" {{($customer->type == 2) ? 'checked' :null}} id='rdoCompany2'>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        @if($customer->type == 2 )
                        <div class="form-group" id="listCompany2">
                            <label>Danh sách công ty:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-building"></i></span>
                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="company_id2" name="company_id" style="width: 100%">
                                    @foreach($company as $c)
                                    <option value="{{$c->id}}" {{($customer->company_id == $c->id) ? 'selected' :null}}>{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                        <div class="form-group" id="listCompany2" style="display:none">
                            <label>Danh sách công ty:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-building"></i></span>
                                <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="company_id2" name="company_id" style="width: 100%">
                                    @foreach($company as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnInfoUser' disabled>Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    <!-- Modal ChangePassword-->
    <div class="modal fade" id="ChangePassword" role="dialog">
        <div class="modal-dialog">
            <form method="POST" action="{{ url('change-password') }}" class='formModal' id='formChangePassword'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ĐỔI MẬT KHẨU</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Mật khẩu hiện tại:<span class="text-danger" id='error-current-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name="current_password" id='current-password4' class="form-control" placeholder="Mật khẩu hiện tại">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới:<span class="text-danger" id='error-new-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name='new_password' id='new-password4' class="form-control" placeholder="Mật khẩu mới">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu:<span class="text-danger" id='error-re-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name='re_password' id='re-password4' class="form-control" placeholder="Xác nhận mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnChangePassword' disabled>LƯU</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (Session::has('error'))
    <div class="noti">
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('error') }}
        </div>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="noti">
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
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
                        <li><a class="decNone" href="javascript:void(0)">Chính sách bảo mật</a></li>
                        <li><a class="decNone" href="javascript:void(0)">Các điều khoản và điều kiện</a></li>
                        <li><a class="decNone" href="javascript:void(0)">Tuyển dụng</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <p><strong>HỆ THỐNG CHI NHÁNH</strong></p>
                    <ul class="list-unstyled">
                        <li><a class="decNone" href="javascript:void(0)"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Hồ Chí Minh</a></li>
                        <li><a class="decNone" href="javascript:void(0)"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Bình Dương</a></li>
                        <li><a class="decNone" href="javascript:void(0)"><span class="glyphicon glyphicon-chevron-right"></span> Chi nhánh kho Đồng Nai</a></li>
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
    <a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button" title="Nhấn vào đây để trở về trang đầu" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

    <!---------------------------------Jquery JS------------------------------------------>
    <script src="{{ URL::asset('public/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

    <!--------------------------------Bootstrap JS---------------------------------------->
    <script src="{{ URL::asset('public/vendor/bootstrap-3.3.7/dist/js/bootstrap.min.js') }}"></script>

    <!--------------------------------Ekko lightbox JS-------------------------------------->
    <script src="{{ URL::asset('public/vendor/ekko lightbox/ekko-lightbox.js') }}"></script>

    <!--------------------------------Owl Carousel JS---------------------------------------->
    <script src="{{ URL::asset('public/vendor/owl carousel 2/owl.carousel.min.js') }}"></script>

    <!-------------------------------------AOS JS------------------------------------------>
    <script src="{{ URL::asset('public/vendor/aos/aos.js') }}"></script>

    <!-----------------------------------Inputmask JS------------------------------------------>
    <script src="{{ URL::asset('public/vendor/inputmask/jquery.inputmask.bundle.min.js') }}"></script>

    <!------------------------------------Custom JS---------------------------------------->
    <script src="{{ URL::asset('public/user/js/usercustom.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script>
        function readURL(event, id) {
            var output = document.getElementById('img' + id);
            output.src = URL.createObjectURL(event.target.files[0]);
        }; <
        /body>

        <
        /html>