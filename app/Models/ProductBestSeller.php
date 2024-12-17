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

class ProductBestSeller extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'product_best_sellers';

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
        'status',
    ];

    public static function getProductBestSeller()
    {
        $data = DB::table('product_best_sellers as a')
            ->leftJoin('product_variants as b', 'a.product_variant_id', '=', 'b.id')
            ->leftJoin('products as c', 'b.product_id', '=', 'c.id')
            ->select('a.*', 'b.product_variants_img1', 'b.harga_diskon', 'c.product_name', 'c.product_img')
            ->where('a.status', 1)
            ->whereNull('a.deleted_at')
            ->get()
            ->toArray();

        return $data;
    }
}
