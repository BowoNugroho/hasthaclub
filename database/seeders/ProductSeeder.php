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
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 11 Pro Max',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 13 Pro Max',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 13',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 11',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 12 Mini',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 14',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 14 Plus',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 15',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
        Product::create([
            'product_name' => 'iPhone 15 Plus',
            'diskripsi' => 'Phone',
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'status' => true
        ]);
    }
}
