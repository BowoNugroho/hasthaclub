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

class ProductVariant extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UuidTraits, HasRoles, Blameable, SoftDeletes;
    protected $table = 'product_variants';

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
        'product_id',
        'color_id',
        'harga',
        'harga_diskon',
        'stock',
        'deskripsi',
        'capacity_id',
        'status',
    ];

    public static function getProductVariantbySeacrh($dt, $colors)
    {
        $brand = $dt['category'];
        $search_product = $dt['search_product'];

        $data['data'] = DB::table('product_variants as a')
            ->leftJoin('products as b', 'a.product_id', '=', 'b.id')
            ->leftJoin('colors as c', 'a.color_id', '=', 'c.id')
            ->leftJoin('capacities as d', 'a.capacity_id', '=', 'd.id')
            ->leftJoin('brands as e', 'b.brand_id', '=', 'e.id')
            ->select('a.*', 'b.product_name', 'b.product_img', 'c.color_name', 'd.capacity_name', 'e.brand_name')
            ->when($brand, function ($query) use ($brand) {
                return $query->where('e.brand_name', 'like', '%' . $brand . '%');
            })
            ->when($search_product, function ($query) use ($search_product) {
                return $query->where('b.product_name', 'like', '%' . $search_product . '%');
            })
            ->when(count($colors) > 0, function ($query) use ($colors) {
                return $query->whereIn('a.color_id', $colors);
            })
            ->whereNull('a.deleted_at')
            ->get()->toArray();

        $data['count'] = DB::table('product_variants as a')
            ->leftJoin('products as b', 'a.product_id', '=', 'b.id')
            ->leftJoin('colors as c', 'a.color_id', '=', 'c.id')
            ->leftJoin('capacities as d', 'a.capacity_id', '=', 'd.id')
            ->leftJoin('brands as e', 'b.brand_id', '=', 'e.id')
            ->select('a.*', 'b.product_name', 'b.product_img', 'c.color_name', 'd.capacity_name', 'e.brand_name')
            ->when($brand, function ($query) use ($brand) {
                return $query->where('e.brand_name', 'like', '%' . $brand . '%');
            })
            ->when($search_product, function ($query) use ($search_product) {
                return $query->where('b.product_name', 'like', '%' . $search_product . '%');
            })
            ->when(count($colors) > 0, function ($query) use ($colors) {
                return $query->whereIn('a.color_id', $colors);
            })
            ->whereNull('a.deleted_at')
            ->count();

        return $data;
    }

    public static function getProductVariantby1($id)
    {
        $data = DB::table('product_variants as a')
            ->leftJoin('products as b', 'a.product_id', '=', 'b.id')
            ->leftJoin('colors as c', 'a.color_id', '=', 'c.id')
            ->leftJoin('capacities as d', 'a.capacity_id', '=', 'd.id')
            ->select('a.*', 'b.product_name', 'b.product_img', 'b.deskripsi as deskripsi_product', 'b.fitur', 'c.color_name',  'd.capacity_name')
            ->where('a.id', $id)
            ->first();

        return $data;
    }

    public static function getProductVariantWarnaby1($id)
    {
        $data = DB::table('product_variants as a')
            ->leftJoin('colors as c', 'a.color_id', '=', 'c.id')
            ->select('a.color_id', 'c.color_name', DB::raw('COUNT(a.id) as variant_count'))
            ->where('a.product_id', $id)
            ->groupBy('a.color_id', 'c.color_name')
            ->get()
            ->toArray();

        return $data;
    }
    public static function getProductVariantKapasitasby1($id)
    {
        $data = DB::table('product_variants as a')
            ->leftJoin('capacities as b', 'a.capacity_id', '=', 'b.id')
            ->select('a.capacity_id', 'b.capacity_name', DB::raw('COUNT(a.id) as variant_count'))
            ->where('a.product_id', $id)
            ->groupBy('a.capacity_id', 'b.capacity_name')
            ->orderBy('b.capacity_name', 'asc')
            ->get()
            ->toArray();

        return $data;
    }

    public static function getProductVariantby2($data)
    {
        $color_id = $data['color_id'];
        $capacity_id = $data['capacity_id'];
        $product_id = $data['product_id'];

        $return = DB::table('product_variants as a')
            ->select('a.id')
            ->where('a.product_id', $product_id)
            ->where('a.color_id', $color_id)
            ->where('a.capacity_id', $capacity_id)
            ->first();

        return $return;
    }

    public static function getProductVariantbyId1($id)
    {
        $data = DB::table('product_variants as a')
            ->select('a.id', 'a.harga', 'a.harga_diskon')
            ->where('a.id', $id)
            ->first();

        return $data;
    }
}
