<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$order->code}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('public/css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<style>
    body {
        margin: 1em;
        background-color: #FAFAFA;
        font-size: 12px;
    }

    .tltActive {
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
        border-top-left-radius: 0px !important;
        border-top-right-radius: 0px !important;
    }

    .logo-image {
        width: 10em
    }

    .tltContact {
        font-size: 1.5em;
    }

    .tltExpress {
        margin-left: -.5em;
        font-weight: bold;
        font-size: 5em !important;
    }

    i {
        padding-right: 1em
    }

    .tltHeading {
        font-weight: bold;
    }

    .col-md-6 {
        padding-left: 5px !important;
        padding-right: 5px !important
    }

    table td,table th {
        border: 1px solid #ddd!important;
        text-align: center;
    }

    table td {
        height: 14.5em;
    }

    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body>
    <div class="container-fluid" id="printable">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-lg-2">
                <img class="logo-image" src="{{ URL::asset('public/Images/Index/logo.png') }}" alt="logo" title="logo" />
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
                <h1 class="tltExpress">EXPRESS</h1>
            </div>

            <div class="col-md-3 col-sm-3 col-lg-3">
                <p class="tltContact"><i class="fas fa-phone"></i>0902 926 925</p>
                <p class="tltContact"><i class="fas fa-globe"></i>ihtgo.com.vn</p>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3">
                <p class="tltContact"><i class="fas fa-barcode"></i>{{$order->code}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="list-group">
                    <span class="list-group-item tltActive">{{ __('messages.sender_information') }}</span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">{{ __('messages.customer_name') }}:</span> {{$order->sender_name}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">{{ __('messages.phone') }}:</span> {{$order->sender_phone}}</span>
                    <span class="list-group-item"><i class="fas fa-map-marked"></i><span class="tltHeading">{{ __('messages.address') }}:</span>{{$order->sender_address}},{{$order->sender_district_name}}, {{$order->sender_province_name }} </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="list-group">
                    <span class="list-group-item tltActive">{{ __('messages.receiver_information') }}:</span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">{{ __('messages.customer_name') }}:</span> {{$order->receive_name}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">{{ __('messages.phone') }}:</span> {{$order->receive_phone}}</span>
                    <span class="list-group-item"><i class="fas fa-map-marked"></i><span class="tltHeading">{{ __('messages.address') }}:</span>{{$order->receive_address}}, {{$order->receive_district_name}}, {{$order->receive_province_name }} </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="list-group">
                    <span class="list-group-item tltActive">{{ __('messages.order_information') }}</span>
                    <span class="list-group-item"><i class="fas fa-rocket"></i><span class="tltHeading">{{ __('messages.express_delivery') }}:</span>
                        @if($order->is_speed==1)
                        <span class="bage-success">{{ __('messages.yes') }}</span>
                        @else<span class="bage-basic"> {{ __('messages.no') }}</span>@endif </span>
                    <span class="list-group-item"><i class="fas fa-file-import"></i><span class="tltHeading">{{ __('messages.case') }}:</span>
                        @if($order->car_option=='1')
                        <span class="bage-info">{{ __('messages.delivery_in_province') }}</span>
                        @elseif($order->car_option=='2')
                        <span class="bage-success">{{ __('messages.delivery_of_documents') }} </span>
                        @elseif($order->car_option=='3')
                        <span class="bage-primary">{{ __('messages.delivery_outside_province') }}</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="fas fa-money-check-alt"></i><span class="tltHeading">{{ __('messages.pay') }}:</span>
                        @if($order->is_payment==0)
                        <span class="bage-basic"> {{ __('messages.unpaid') }}</span>
                        @elseif($order->is_payment==1)
                        <span class="bage-success"> {{ __('messages.paid') }}</span>
                        @elseif($order->is_payment==2)
                        <span class="bage-danger">{{ __('messages.debit') }}</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">{{ __('messages.payer') }}:</span>
                        @if($order->payer==1)
                        <span class="bage-info">{{ __('messages.receicer') }}</span>
                        @elseif($order->payer==2)
                        <span class="bage-success">{{ __('messages.sender') }}</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="fas fa-ruler-combined"></i><span class="tltHeading">{{ __('messages.size') }}(cm):</span> </span>
                    <span class="list-group-item"><i class="fas fa-balance-scale"></i><span class="tltHeading">{{ __('messages.weight') }}(kg):</span>{{$order->weight}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">{{ __('messages.cash_on_delivery') }}:</span> {{number_format($order->take_money).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">{{ __('messages.delivery_charges') }}:</span> {{number_format($order->total_price).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="fas fa-hand-holding-usd"></i><span class="tltHeading">{{ __('messages.total_money') }}:</span> {{number_format($order->total_price + $order->take_money).' VNĐ'}}</span>
                    <span class="list-group-item"><i class="far fa-comment-alt"></i><span class="tltHeading">{{ __('messages.note') }}:</span>{{$order->note}}</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="list-group">
                    <span class="list-group-item tltActive">{{ __('messages.shipping_details') }}</span>
                    <span class="list-group-item"><i class="fas fa-info"></i><span class="tltHeading">{{ __('messages.status') }}:</span>
                        <!-- Trạng thái đơn hàng -->
                        @if($order->status==1)
                        <span class="bage-warning">{{ __('messages.waiting') }} </span>
                        @elseif($order->status==2)
                        <span class="bage-info">{{ __('messages.no_delivery') }}</span>
                        @elseif($order->status==3)
                        <span class="bage-info">{{ __('messages.being_delivery') }} </span>
                        @elseif($order->status==4)
                        <span class="bage-success">{{ __('messages.succeeded') }}</span>
                        @elseif($order->status==5)
                        <span class="bage-basic">{{ __('messages.customer_cancel') }} </span>
                        @elseif($order->status==6)
                        <span class="bage-basic">{{ __('messages.iht_cancel') }}</span>
                        @elseif($order->status==7)
                        <span class="bage-danger">{{ __('messages.unsuccessful') }}</span>
                        @endif
                    </span>
                    <span class="list-group-item"><i class="far fa-user"></i><span class="tltHeading">{{ __('messages.driver') }}:</span>{{$order->receive_shipper_name}} </span>
                    <span class="list-group-item"><i class="fas fa-motorcycle"></i><span class="tltHeading">{{ __('messages.license_plates') }}:</span> {{$order->receive__shipper_car}}</span>
                    <span class="list-group-item"><i class="fas fa-phone"></i><span class="tltHeading">{{ __('messages.phone') }}:</span> {{$order->receive__shipper_phone}}</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Họ tên & chữ ký tài xế</th>
                            <th>Họ tên & chữ ký người gửi</th>
                            <th>Họ tên & chữ ký người nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>(Đã kiểm tra không khiếu nại)</td>
                        </tr>
                    </tbody>

            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        window.print();
    });
</script>