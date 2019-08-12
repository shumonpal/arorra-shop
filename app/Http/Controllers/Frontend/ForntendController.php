<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ForntendController extends Controller
{

    /**
     * Show the application Front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    
    public function productDetails(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->ajax()){
            return view('frontend.modals.product_details_body', ['product' => $product]);
        }
        $pdtBySubCats = Product::where('subcategory_id', $product->subcategory_id)->latest()->take(8)->get();

        if ($pdtBySubCats->count() > 3) {
            $related_products = $pdtBySubCats;
        }else{
            $related_products = Product::where('category_id', $product->category_id)->latest()->take(8)->get();
        }

        return view('frontend.product_details_page.product_details', ['product' => $product, 'related_products' => $related_products]);

    }

    /**
     * Show the application Front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function userLogin()
    {
        return view('frontend.modals.user_login');
    }
}
