<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductCollection;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }
    public function productsByBrand($id)
    {
        return ProductCollection::collection(Product::where('brand_id', $id)->paginate(10));
    }
}
