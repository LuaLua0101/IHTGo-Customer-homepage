<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = "drivers";

    public static function updateLocation($id, $req)
    {
        return DB::table('drivers')
            ->where('user_id', $id)
            ->update(['lat' => $req->lat, 'lng' => $req->lng]);
    }
}
