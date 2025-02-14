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


class Store extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'stores';

    protected $keyType = 'string';
    public $incrementing = false;


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
        });
    }

    protected $fillable = [
        'store_name',
        'alamat',
        'jam_operasional',
        'mitra_id',
        'sales_mitra_id',
        'kota',
        'provinsi',
        'no_hp',
        'email',
        'status',
    ];

    // query modul shop
    public static function getStore($search)
    {
        if ($search == null) {
            $data['data'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('stores.status', 1)
                ->paginate(2);  // Mengambil semua store
            $data['count'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('stores.status', 1)
                ->count();  // Mengambil semua store
        } else {
            $data['data'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('kota', 'like', '%' . $search . '%')
                ->where('stores.status', 1)
                ->paginate(2);  // Mengambil semua store
            $data['count'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('kota', 'like', '%' . $search . '%')
                ->where('stores.status', 1)
                ->count();  // Mengambil semua store
        }

        return  $data;
    }

    public static function getStoreList($page = null, $search = null)
    {
        if ($search == null) {
            $data['data'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('stores.status', 1)
                ->paginate(2, ['*'], 'page', $page);
        } else {
            $data['data'] =  DB::table('stores')
                ->leftJoin('users', 'stores.id', '=', 'users.store_id')
                ->select('stores.*', 'users.store_id')
                ->where('kota', 'like', '%' . $search . '%')
                ->where('stores.status', 1)
                ->paginate(2, ['*'], 'page', $page);
        }

        return  $data;
    }

    public static function updateUserStore($user_id, $store_id)
    {
        $data = [
            'store_id' => $store_id,
        ];

        $user = DB::table('users')
            ->where('id', $user_id)
            ->update($data);

        return $user;
    }

    public static function getSalesMitraId($id)
    {
        $return = DB::table('stores as a')
            ->select('a.id', 'a.sales_mitra_id')
            ->where('a.id', $id)
            ->first();

        return $return;
    }

    public static function cekStore($user_id)
    {
        $return = DB::table('users as a')
            ->leftJoin('stores as b', 'a.store_id', '=', 'b.id')
            ->select('a.id', 'a.store_id', 'b.store_name')
            ->where('a.id', $user_id)
            ->first();

        return $return;
    }

    // query modul panel
    public static function getUserMitra()
    {
        $data = DB::table('users')->get();

        return $data;
    }
    public static function getUserAkuisisi()
    {
        $data = DB::table('users')->get();

        return $data;
    }
}
