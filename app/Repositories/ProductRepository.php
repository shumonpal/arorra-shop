<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;
use DB;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version May 8, 2019, 4:17 pm UTC
 *
 * @method Product findWithoutFail($id, $columns = ['*'])
 * @method Product find($id, $columns = ['*'])
 * @method Product first($columns = ['*'])
*/
class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'brand_id',
        'category_id',
        'subcategory_id',
        'price',
        'up_price',
        'descp',
        'composition',
        'is_featured',
        'is_discount',
        'in_stock',
        'banner_image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public function create($request)
    {
        //return $request->banner_image;
        // $banner = $this->saveFile($request->banner_image, '/images/products/banners');
        if (!empty($request->banner_image)) {
            $banner = $this->saveFile($request->banner_image, '/frontend/images/product/banners');
            //return $path;
        }
        $data = $request->all();
        $data['banner_image'] = $banner;
        //return $data;
        //data save to products table
        $product = Product::create($data);

        //data save to products_images table
        $this->saveProductImages($request->image, $product->id);
        
        //data save to products_colors table
        $this->saveProductColor($request->color, $product->id);

        //data save to products_colors table
        $this->saveProductSize($request->size, $product->id);
    }

    /**
     * Save specified resource.
     *
     * @param  array  $images
     * @param  int  $id
     */

    public function saveProductImages(array $images, $id)
    {
        $productImage = array();

        //save to productsimages table
        foreach ($images as $image) {
            $image = $this->saveFile($image, '/frontend/images/product');

            $productImage[] = [
                'product_id' => $id,
                'image' => $image,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('product_image')->insert($productImage);
        
    }

    /**
     * Save specified resource.
     *
     * @param  array  $colors
     * @param  int  $id
     */
    public function saveProductColor(array $colors, $id){
        $productcolors = array();

        //save to productsimages table
        foreach ($colors as $color) {

            $productcolors[] = [
                'product_id' => $id,
                'color' => $color,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('product_color')->insert($productcolors);
    }

    /**
     * Save specified resource.
     *
     * @param  array  $colors
     * @param  int  $id
     */
    public function saveProductSize(array $sizes, $id){
        $productsizes = array();

        //save to productsimages table
        foreach ($sizes as $size) {

            $productsizes[] = [
                'product_id' => $id,
                'size' => $size,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('product_size')->insert($productsizes);
    }


}
