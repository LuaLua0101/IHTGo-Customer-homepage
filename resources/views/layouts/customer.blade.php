<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('public/Images/Index/logo.png') }}" />

    <!--------------------------------------Bootstrap CSS--------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!----------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
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
                        <li class="{{ Request::path() == 'contact' ? 'active' : '' }}"><a href="{!! url('contact'); !!}"><strong>@lang('messages.about_us')</strong></a></li>
                        <li class="{{ Request::path() == 'price-list' ? 'active' : '' }}"><a href="{!! url('price-list'); !!}"><strong>@lang('messages.price_list') </strong></a></li>
                        <!-- <li class="{{ Request::path() == 'news' ? 'active' : '' }}"><a href="{!! url('news'); !!}"><strong>@lang('messages.news')</strong></a></li> -->
                        @if(app()->getLocale()=='vi')
                        <li><a href="{{ url('locale/en') }}"><i class="fa fa-language"></i>EN</a></li>
                        @else
                        <li><a href="{{ url('locale/vi') }}"><i class="fa fa-language"></i> VI</a></li>
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::user())
                        <li><a data-toggle="modal" data-target="#DatHang" id='dat-hang'><strong>@lang('messages.create_order') </strong></a></li>
                        <li class="{{ Request::path() == 'order' ? 'active' : '' }}"><a href="{!! url('order'); !!}" id='don-hang'><strong>@lang('messages.order_management') </strong></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('messages.hello') {{Auth::user()->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#InfoUser">@lang('messages.personal_information') </a></li>
                                <li><a href="#" data-toggle="modal" data-target="#ChangePassword">@lang('messages.change_password')</a></li>
                                <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">@lang('messages.log_out')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                        </li>
                        @else
                        <li><a class=" " data-toggle="modal" data-target="#Login"><span class="glyphicon glyphicon-user"></span> @lang('messages.login') </a></li>
                        <li><a class=" " data-toggle="modal" data-target="#Registered"><span class="glyphicon glyphicon-log-in"></span> @lang('messages.registration') </a></li>
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
            <form method="POST" action="{{ url('/create-order') }}" class='formModal' id='formCreateOrder' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">@lang('messages.create_order')</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="col-sm-6">
                            <h4>@lang('messages.sender_information') (*)</h4>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-name'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" name="sender_name" id="sender_name" placeholder="@lang('messages.name')(*)" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-phone'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                    <input type="number" class="form-control" name="sender_phone" id="sender_phone" placeholder="@lang('messages.phone') (*)" value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-province-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="sender_province_id" name="sender_province_id">
                                        <option value="0">@lang('messages.please_select_province_city') (*)</option>
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
                                        <option>@lang('messages.please_select_district') (*)</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-sender-address'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    @if($customer==null)
                                    <input type="text" class="form-control" name="sender_address" id="sender_address" placeholder="@lang('messages.sender_address') (*)">
                                    @else
                                    <input type="text" class="form-control" name="sender_address" id="sender_address" placeholder="@lang('messages.sender_address') (*)" value="{{$customer->address}}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>@lang('messages.receiver_information')(*) <span id="iconHistoryDelivery" data-toggle="modal" data-target="#historyDelivery"><i class="fas fa-question"></i></span></h4>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-name'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" name="receive_name" id="receive_name" placeholder="@lang('messages.name') (*)">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-phone'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                    <input type="number" class="form-control" name="receive_phone" id="receive_phone" placeholder="@lang('messages.phone') (*)">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-province-id'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <select class="form-control" id="receive_province_id" name="receive_province_id">
                                        <option>@lang('messages.please_select_province_city')(*)</option>
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
                                        <option value="0">@lang('messages.please_select_district') (*)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="text-danger" id='error-receive-address'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                    <input type="text" class="form-control" id="receive_address" name="receive_address" placeholder="@lang('messages.receiver_address') (*)">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h4>@lang('messages.order_information') (*)</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-box-open"></i></span>
                                    <input type="text" class="form-control" placeholder="@lang('messages.order_name') " id="name" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4" id='form-length'>
                                    <label>@lang('messages.length')(cm)*:</label>
                                    <label class="text-danger" id='error-length-order'></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="number" min="0" max="100" step="0.25"  class="form-control" placeholder="@lang('messages.length') (cm)*" id="length" name="length">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4" id='form-width'>
                                    <label>@lang('messages.width')(cm)*:</label><label class="text-danger" id='error-width-order'></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="number"  min="0" max="100" step="0.25"  class="form-control" placeholder="@lang('messages.width') (cm)*" id="width" name="width">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4" id='form-height'>
                                    <label>@lang('messages.height')(cm)*:</label><label class="text-danger" id='error-height-order'></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fas fa-ruler-combined"></i></span>
                                        <input type="number"  min="0" max="100" step="0.25"  class="form-control" placeholder="@lang('messages.height') (cm)*" id="height" name="height">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id='form-weight'>
                                <label>@lang('messages.weight')(kg)*:</label> <span class="text-danger" id='error-weight-order'></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-balance-scale"></i></span>
                                    <input type="number"  min="0" max="100" step="0.25"  class="form-control" placeholder="@lang('messages.weight') (*)" id="weight" name="weight">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-hand-holding-usd"></i></span>
                                    <input type="number" step="any" class="form-control" placeholder="@lang('messages.cash_on_delivery') (VND)" id="take_money" name="take_money">
                                </div>
                            </div>
                            <div class="row">
                                <div class="custom-file col-sm-4">
                                    <label>@lang('messages.photo_order') :<span class="text-danger" id='error-image-order'></span></label>
                                    <div class="upload-btn-wrapper">
                                        <img id="img1" width="130" src="{{ URL::asset('public/images/Index/notfound.png') }}">
                                        <input type="file" id="customFile" name="image_order" onchange="readURL(event, 1)" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label>@lang('messages.note') :<span class="text-danger" id='error-note-order'></span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="far fa-comment-alt"></i></span>
                                        <textarea class="form-control" rows="5" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 formRadio">
                            <div class="form-group  formCheckBox">
                                <div class="checkbox  checkbox-success ">
                                    <label><input type="checkbox" name="is_speed" value="1">@lang('messages.express_delivery')</label>
                                </div>
                                <div class="checkbox ">
                                    <label><input class="label-text" type="checkbox" id='ckbdelivery_of_documents' value="2">@lang('messages.delivery_of_documents')</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="title-form">@lang('messages.payer') :</label>
                                <label class="container">@lang('messages.receicer')
                                    <input type="radio" name="payer" value="1" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">@lang('messages.sender')
                                    <input type="radio" name="payer" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if($customer->type == 2)
                            <div class="form-group col-sm-12">
                                <label class="title-form">@lang('messages.payment_methods') :</label>
                                <label class="container">@lang('messages.cash')
                                    <input type="radio" checked="checked" name="payment_type" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container">@lang('messages.monthly')
                                    <input type="radio" name="payment_type" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="btnCreateOrder" disabled>@lang('messages.save')</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
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
                    <h4 class="modal-title">@lang('messages.the_latest_recipient_history') </h4>
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
                    <button type="button" class="btn btn-danger" id="btnHistoryDelivery" data-dismiss="modal">@lang('messages.choose') </button>
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
                        <h4 class="modal-title">@lang('messages.login') </h4>
                    </div>
                    <div class="modal-body ">
                        <div class="form-group">
                            <span class="text-danger" id='error-phone1'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                <input type="number" class="form-control" id='phone1' name="phone" placeholder="@lang('messages.phone') " required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-password1'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" id='password1' name="password" placeholder="@lang('messages.password') " required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnLogin' disabled>@lang('messages.login') </button>
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
                        <h4 class="modal-title">@lang('messages.become_a_ihtgo_customer_now') </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="text-danger" id='error-name2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="@lang('messages.name') " id='name2' name='name' required>
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
                                <input type="tel" class="form-control" placeholder="@lang('messages.phone') " id='phone2' name=phone required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-password2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="@lang('messages.password') " name="password" id="password2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-re-password2'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" class="form-control" placeholder="@lang('messages.confirm_password') " name='re-password' id='re-password2' required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-sender-address'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                <input type="text" class="form-control" name="address" id="address" placeholder="@lang('messages.address') ">
                            </div>
                        </div>
                        <div class=" row">
                            <div class="formRadio col-sm-12">
                                <label class="col-sm-3">@lang('messages.customer_type') : </label>
                                <label class="container col-sm-2">@lang('messages.personal')
                                    <input type="radio" checked="checked" name="type" id='rdoPersonal' value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container col-sm-3">@lang('messages.company')
                                    <input type="radio" name="type" id='rdoCompany' value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="listCompany">
                            <label>@lang('messages.list_of_companies') :</label>
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
                        <button type="submit" class="btn btnSave" id='btnRegister' disabled>@lang('messages.save') </button>
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
                        <h4 class="modal-title">@lang('messages.personal_information') </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="text-danger" id='error-name3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="@lang('messages.name')" name="name" id="name3" value="{{Auth::user()->name}}">
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
                                <input type="tel" class="form-control" placeholder="@lang('messages.phone') " disabled value="{{Auth::user()->phone}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="text-danger" id='error-address3'></span>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                @if($customer==null)
                                <input type="text" class="form-control" name="address" id="address3" placeholder="@lang('messages.address') " value="">
                                @else
                                <input type="text" class="form-control" name="address" id="address3" placeholder="@lang('messages.address') " value="{{$customer->address}}">
                                @endif
                            </div>
                        </div>

                        <div class=" row">
                            <div class="formRadio col-sm-12">
                                <label class="container col-sm-2">@lang('messages.personal')
                                    <input type="radio" name="radio" {{($customer->type == 1) ? 'checked' :null}} id='rdoPersonal2'>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container col-sm-3">@lang('messages.company')
                                    <input type="radio" name="radio" {{($customer->type == 2) ? 'checked' :null}} id='rdoCompany2'>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        @if($customer->type == 2 )
                        <div class="form-group" id="listCompany2">
                            <label>@lang('messages.list_of_companies') :</label>
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
                            <label>@lang('messages.list_of_companies') :</label>
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
                        <button type="submit" class="btn btnSave" id='btnInfoUser' disabled>@lang('messages.save') </button>
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
                        <h4 class="modal-title">@lang('messages.change_password')</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('messages.current_password') :<span class="text-danger" id='error-current-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name="current_password" id='current-password4' class="form-control" placeholder="@lang('messages.current_password') ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.password') :<span class="text-danger" id='error-new-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name='new_password' id='new-password4' class="form-control" placeholder="@lang('messages.password') ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('messages.confirm_password') :<span class="text-danger" id='error-re-password4'></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                                <input type="password" name='re_password' id='re-password4' class="form-control" placeholder="@lang('messages.confirm_password')">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnSave" id='btnChangePassword' disabled>@lang('messages.save') </button>
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
                <div class="col-sm-8 col-md-push-2">
                    <div class="imgcont-headtitle">
                        <h2 data-aos="fade-down">
                            <span style="font-weight:700;">@lang('messages.download_now_IHTGo_app')</span>
                        </h2>
                        <p data-aos="fade-up">@lang('messages.download_now_IHTGo_app_detail')</p>
                    </div>
                </div>
                <div class="w100 col-sm-12 imgcont-icon">
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
                <div class="col-sm-6 footMid1stCol">
                    <p class="text-uppercase"><strong>IHT Go</strong></p>
                    <ul class="list-unstyled">
                        <li>@lang('messages.address') : @lang('messages.address_hcm_8_ba_trieu') </li>
                        <li>@lang('messages.phone') : (028) 38380888</li>
                        <li>@lang('messages.tax_code') : 0310212371</li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><a class="decNone" href="javascript:void(0)">@lang('messages.privacy_policy')</a></li>
                        <li><a class="decNone" href="javascript:void(0)">@lang('messages.terms_and_conditions')</a></li>
                        <li><a class="decNone" href="javascript:void(0)">@lang('messages.recruitment')</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <p class="text-uppercase"><strong> @lang('messages.branch_system') </strong></p>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        @lang('messages.hcm_branch')
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_hcm_8_ba_trieu') }}">@lang('messages.address_hcm_8_ba_trieu') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_hcm_6') }}">@lang('messages.address_hcm_6') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_hcm_12') }}">@lang('messages.address_hcm_12') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_hcm_binh_chanh') }}">@lang('messages.address_hcm_binh_chanh') </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        @lang('messages.bd_branch')
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_bd_my_phuoc') ">@lang('messages.address_bd_my_phuoc') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_bd_td1') ">@lang('messages.address_bd_td1') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_bd_thuan_an') ">@lang('messages.address_bd_thuan_an') </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        @lang('messages.dn_branch')
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_dn_bien_hoa') ">@lang('messages.address_dn_bien_hoa') </a></li>
                                        <li class="list-group-item"><a href="http://maps.google.com/?q=@lang('messages.address_dn_nhon_trach')">@lang('messages.address_dn_nhon_trach') </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div><!-- panel-group -->
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
    <script>
        var error_name = "@lang('messages.error_name')";
        var error_phone = "@lang('messages.error_phone')";
        var error_check_phone = "@lang('messages.error_check_phone')";
        var error_phone_has_been_used = "@lang('messages.error_phone_has_been_used')";
        var error_email = "@lang('messages.error_email')";
        var error_check_email = "@lang('messages.error_check_email')";
        var error_email_has_been_used = "@lang('messages.error_email_has_been_used')";
        var error_password = "@lang('messages.error_password')";
        var error_re_password = "@lang('messages.error_re_password')";
        var error_current_password = "@lang('messages.error_current_password')";
        var error_length_password = "@lang('messages.error_length_password')";
        var error_address = "@lang('messages.error_address')";
        var error_province = "@lang('messages.error_province')";
        var error_district = "@lang('messages.error_district')";
        var error_length = "@lang('messages.error_length')";
        var error_width = "@lang('messages.error_width')";
        var error_height = "@lang('messages.error_height')";
        var error_weight = "@lang('messages.error_weight')";
    </script>
    <!---------------------------------Jquery JS------------------------------------------>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--------------------------------Bootstrap JS---------------------------------------->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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

</body>

</html>

<script>
    function readURL(event, id) {
        var output = document.getElementById('img' + id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>