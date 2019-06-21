@extends('layouts.customer')
@section('content')
<div class="body-wrap">

    <div class="topHeight"></div>
    <div class="container pricelist-wrap">
        <h1 style="text-align:center">
                <span style="color:#e50303"><strong>BẢNG GIÁ GIAO HÀNG</strong>
            </span>
        </h1>
<br/>
        <!--GIAO HANG NOI TINH-->
        <section class="bang-gia">
            <h4><span>I. GIAO HÀNG TRONG NGÀY NỘI THÀNH PHỐ HỒ CHÍ MÌNH VÀ BÌNH DƯƠNG</span></h4>
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <table>
                        <tbody>
                            <tr>
                                <th><span><strong>PHƯƠNG TIỆN VẬN CHUYỂN</strong></span></th>
                                <th><span><strong>TRỌNG LƯỢNG TỐI ĐA (KG)</strong></span></th>
                                <th><span><strong>CƯỚC PHÍ (VND)</strong></span></th>
                            </tr>
                            <tr>
                                <td>GIAO HÀNG BẰNG XE MÁY <i class="fas fa-motorcycle"  style='color:#e50303'></i></td>
                                <td>25 KG</td>
                                <td>70.000 VND</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-7 col-sm-12">
                    <table>
                        <tbody>
                            <tr>
                                <th><span><strong>PHƯƠNG TIỆN VẬN CHUYỂN</strong></span></th>
                                <th><span><strong>CƯỚC PHÍ BAN ĐẦU (VND)</strong></span></th>
                                <th><span><strong>CƯỚC PHÍ THÊM</strong></span></th>
                                <th><span><strong>THÊM ĐỊA ĐIỂM GIAO HÀNG</strong></span></th>
                            </tr>
                            <tr>
                                <td>GIAO HÀNG BẰNG XE TẢI <i class="fas fa-truck"  style='color:#e50303'></i></td>
                                <td>70.000 VND</td>
                                <td>(+ 3,000 x SỐ KG)</td>
                                <td>(+ 70,000 VND)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <br />

        <!--GIAO CHUNG TU TP.HCM-BINH DUONG VA NGUOC LAI-->
        <section class="bang-gia">
            <h4><span>II. GIAO CHỨNG TỪ TRONG NGÀY TỪ TP.HCM-BÌNH DƯƠNG VÀ NGƯỢC LẠI</span></h4>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table>
                        <tbody>
                            <tr>
                                <th class="col-md-6"><span><strong>HÀNH TRÌNH</strong></span></th>
                                <th class="col-md-6"> <span><strong>CƯỚC PHÍ (VND)</strong></span></th>
                            </tr>
                            <tr>
                                <td>TP. HỒ CHÍ MINH <i class="fas fa-exchange-alt" style='color:#e50303'></i> BÌNH DƯƠNG</td>
                                <td>70,000 VND</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <br />
        <!--GIAO HANG NGOAI TỈNH-->
        <section class="bang-gia">
            <h4><span>III. GIAO HÀNG NGOẠI TỈNH</span></h4>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table>
                        <tbody>
                            <tr>
                                <th colspan="2"><span><strong>HÀNH TRÌNH</strong></span></th>
                                <th rowspan="2"><span><strong>CƯỚC PHÍ (VND)</strong></span></th>
                                <th rowspan="2"><span><strong>TRỌNG LƯỢNG TỐI ĐA (KG)</strong></span></th>
                            </tr>
                            <tr>
                                <td class="title-price"><i class="fas fa-walking"></i></td>
                                <td class="title-price"><i class="fas fa-map-marked-alt"></i></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <!--BÌNH DƯƠNG-->
                            <tr>
                                <td rowspan="5">BÌNH DƯƠNG</td>
                                <td>TP. HỒ CHÍ MINH</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>ĐỒNG NAI</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>TÂY NINH</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>LONG AN</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>BÌNH PHƯỚC</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <!--TP.HCM-->
                            <tr>
                                <td rowspan="5">TP. HỒ CHÍ MÌNH</td>
                                <td>BÌNH DƯƠNG</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>ĐỒNG NAI</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>TÂY NINH</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>LONG AN</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                            <tr>
                                <td>BÌNH PHƯỚC</td>
                                <td>140,000 VND</td>
                                <td>25 KG</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
<br/>
        <!--HỎA TỐC-->
        <section class="bang-gia">
            <h4><span>IV. DỊCH VỤ GIAO HÀNG HỎA TỐC </span></h4>
            <p>DỰA VÀO BẢNG GIÁ Ở TRÊN VÀ NHÂN ĐÔI CƯỚC PHÍ CHO DỊCH VỤ GIAO HÀNG MÀ BẠN CHỌN</p>
        </section>
    </div>
<br/>

</div>
@endsection