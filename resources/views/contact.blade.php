@extends('layouts.customer')
@section('content')
<div class="body-wrap">
    <div class="h80px"></div>
    <div class="container-fluid about-wrap">
        <div class="w100 center-text margin-auto row about-top-image">
            <img src="public/Images/About/gioi thieu.png" />
        </div>
        <div class="h30px"></div>
        <div class="w100 about-contact">
            <div class="col-md-7">
                <h2 class="center-text">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <p class="center-text">
                    Vui lòng điền thông tin chi tiết dưới đây và chúng tôi sẽ liên lạc với bạn sớm nhất<br />
                    Hoặc liên hệ trực tiếp với nhóm kinh doanh của chúng tôi theo số <strong>0902 926 925</strong>
                </p>
                <form method="POST" action="{{ url('contact-us') }}" class='formModal'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="margin-auto contact-form">
                        <div class="validation-summary-valid form-group" data-valmsg-summary="true">
                            <ul>
                                <li style="display:none"></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Họ và tên <span class="text-danger">*</span> <span id="errorContactName" class="validateError"></span></label>
                            <input class="form-control" type="text" id="contactName" name="name" placeholder="Họ và tên" maxlength="50" />
                        </div>
                        <div class="form-group">
                            <label>Tên doanh nghiệp</label>
                            <input class="form-control" type="text" id="contactCompany" name="company" maxlength="250" placeholder="Vui lòng để lại tên cửa hàng / công ty / doanh nghiệp của bạn" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại <span class="text-danger">*</span>
                                <span id="errorContactPhone" class="validateError"></span></label>
                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input class="form-control" id="contactPhone" name="phone" data-inputmask="'alias':'number','mask':'+84 999 999 9999','placeholder':''" data-mask="" type="text" placeholder="+84" />

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span> <span id="errorContactEmail" class="validateError"></span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" id="contactEmail" name="email" type="text" placeholder="my@example.com" />
                            </div>
                        </div>
                        <div class="form-group center-text" style="margin-top: 7%;">
                            <input id="btnContactSubmit" class="btn btn-danger text-uppercase" type="submit" value="gửi" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5 center-text about-side-image">
                <img src="public/Images/About/Responsive-Design.png" />
            </div>
        </div>
    </div>


</div>
@endsection