<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Blameable;
use App\Traits\UuidTraits;
use Illuminate\Support\Facades\DB;


class ModelHasRole extends Model
{
    protected $table = 'model_has_roles';

    public static function getRole()
    {
        $data = DB::table('roles')->get();

        return $data;
    }
    public static function getUser()
    {
        $data = DB::table('users')->get();

        return $data;
    }
    public static function getHasRolebyModelId($model_id)
    {
        $data = DB::table('model_has_roles')
            ->where('model_id', $model_id)
            ->get();

        return $data;
    }
}
