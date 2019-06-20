@extends('layouts.customer')
@section('content')
<div class="body-wrap">

    <div class="topHeight"></div>
    <div class="container margin-auto news-body">
        <div class="row center-text">
            <h2 style="margin: -1.5%;"><span style="font-size: 24px; text-transform:uppercase; color:#e50303;"><strong>tin tức</strong></span></h2>
        </div>
        <div class="h50px"></div>
        <div class="datalist-news">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="news-item">
                    <div class="inner-item">
                        <a href="noi-dung">
                            <img src="public/Images/FileUpload/images/TrangChu/index_banner.jpg" style="width:100%; height: 170px;" />
                        </a>
                        <a class="title" href="/Home/NewsDetails/1">IHTGO website ch&#237;nh thức l&#234;n s&#243;ng!!!</a>
                        <div class="content">
                            IHTGO website ch&#237;nh thức l&#234;n s&#243;ng tr&#234;n internet v&#224;o ng&#224;y 17/08/2018
                        </div>
                        <div class="date">
                            17/08/2018
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="paged-divide">
                    <div class="pagination-container">
                        <ul class="pagination">
                            <li class="active"><a>1</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection