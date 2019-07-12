@extends('layouts.customer')
@section('content')
<div class="body-wrap">
    <div class="topHeight"></div>
    <div class="container margin-auto news-body">
        <div class="row center-text">
            <h2 style="margin: -1.5%;"><span style="font-size: 24px; text-transform:uppercase; color:#e50303;"><strong>Chi tiết đơn hàng: #{{$order->code}} @if($order->is_speed==1)
                        <i class="fas fa-rocket"></i>
                        @endif</span></strong></span></h2>
        </div>
        <div class="h50px"></div>
    </div>
    <div class="container" id="formOrderDetail">
        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Thông tin người gửi</span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">Tên khách hàng:</span> {{$order->sender_name}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">Số điện thoại:</span> {{$order->sender_phone}}</span>
                    <span class="list-group-item"><i class="fas fa-map-marked"></i><span class="tltHeading">Địa chỉ:</span>{{$order->sender_address}},{{$order->sender_district_name}}, {{$order->sender_province_name }} </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Thông tin người nhận</span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">Tên khách hàng:</span> {{$order->receive_name}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">Số điện thoại:</span> {{$order->receive_phone}}</span>
                    <span class="list-group-item"><i class="fas fa-map-marked"></i><span class="tltHeading">Địa chỉ:</span>{{$order->receive_address}}, {{$order->receive_district_name}}, {{$order->receive_province_name }} </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Thông tin đơn hàng</span>
                    <span class="list-group-item"><i class="fas fa-motorcycle"></i><span class="tltHeading">Loại xe:</span>{{$order->car_type}}</span>
                    <span class="list-group-item"><i class="fas fa-rocket"></i><span class="tltHeading">Giao hỏa tốc:</span>
                        @if($order->is_speed==1)
                        <span class="bage-success">Có</span>
                        @else<span class="bage-basic"> Không</span>@endif </span>
                    <span class="list-group-item"><i class="fas fa-file-import"></i><span class="tltHeading">Trường hợp:</span>
                        @if($order->car_option=='1')
                        <span class="bage-info">Giao hàng nội tỉnh</span>
                        @elseif($order->car_option=='2')
                        <span class="bage-success">Giao chứng từ </span>
                        @elseif($order->car_option=='3')
                        <span class="bage-primary">Giao hàng ngoại tỉnh</span>
                        @endif

                    </span>
                    <span class="list-group-item"><i class="fas fa-money-check-alt"></i><span class="tltHeading">Phương thức thanh toán:</span>
                        @if($order->payment_type=='1')
                        <span class="bage-info">Tiền mặt</span>
                        @elseif($order->payment_type=='2')
                        <span class="bage-success">Theo tháng </span>
                        @else
                        <span class="bage-primary">Phương thức khác</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="fas fa-money-check-alt"></i><span class="tltHeading">Thanh toán:</span>
                        @if($order->is_payment==0)
                        <span class="bage-basic"> Chưa thanh toán</span>
                        @elseif($order->is_payment==1)
                        <span class="bage-success"> Đã thanh toán</span>
                        @elseif($order->is_payment==2)
                        <span class="bage-danger">Ghi nợ</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">Người thanh toán:</span>
                        @if($order->payer==1)
                        <span class="bage-info">Người nhận</span>
                        @elseif($order->payer==2)
                        <span class="bage-success">Người gửi</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="fas fa-ruler-combined"></i><span class="tltHeading">Kích thước(cm):</span> </span>
                    <span class="list-group-item"><i class="fas fa-balance-scale"></i><span class="tltHeading">Cân nặng(kg):</span>{{$order->weight}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">Thu hộ:</span> {{number_format($order->take_money).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">Phí giao hàng:</span> {{number_format($order->total_price).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">Tổng tiền:</span> {{number_format($order->total_price + $order->take_money).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="far fa-comment-alt"></i><span class="tltHeading">Ghi chú:</span>{{$order->note}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Chi tiết vận chuyển</span>
                    <span class="list-group-item"><i class="fas fa-info"></i><span class="tltHeading">Trạng thái:</span>
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
                    </span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">Tài xế:</span>{{$order->receive_shipper_name}} </span>
                    <span class="list-group-item"><i class="fas fa-motorcycle"></i><span class="tltHeading">Biển số xe:</span> {{$order->receive__shipper_car}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">Số điện thoại:</span> {{$order->receive__shipper_phone}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Lịch sử giao hàng</span>
                    <span class="list-group-item"><i class="fas fa-clock"></i><span class="tltHeading">Thời gian đặt hàng:</span>{{$order->created_at}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <span class="list-group-item active">Ảnh đơn hàng</span>
                    <img data-toggle="modal" data-target="#myModal" id="myImg" src={{"../public/storage/order/" . $order->order_id."_order.png?" . rand()}} alt="No Image" style="width:100%;max-width:300px" onerror="this.onerror=null;this.src='../public/images/index/notfound.png';">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <img data-toggle="modal" width="100%" height="100%" data-target="#myModal" id="myImg" src={{"../public/storage/order/" . $order->order_id."_order.png?" . rand()}} alt="No Image" onerror="this.onerror=null;this.src='../public/images/index/notfound.png';">
            </div>
        </div>
    </div>
</div>

@endsection