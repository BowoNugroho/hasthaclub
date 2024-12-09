<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brand = Brand::first();  // Get the first brand (or select one using where() if needed)
        $category = Category::first();

        Product::create([
            'product_name' => 'iPhone 11 Pro Max',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 11 Pro Max',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 13 Pro Max',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 13',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 11',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 12 Mini',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 14',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 14 Plus',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 15',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 15 Plus',
            'deskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
    }
}
