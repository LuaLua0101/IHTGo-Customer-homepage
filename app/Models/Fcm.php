<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fcm extends Model
{
    protected $table = "devices";

    public static function updateFcm($user_id, $fcm)
    {
        if (DB::table('devices')
            ->where('user_id', $user_id)->first()) {
            return DB::table('devices')
                ->where('user_id', $user_id)
                ->update(['fcm' => $fcm]);
        } else {
            return DB::table('devices')->insertGetId(
                ['user_id' => $user_id, 'fcm' => $fcm]
            );
        }

    }
}
