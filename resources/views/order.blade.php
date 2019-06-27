@extends('layouts.customer')
@section('content')
<div class="body-wrap">
    <div class="topHeight"></div>
    <div class="container margin-auto news-body">
        <div class="row center-text">
            <h2 style="margin: -1.5%;"><span style="font-size: 24px; text-transform:uppercase; color:#e50303;"><strong>Đơn hàng</strong></span></h2>
        </div>
        <div class="h50px"></div>
        <div class=" form-search-order ">
            <div class="form-inline ">
                <div class="form-group">
                    <label>Ngày bắt đầu: </label>
                    <input type="date" /></li>
                </div>
                <div class="form-group ">
                    <label>Ngày kết thúc: </label>
                    <input type="date" /></li>
                </div>
                <div class="form-group"style="margin-left:1em">
                    <button type="button" class="btn btn-danger" >Tìm</button>
                </div>
                <div class="form-group" style="    float: right;"> <label class="">Tổng tiền: 200,000 VNĐ </label></div>
            </div>

        </div>
    </div>
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home">Tất cả</a></li>
            <li><a data-toggle="pill" href="#menu1">Đơn mới</a></li>
            <li><a data-toggle="pill" href="#menu2">Đơn đang giao</a></li>
            <li><a data-toggle="pill" href="#menu3">Đã hoàn thành</a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên</th>
                            <th>Loại xe</th>
                            <th>Địa chỉ gửi</th>
                            <th>Địa chỉ nhận</th>
                            <th>Ngày tạo</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>

                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="menu1" class="tab-pane fade">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên</th>
                            <th>Loại xe</th>
                            <th>Địa chỉ gửi</th>
                            <th>Địa chỉ nhận</th>
                            <th>Ngày tạo</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>

                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="menu2" class="tab-pane fade">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên</th>
                            <th>Loại xe</th>
                            <th>Địa chỉ gửi</th>
                            <th>Địa chỉ nhận</th>
                            <th>Ngày tạo</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>

                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="menu3" class="tab-pane fade">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên</th>
                            <th>Loại xe</th>
                            <th>Địa chỉ gửi</th>
                            <th>Địa chỉ nhận</th>
                            <th>Ngày tạo</th>
                            <th>Thanh toán</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ VNĐ</td>
                        </tr>
                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ VNĐ</td>
                        </tr>

                        <tr>
                            <td><a href="{!! url('chi-tiet-don-hang'); !!}"> #qqqqq</a></td>
                            <td>abc</td>
                            <td>Xe máy</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>Thị xã Bến Cát Tỉnh Bình Dương</td>
                            <td>2019-06-21 10:37:33</td>
                            <td>Ghi nợ</td>
                            <td>134,0999 VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection