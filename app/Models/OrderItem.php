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
    protected $table = 'checkouts';

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
        'kode_voucher',
        'harga',
        'total_harga',
        'status',
    ];
}
