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

class Voucher extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'vouchers';

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
        'voucher_name',
        'voucher_code',
        'potongan_harga',
        'store_id',
        'sales_to_id',
        'status',
    ];

    public static function cehkVoucher($voucher_code)
    {
        $voucher = $voucher_code;

        $return = DB::table('vouchers as a')
            ->select('a.id', 'a.voucher_code', 'a.store_id', 'a.sales_to_id')
            ->where('a.voucher_code', $voucher)
            ->first();

        return $return;
    }
}
