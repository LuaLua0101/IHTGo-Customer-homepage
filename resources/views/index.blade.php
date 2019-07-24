@extends('layouts.customer')
@section('content')


<div class="body-wrap">


    <!--Body Index-->
    <div class="body-index">
        <div class="container-fluid">
            <!--First Banner-->

            <!----------------------Carousel Top Banner---------------------->
            <div class="container-fluid">
                <div class="row-fluid carousel slide" id="bannerTop-carousel-slide" data-ride="carousel" data-interval="5000" data-pause="hover">
                    <!--Indicator-->

                    <!--Wrapper for slide-->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img id="firstBanner" class="firstbannerimg" src="public/Images/FileUpload/images/TrangChu/index_banner.jpg" alt="banner" title="banner" style="width:100%;" />
                        </div>
                    </div>
                    <!--Left & Right control-->

                </div>
            </div>
            <!----------------------END Carousel Top Banner---------------------->


            <div class="container-fluid three-col-serv-wrap">
                <!-------------Three Col IHT Service-------------->
                <div class="three-col-serv-in-1">
                    <div class="row-fluid center-text">
                        <br />
                        <h2 class="fWeiBold">DỊCH VỤ IHT GO</h2>
                       
                        <p style="font-size: 18px;"><span class="fWeiBold">IHT GO</span> - lựa chọn kết nối của chủ shop và khách hàng</p><br />
                    </div>
                </div>

                <div class="container-fluid three-col-serv-in-2">
                    <div class="three-col-serv-in-2-in">
                        <div class="col-md-4 col-md-push-1">
                            <div style="text-align:center;">
                                <img src="public/Images/Index/three-col-1.png" width="143" height="143" />
                            </div>
                            <div class="three-col-iht-service-text"><br>Giao hàng trong ngày</div>
                            <div class="three-col-iht-service-text">nội tỉnh và nội thành</div>
                            <div class="three-col-iht-service-text">&nbsp;</div>
                        </div>
                        <div class="col-md-4">
                            <div style="text-align:center;">
                                <img src="public/Images/Index/three-col-2.png" width="143" height="143" />
                            </div>
                            <div class="three-col-iht-service-text"><br>Giao chứng từ trong ngày</div>
                            <div class="three-col-iht-service-text">từ TP.HCM - BÌNH DƯƠNG và ngược lại</div>
                            <div class="three-col-iht-service-text">&nbsp;</div>
                        </div>
                        <div class="col-md-4 col-md-pull-1">
                            <div style="text-align:center;">
                                <img src="public/Images/Index/three-col-3.png" width="143" height="143" />
                            </div>
                            <div class="three-col-iht-service-text"><br>Giao hàng hỏa tốc</div>
                            <div class="three-col-iht-service-text">trong ngày</div>
                            <div class="three-col-iht-service-text">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <!-------------END Three Col IHT Service-------------->
                <!--Second Banner-->
                <div class="row-fluid">
                    <a href="#!">
                        <img src="public/Images/FileUpload/images/TrangChu/middle-2.png" alt="banner-01.png" title="banner-01.png" style="width:100%;height:80%;">
                    </a>
                </div>

                <!-----------------Octopus Section----------------->
                <div class="features-area">
                    <div class="" style="padding-bottom:2%;">
                        <br />
                        <h2 style="text-align: center; font-weight:bold;">TẠI SAO BẠN PHẢI CHỌN IHT GO</h2><br />
                    </div>
                    <!--Octopus Section show on computer-->
                    <div class="octopusSectionComputer">
                        <div class="col-sm-6 octopus-image-row">
                            <div class="octopus-image pull-right">
                                <img src="public/Images/Index/mobile.png" alt="why choose image" />
                            </div>
                        </div>
                        <div class="col-sm-6 octopus-5-image">
                            <div class="row single-item">
                                <div class="col-sm-3 single-item-icon">
                                    <img src="public/Images/Index/1.png" />
                                </div>
                                <div class="col-sm-9 single-item-text">
                                    <div style="padding:1% 0">
                                        <div class="whyChooseText"><strong>THEO DÕI ĐƠN HÀNG</strong></div>
                                        <p>
                                            Cung cấp vị trí, lộ trình, thời gian của tài xế <br />
                                            trên ứng dụng IHT GO <br />
                                            hiển thị vị trí tài xế trên google map
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row single-item">
                                <div class="col-sm-3 single-item-icon">
                                    <img src="public/Images/Index/2.png" alt="" />
                                </div>
                                <div class="col-sm-9 single-item-text">
                                    <div style="padding:1% 0;">
                                        <div class="whyChooseText"><strong>LẤY HÀNG TẬN NƠI</strong></div>
                                        <p>
                                            Nhân viên IHT GO sẽ có mặt <br />
                                            trong thời gian nhanh nhất <br />
                                            đến nơi khách hàng yêu cầu nhận hàng
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item row">
                                <div class="col-sm-3 single-item-icon">
                                    <img src="public/Images/Index/3.png" alt="" />
                                </div>
                                <div class="col-sm-9 single-item-text">
                                    <div style="padding: 4.5% 0;">
                                        <div class="whyChooseText"><strong>THU HỘ TIỀN</strong></div>
                                        <p>IHT GO giao hàng và thu tiền hộ khách</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item row">
                                <div class="col-sm-3 single-item-icon">
                                    <img src="public/Images/Index/4.png" alt="" />
                                </div>
                                <div class="col-sm-9 single-item-text">
                                    <div style="padding:2.5% 0;">
                                        <div class="whyChooseText"><strong>TÍNH PHÍ TỰ ĐỘNG</strong></div>
                                        <p>
                                            Khách hàng sẽ biết được chi phí vận chuyển <br />
                                            khi tài xế đến nhận và giao hàng
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-item row">
                                <div class="col-sm-3 single-item-icon">
                                    <img src="public/Images/Index/5.png" alt="" />
                                </div>
                                <div class="col-sm-9 single-item-text">
                                    <div style="padding:2.5% 0;">
                                        <div class="whyChooseText"><strong>THÙNG GIỮ NHIỆT</strong></div>
                                        <p>
                                            Giúp hàng hóa được giao đảm bảo <br />
                                            an toàn trên mọi cung đường
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End octopus Section show on computer-->
                    <!--Octopus Section show on Phone-->
                    <div class="container-fluid three-col-serv-in-2 octopusSectionPhone">
                        <div class="three-col-serv-in-2-in">
                            <div class="col-md-2">
                                <div class="single-item-icon-mobile" style="margin: 0 auto;">
                                    <img src="public/Images/Index/1.png" />
                                </div>
                                <div class="ocSecContent" style="padding:2% 0; text-align: center;">
                                    <div class="whyChooseText"><strong>THEO DÕI ĐƠN HÀNG</strong></div>
                                    <p>
                                        Cung cấp vị trí, lộ trình, thời gian của tài xế <br />
                                        trên ứng dụng IHT GO <br />
                                        hiển thị vị trí tài xế trên google map
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single-item-icon-mobile" style="margin: 0 auto;">
                                    <img src="public/Images/Index/2.png" />
                                </div>
                                <div class="ocSecContent" style="padding:2% 0; text-align: center;">
                                    <div class="whyChooseText"><strong>LẤY HÀNG TẬN NƠI</strong></div>
                                    <p>
                                        Nhân viên IHT GO sẽ có mặt <br />
                                        trong thời gian nhanh nhất <br />
                                        đến nơi khách hàng yêu cầu nhận hàng
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single-item-icon-mobile" style="margin: 0 auto;">
                                    <img src="public/Images/Index/3.png" />
                                </div>
                                <div class="ocSecContent" style="padding:2% 0; text-align: center;">
                                    <div class="whyChooseText"><strong>THU HỘ TIỀN</strong></div>
                                    <p>IHT GO giao hàng và thu tiền hộ khách</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single-item-icon-mobile" style="margin: 0 auto;">
                                    <img src="public/Images/Index/4.png" />
                                </div>
                                <div class="ocSecContent" style="padding:2% 0; text-align: center;">
                                    <div class="whyChooseText"><strong>TÍNH PHÍ TỰ ĐỘNG</strong></div>
                                    <p>
                                        Khách hàng sẽ biết được chi phí vận chuyển <br />
                                        khi tài xế đến nhận và giao hàng
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="single-item-icon-mobile" style="margin: 0 auto;">
                                    <img src="public/Images/Index/5.png" />
                                </div>
                                <div class="ocSecContent" style="padding:2% 0; text-align: center;">
                                    <div class="whyChooseText"><strong>THÙNG GIỮ NHIỆT</strong></div>
                                    <p>
                                        Giúp hàng hóa được giao đảm bảo <br />
                                        an toàn trên mọi cung đường
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END octopus Section show on Phone-->
                </div>
                <!--END Octopus Section----------------->
            </div>
            <!--END Three Col IHT Service-->
        </div>
        <div class="clearfix"></div>
        <!--END Price List------------------->
        <!-------------------User Guide--------------------->
        <div class="container">
            <div class="row-fluid center-text">
                <h2><span class="text-uppercase" style="font-size: 24px;"><strong>hướng dẫn sử dụng app</strong></span></h2>
            </div>
            <div class="user-guide-wrap">
                <div class="user-guide owl-carousel owl-theme animated">
                    <div class="user-guide-images">
                        <a href="public/Images/FileUpload/images/1.JPEG" data-toggle="lightbox" data-gallery="example-gallery">
                            <div class="user-guide-images-inner">
                                <img src="public/Images/FileUpload/images/1.JPEG" />
                                <div class="hover"></div>
                            </div>
                        </a>
                    </div>
                    <div class="user-guide-images">
                        <a href="public/Images/FileUpload/images/2.JPEG" data-toggle="lightbox" data-gallery="example-gallery">
                            <div class="user-guide-images-inner">
                                <img src="public/Images/FileUpload/images/2.JPEG" />
                                <div class="hover"></div>
                            </div>
                        </a>
                    </div>
                    <div class="user-guide-images">
                        <a href="public/Images/FileUpload/images/3.JPEG" data-toggle="lightbox" data-gallery="example-gallery">
                            <div class="user-guide-images-inner">
                                <img src="public/Images/FileUpload/images/3.JPEG" />
                                <div class="hover"></div>
                            </div>
                        </a>
                    </div>
                    <div class="user-guide-images">
                        <a href="public/Images/FileUpload/images/4.JPEG" data-toggle="lightbox" data-gallery="example-gallery">
                            <div class="user-guide-images-inner">
                                <img src="public/Images/FileUpload/images/4.JPEG" />
                                <div class="hover"></div>
                            </div>
                        </a>
                    </div>
                    <div class="user-guide-images">
                        <a href="public/Images/FileUpload/images/5.JPEG" data-toggle="lightbox" data-gallery="example-gallery">
                            <div class="user-guide-images-inner">
                                <img src="public/Images/FileUpload/images/5.JPEG" />
                                <div class="hover"></div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!--END User Guide--------------------->
        <div class="h50px"></div>
    </div>

</div>
@endsection