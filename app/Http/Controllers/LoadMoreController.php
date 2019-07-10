<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoadMoreController extends Controller
{
    function index()
    {
        return view('load_more');
    }

    function load_data(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::user()->id;
            if ($request->id > 0) {
                $data = DB::select("select od.sender_address,od.receive_address,o.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
        IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=$user_id AND o.id < $request->id
        ORDER BY o.id DESC
				LIMIT 5");
            } else {
                $data = DB::select("select od.sender_address,od.receive_address,o.*,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.sender_province_id),'') as sender_province_name,
        IFNULL((SELECT p.name FROM provinces p WHERE p.province_id=od.receive_province_id),'') as receive_province_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.sender_district_id),'') as sender_district_name,
        IFNULL((SELECT d.name FROM districts d WHERE d.id=od.receive_district_id),'') as receive_district_name,
        IFNULL((SELECT ot.name FROM others ot WHERE ot.id=o.car_type),'') as car_type
        FROM orders o, order_details od
        WHERE o.id=od.order_id AND o.user_id=$user_id
        ORDER BY o.id DESC
				LIMIT 5");
            }
            $output = '';
            $last_id = '';
            if ($data) {
                foreach ($data as $row) {
                    $output .= '
        <div>
        <p><a href="chi-tiet-don-hang/id=' . $row->id . '">
                <i class="fas fa-rocket"></i>
                #' . $row->code . '</a></p>
        <p>' . $row->name . ' </p>

        <p>' . $row->car_type . '</p>
        <p>' . $row->sender_district_name . ',' . $row->sender_province_name . ' </p>
        <p>' . $row->receive_district_name . ',' . $row->receive_province_name . '</p>
        <p>' . $row->created_at . '</p>
                    <p>' . $row->total_price . ' </p>
    </div>
        ';
                    $last_id = $row->id;
                }
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="' . $last_id . '" id="load_more_button">Load More</button>
       </div>
       ';
            } else {
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
            }
            echo $output;
        }
    }
}
