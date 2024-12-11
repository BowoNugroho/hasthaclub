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

class CartItem extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'cart_items';

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
        'cart_id',
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

    public static function cekCartItembyProductVariantId($product_variant_id, $cart_id)
    {
        $return = DB::table('cart_items as a')
            ->select('a.*')
            ->where('a.product_variant_id', $product_variant_id)
            ->where('a.cart_id', $cart_id)
            ->whereNull('a.deleted_at')
            ->first();

        return $return;
    }

    public static function countCart($id)
    {
        $return = DB::table('cart_items as a')
            ->select('a.qty')
            ->where('a.cart_id', $id)
            ->whereNull('a.deleted_at')
            ->sum('a.qty');

        return $return;
    }

    public static function getProduct($cart_id)
    {
        $return = DB::table('cart_items as a')
            ->leftJoin('product_variants as b', 'a.product_variant_id', '=', 'b.id')
            ->leftJoin('products as c', 'b.product_id', '=', 'c.id')
            ->leftJoin('colors as d', 'b.color_id', '=', 'd.id')
            ->leftJoin('capacities as e', 'b.capacity_id', '=', 'e.id')
            ->select('a.*', 'c.product_img', 'c.product_name', 'd.color_name', 'e.capacity_name')
            ->where('a.cart_id', $cart_id)
            ->where('a.status', 1)
            ->whereNull('a.deleted_at')
            ->get()->toArray();

        return $return;
    }

    public static function sumHarga($cart_id)
    {
        $return = DB::table('cart_items as a')
            ->select('a.*',)
            ->where('a.cart_id', $cart_id)
            ->where('a.status', 1)
            ->whereNull('a.deleted_at')
            ->sum('a.total_harga');

        return $return;
    }
}
