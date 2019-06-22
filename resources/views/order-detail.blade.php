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
                <a href="#" class="list-group-item"><i class="far fa-user"></i> Tên khách hàng :Lâm Bé Ba</a>
                <a href="#" class="list-group-item"><i class="fas fa-phone"></i>SĐT: 098765543123</a>
                <a href="#" class="list-group-item"><i class="fas fa-map-marked"></i>Địa chỉ: CTY HUGE BAMBOO, KCN MỸ PHƯỚC 1, Thị xã Bến Cát, Tỉnh Bình Dương</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Thông tin người nhận</a>
                <a href="#" class="list-group-item"><i class="far fa-user"></i> Tên khách hàng :Lâm Bé Ba</a>
                <a href="#" class="list-group-item"><i class="fas fa-phone"></i>SĐT: 098765543123</a>
                <a href="#" class="list-group-item"><i class="fas fa-map-marked"></i>Địa chỉ: CTY HUGE BAMBOO, KCN MỸ PHƯỚC 1, Thị xã Bến Cát, Tỉnh Bình Dương</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Thông tin đơn hàng</a>
                <a href="#" class="list-group-item"><i class="fas fa-motorcycle"></i>Loại xe: xe máy</a>
                <a href="#" class="list-group-item"><i class="fas fa-fire"></i>Giao hỏa tốc:có</a>
                <a href="#" class="list-group-item"><i class="fas fa-file-import"></i>Trường hợp: Giao chứng từ</a>
                <a href="#" class="list-group-item"><i class="fas fa-money-check-alt"></i>Phương thức thanh toán: tiền mặt</a>
                <a href="#" class="list-group-item"><i class="far fa-user"></i>Người thanh toán: Người gửi</a>
                <a href="#" class="list-group-item"><i class="fas fa-balance-scale"></i>Kích thước: 15x20cm</a>
                <a href="#" class="list-group-item"><i class="fas fa-balance-scale"></i>Cân nặng:0.5kg</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd"></i>Thu hộ: 100,000 VNĐ</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd"></i>Phí giao hàng: 70,000VND</a>
                <a href="#" class="list-group-item"><i class="fas fa-hand-holding-usd"></i>Tổng tiền: 170,000 VNĐ</a>
                <a href="#" class="list-group-item"><i class="far fa-comment-alt"></i>Ghi chú: giao trước 10h sáng</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Chi tiết vận chuyển</a>
                <a href="#" class="list-group-item"><i class="fas fa-info"></i> Trạng thái: Chưa giao</a>
                <a href="#" class="list-group-item"><i class="far fa-user"></i>Thủ kho: Hạnh Mỹ Phước</a>
                <a href="#" class="list-group-item"><i class="far fa-user"></i>Tài xế: Trương Tuấn Sang</a>
                <a href="#" class="list-group-item"><i class="fas fa-motorcycle"></i>Biển số xe: 61X1-12345</a>
                <a href="#" class="list-group-item"><i class="fas fa-phone"></i>SDT: 098765654341</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">Lịch sử giao hàng</a>
                <a href="#" class="list-group-item"><i class="fas fa-clock"></i>Thời gian đặt hàng:21/06/2019 14:32:32</a>
                <a href="#" class="list-group-item"><i class="fas fa-clock"></i>Thời gian giao:21/06/2019 14:32:32</a>
                <a href="#" class="list-group-item"><i class="fas fa-clock"></i>Thời gian hoàn thành:21/06/2019 14:32:32</a>
            </div>
        </div>
    </div>
</div>
@endsection