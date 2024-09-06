<?php

namespace Database\Seeders;

use App\Enums\WordpressEndpoints;
use App\Models\Product;
use Automattic\WooCommerce\Client;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $woocommerce = new Client(
            config('app.wordpress_wc_baseurl'),
            config('app.woocommerce_api_key'),
            config('app.woocommerce_api_secret_key'),
            [
                'version' => 'wc/v3',
            ],
        );
        //$woocommerce = Product::woocommerce();

        $products = $woocommerce->get(WordpressEndpoints::PRODUCTS, ['per_page' => 50]);
        $products = json_decode(json_encode($products), true);

        foreach ($products as $product) {
            $product_tmp = Product::where('product_id', $product['id'])->firstOrCreate();
            $product_tmp->update([
                'product_id' => $product['id'],
                'name' => $product['name'],
                'slug' => $product['slug'],
                'type' => $product['type'],
                'status' => $product['status'],
                'catalog_visibility' => $product['catalog_visibility'],
                'description' => $product['description'],
                'short_description' => $product['short_description'],
                'sku' => $product['sku'],
                'price' => $product['price'],
                'regular_price' => $product['regular_price'],
                'sale_price' => $product['sale_price'],
                'stock_quantity' => $product['stock_quantity'],
                'stock_status' => $product['stock_status'],
                'weight' => $product['weight'],
                'length' => $product['dimensions']['length'],
                'width' => $product['dimensions']['width'],
                'height' => $product['dimensions']['height'],
                'shipping_class' => $product['shipping_class'],
                'image_src' => $product['images'][0]['src'] ?? null,
            ]);

        }

        $products = Product::whereType('variable')->get();
        foreach ($products as $product) {
            $product->variations()->delete();
            $variations = $woocommerce->get("products/{$product->product_id}/variations", ['per_page' => 100]);
            $variations = json_decode(json_encode($variations), true);

            foreach ($variations as $variation) {
                Product::where('product_id', $product['id'])->firstOrcreate([
                    'sku' => $variation['sku'],
                    'name' => $variation['name'],
                    'status' => $variation['status'],
                    'price' => $variation['price'],
                    'description' => $variation['description'],
                    'regular_price' => $variation['regular_price'],
                    'sale_price' => $variation['sale_price'],
                    'stock_quantity' => $variation['stock_quantity'],
                    'stock_status' => $variation['stock_status'],
                    'weight' => $variation['weight'],
                    'length' => $variation['dimensions']['length'],
                    'width' => $variation['dimensions']['width'],
                    'height' => $variation['dimensions']['height'],
                    'shipping_class' => $variation['shipping_class'],
                    'image_src' => isset($variation['image']['src']) ?? null,
                ]);
            }
        }

    }
}
