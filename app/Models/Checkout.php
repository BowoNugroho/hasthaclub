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

class Checkout extends Model
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

        static::creating(function ($model) {
            $latestInvoice = Checkout::orderBy('created_at', 'desc')->first();
            $invoiceNumber = $latestInvoice ? intval(substr($latestInvoice->invoice, 12)) + 1 : 1;
            $model->invoice = 'INV' . date('Ymd') . str_pad($invoiceNumber, 6, '0', STR_PAD_LEFT); // Generates INV-000001, INV-000002, etc.  
        });
    }

    protected $fillable = [
        'invoice',
        'cart_id',
        'user_id',
        'store_id',
        'sales_mitra_id',
        'sales_to_id',
        'customer_name',
        'customer_no_hp',
        'customer_email',
        'customer_alamat',
        'total_harga',
        'harga',
        'pick_up_type',
        'order_status',
        'bukti_pembayaran_img',
        'status_pembayaran',
        'tgl_pembelian',
        'tgl_pembayaran',
        'status_pembayaran',
        'status',
    ];

    public static function getInvoice($co_id)
    {
        $data = DB::table('checkouts as a')
            ->select('a.id as co_id', 'a.cart_id', 'a.invoice')
            ->where('a.id', $co_id)
            ->first();

        return $data;
    }

    public static function cekCo($dt)
    {
        $return = DB::table('checkouts as a')
            ->select('a.id', 'a.user_id', 'a.cart_id')
            ->where('a.cart_id', $dt['cart_id'])
            ->where('a.user_id', $dt['user_id'])
            ->first();

        return $return;
    }

    public static function getUser($user_id)
    {
        $return = DB::table('users as a')
            ->select('a.*')
            ->where('a.id', $user_id)
            ->first();

        return $return;
    }

    public static function cekInvoice()
    {
        $return = DB::table('checkouts as a')
            ->select('a.id', 'a.invoice')
            ->whereNotNull('a.invoice')
            ->orderBy('a.created_at', 'desc')
            ->first();
        return $return;
    }

    public static function getCartItem($id)
    {
        $data = DB::table('checkouts as a')
            ->leftJoin('cart_items as b', 'a.cart_id', '=', 'b.cart_id')
            ->select('a.id as co_id', 'b.product_variant_id', 'b.sales_mitra_id', 'b.sales_to_id', 'b.qty', 'b.voucher_code', 'b.voucher_id', 'b.harga', 'b.potongan_harga', 'b.total_harga')
            ->where('a.id', $id)
            ->whereNull('b.deleted_at')
            ->get()->toArray();
        return $data;
    }

    public static function getCartId($co_id)
    {
        $data = DB::table('checkouts as a')
            ->select('a.id as co_id', 'a.cart_id')
            ->where('a.id', $co_id)
            ->whereNull('a.deleted_at')
            ->first();

        return $data;
    }

    public static function getRiwayatCo($user_id)
    {
        $data = DB::table('checkouts as a')
            ->select('a.*')
            ->where('a.user_id', $user_id)
            ->orderBy('a.created_at', 'desc')
            ->whereNotNull('a.order_status')
            ->get()->toArray();

        return $data;
    }
}
