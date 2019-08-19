<?php

namespace App\Repositories;

use App\Models\Brand;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\ImageTrait;

/**
 * Class BrandRepository
 * @package App\Repositories
 * @version April 11, 2019, 2:48 pm UTC
 *
 * @method Brand findWithoutFail($id, $columns = ['*'])
 * @method Brand find($id, $columns = ['*'])
 * @method Brand first($columns = ['*'])
*/
class BrandRepository extends BaseRepository
{
    use ImageTrait;

    
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Brand::class;
    }

    public function create($request)
    {
        //return $request->banner_image;
        // $banner = $this->saveFile($request->banner_image, '/images/products/banners');
        if (!empty($request->logo)) {
            $path = $this->saveFile($request->logo, '/frontend/images/brands');
            //return $path;
        }
        $data = $request->all();
        $data['logo'] = $path;
        //return $data;
        //data save to products table
        $product = Brand::create($data);

    }
}
