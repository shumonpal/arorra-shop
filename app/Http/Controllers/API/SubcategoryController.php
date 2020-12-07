<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\SubcategoryResource;
use App\Models\Product;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        return SubcategoryResource::collection(Subcategory::all());
    }
    public function productsBysubcategory($id)
    {
        return ProductCollection::collection(Product::where('subcategory_id', $id)->paginate(10));
    }
}
