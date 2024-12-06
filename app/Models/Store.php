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
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable;
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
        'status',
    ];

    public static function getStore()
    {
        $data['data'] =  DB::table('stores')
            ->leftJoin('users', 'stores.id', '=', 'users.store_id')
            ->select('stores.*', 'users.store_id')
            ->paginate(2);  // Mengambil semua store
        $data['count'] =  DB::table('stores')
            ->leftJoin('users', 'stores.id', '=', 'users.store_id')
            ->select('stores.*', 'users.store_id')
            ->count();  // Mengambil semua store

        return  $data;
    }

    public static function getStoreList($page = null)
    {
        $data['data'] =  DB::table('stores')
            ->leftJoin('users', 'stores.id', '=', 'users.store_id')
            ->select('stores.*', 'users.store_id')
            ->paginate(2, ['*'], 'page', $page);

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
}
