<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$categories = DB::table('categories')->get();
		$brands = DB::table('brands')->get();
		$compositions = DB::table('compositions')->get();

		foreach ($categories as  $cat) {
			$subcategories = DB::table('category_subcategory')->where('category_id', $cat->id)->get();
			foreach ($subcategories as $subcat) {
				$sCAt = 32;
				for ($i = 0; $i < 3; $i++) {
					$product = Product::create([
						'name' => $cat->name . '_' . $i . '_' . $sCAt,
						'brand_id' => rand(1, $brands->count()),
						'category_id' => $cat->id,
						'subcategory_id' => $subcat->id,
						'price' => $i . '81',
						'up_price' => $i . '11',
						'descp' => 'Larium spame silivas make sure to place composer\'s system-wide vendor bin directory in your 	$PATH so the laravel executable can be located by your system. This directory exists in different 		locations based on your operating system; however, some common locations include',
						'composition_id' => rand(1, $compositions->count()),
						'is_featured' => rand(0, 1),
						'is_discount' => rand(0, 1),
						'in_stock' => rand(10, 50),
						'banner_image' => 'frontend/images/product/banners/slider' . rand(1, 5) . '.jpg',
						'created_at' => \Carbon\Carbon::now(),
						'updated_at' => \Carbon\Carbon::now(),
					]);
					for ($j = 0; $j < 3; $j++) {
						DB::table('product_image')->insert([
							'product_id' => $product->id,
							'image' => 'frontend/images/product/' . rand(8, 10) . '.jpg',
						]);
					}
					$sizes = ['x', 'small', 'medium', 'large'];
					for ($j = 0; $j < 3; $j++) {
						DB::table('product_size')->insert([
							'product_id' => $product->id,
							'size' => $sizes[rand(0, 3)],
						]);
					}
					$colors = ['red', 'green', 'blue', 'black'];
					for ($j = 0; $j < 3; $j++) {
						DB::table('product_color')->insert([
							'product_id' => $product->id,
							'color' => $colors[rand(0, 3)],
						]);
					}
				}
				$sCAt++;
			}
		}
	}
}
