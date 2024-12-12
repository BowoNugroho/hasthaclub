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


class OrderItem extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'order_items';

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
        'product_variant_id',
        'checkout_id',
        'store_id',
        'sales_mitra_id',
        'sales_to_id',
        'qty',
        'voucher_code',
        'voucher_id',
        'harga',
        'total_harga',
        'status',
    ];

    public static function sumHarga($co_id)
    {
        $return = DB::table('order_items as a')
            ->select('a.*',)
            ->where('a.checkout_id', $co_id)
            ->where('a.status', 1)
            ->whereNull('a.deleted_at')
            ->sum('a.total_harga');

        return $return;
    }
}
