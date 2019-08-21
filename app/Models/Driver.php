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
    public static function findDriver()
    {

        return DB::table('drivers as d')
            ->join('users as u','u.id','=','d.user_id')
            ->where('d.deleted_at', null)
            ->select('u.id','u.name','d.lng','d.lat')
            ->get();
    }
}
