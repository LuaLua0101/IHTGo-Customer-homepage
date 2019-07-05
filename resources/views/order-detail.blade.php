@extends('layouts.customer')
@section('content')
<div class="body-wrap">
    <div class="topHeight"></div>
    <div class="container margin-auto news-body">
        <div class="row center-text">
            <h2 style="margin: -1.5%;"><span style="font-size: 24px; text-transform:uppercase; color:#e50303;"><strong>Chi tiết đơn hàng</strong></span></h2>
        </div>
        <div class="h50px"></div>
    </div>
    <div class="container">
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Thông tin người gửi</a>
                <a href="#" class="list-group-item"><i class="far fa-user">Tên khách hàng:</i> {{$order->sender_name}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-phone">Số điện thoại:</i> {{$order->sender_phone}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-map-marked">Địa chỉ:</i>{{$order->sender_address}},{{$order->sender_district_name}}, {{$order->sender_province_name }} </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Thông tin người nhận</a>
                <a href="#" class="list-group-item"><i class="far fa-user">Tên khách hàng:</i> {{$order->receive_name}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-phone">Số điện thoại:</i> {{$order->receive_phone}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-map-marked">Địa chỉ:</i>{{$order->receive_address}}, {{$order->receive_district_name}}, {{$order->receive_province_name }} </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Thông tin đơn hàng</a>
                <a href="#" class="list-group-item"><i class="fas fa-motorcycle">Loại xe:</i>{{$order->car_type}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-rocket">Giao hỏa tốc:</i>
                    @if($order->is_speed==1)
                    <span class="bage-success">Có</span>
                    @else<span class="bage-basic"> Không</span>@endif </a>
                <a href="#" class="list-group-item"><i class="fas fa-file-import">Trường hợp:</i> </a>
                <a href="#" class="list-group-item"><i class="fas fa-money-check-alt">Phương thức thanh toán:</i>
                    @if($order->payment_type=='1')
                    <span class="bage-info">Tiền mặt</span>
                    @elseif($order->payment_type=='2')
                    <span class="bage-success">Theo tháng </span>
                    @else
                    <span class="bage-primary">Phương thức khác</span>
                    @endif
                </a>
                <a href="#" class="list-group-item"><i class="fas fa-money-check-alt">Phương thức thanh toán:</i>
                    @if($order->is_payment==0)
                    <span class="bage-basic"> Chưa thanh toán</span>
                    @elseif($order->is_payment==1)
                    <span class="bage-success"> Đã thanh toán</span>
                    @elseif($order->is_payment==2)
                    <span class="bage-danger">Ghi nợ</span>
                    @endif
                </a>
                <a href="#" class="list-group-item"><i class="far fa-user">Người thanh toán:</i> </a>
                <a href="#" class="list-group-item"><i class="fas fa-ruler-combined">Kích thước(cm):</i> </a>
                <a href="#" class="list-group-item"><i class="fas fa-balance-scale">Cân nặng(kg):</i>{{$order->weight}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd">Thu hộ:</i> {{number_format($order->take_money).' VNĐ'}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd">Phí giao hàng:</i> {{number_format($order->total_price).' VNĐ'}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd">Tổng tiền:</i> {{number_format($order->total_price + $order->take_money).' VNĐ'}}</a>
                <a href="#" class="list-group-item"><i class="far fa-comment-alt">Ghi chú:</i>{{$order->note}}</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Chi tiết vận chuyển</a>
                <a href="#" class="list-group-item"><i class="fas fa-info">Trạng thái:</i>
                    <!-- Trạng thái đơn hàng -->
                    @if($order->status==1)
                        <span class="bage-warning">Chờ </span>
                    @elseif($order->status==2)
                        <span class="bage-info">Chưa giao</span>
                    @elseif($order->status==3)
                        <span class="bage-info">Đang giao </span>
                    @elseif($order->status==4)
                        <span class="bage-success">Đã hoàn thành</span>
                    @elseif($order->status==5)
                        <span class="bage-basic">Khách hủy </span>
                    @elseif($order->status==6)
                        <span class="bage-basic">IHTGo hủy</span>
                    @elseif($order->status==7)
                        <span class="bage-danger">Không thành công</span>
                    @endif
                </a>
                <a href="#" class="list-group-item"><i class="far fa-user">Tài xế:</i> </a>
                <a href="#" class="list-group-item"><i class="fas fa-motorcycle">Biển số xe:</i> </a>
                <a href="#" class="list-group-item"><i class="fas fa-phone">Số điện thoại:</i> </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Lịch sử giao hàng</a>
                <a href="#" class="list-group-item"><i class="fas fa-clock">Thời gian đặt hàng:</i>{{$order->created_at}}</a>
                <a href="#" class="list-group-item"><i class="fas fa-clock">Thời gian giao:</i></a>
                <a href="#" class="list-group-item"><i class="fas fa-clock">Thời gian hoàn thành:</i></a>
            </div>
        </div>
    </div>
</div>
@endsection