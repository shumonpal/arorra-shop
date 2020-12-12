<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product;
use App\Http\Resources\ProductCollection;
use App\Models\Product as ModelsProduct;
use App\Repositories\FrontendRepository;

class ProductController extends Controller
{
    public function index()
    {
        return ProductCollection::collection(ModelsProduct::latest()->paginate(10));
        // return Product::collection(ModelsProduct::with(['category', 'sub category', 'brand', 'images', 'colors', 'sizes'])->paginate(10));
    }

    public function show($id)
    {
        return new Product(ModelsProduct::find($id));
    }

    public function newArrived()
    {
        return ProductCollection::collection(ModelsProduct::latest()->paginate(10));
    }
    public function featured()
    {
        return ProductCollection::collection(ModelsProduct::where('is_featured', 1)->latest()->paginate(10));
    }
    public function weekDeals()
    {
        return ProductCollection::collection(ModelsProduct::where('composition_id', 3)->latest()->paginate(10));
    }
    public function specialDeals()
    {
        return ProductCollection::collection(ModelsProduct::where('composition_id', 2)->latest()->paginate(10));
    }
    public function related($id)
    {
        $product = ModelsProduct::find($id);
        $pdtBySubCats = ModelsProduct::where('subcategory_id', $product->subcategory_id)->latest()->take(8)->get();

        if ($pdtBySubCats->count() > 3) {
            $related_products = $pdtBySubCats;
        } else {
            $related_products = ModelsProduct::where('category_id', $product->category_id)->latest()->take(8)->get();
        }
        return ProductCollection::collection($related_products);
    }

    public function filter(Request $request)
    {
        $frnt_repo = new FrontendRepository();
        if ($request->queryBy == "all") {

            $products = $frnt_repo->productsQueryByAll($request);
        } else {

            $products = $frnt_repo->productsQueryByNotAll($request);
        }

        return ProductCollection::collection($products);
    }
}
