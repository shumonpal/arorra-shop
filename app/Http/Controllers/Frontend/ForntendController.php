<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Repositories\FrontendRepository;

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

    public function shop(Request $request)
    {
        $frnt_repo = new FrontendRepository();

        if ($request->queryBy == "all") {

            $products = $frnt_repo->productsQueryByAll($request);

        }else{
            
            $products = $frnt_repo->productsQueryByNotAll($request);

        }
        
        if ( $request->ajax() ) {

    		$view = view('frontend.shops.products', ['products' => $products])->render();
            return [
                    'html'=> $view,
                    'next_page'=> $products->appends(request()->query())->nextPageUrl(),
                   ];
        }
        return view('frontend.shops.shop', compact('products'));
    }


    

//     public function productFilter(Request $request)
//     {
//         //return $request->orderBy;
//         $queryStr =  str_after($request->url, '?');
//         $data = explode( '=', $queryStr );
//         $orderBy = explode( '-', $request->orderBy );
//         //return $data[0];
//         if ($data[1] == 'all') {
//             $products = Product::orderBy($orderBy[0], $orderBy[1])->paginate(9);
//         }else{
//             $products = Product::where($data[0], $data[1])->orderBy($orderBy[0], $orderBy[1])->paginate(9);
            
//         }
        
//         if ($request->ajax()) {
//             if ($request->orderBy) {
//                 return $view = view('frontend.shops.products', ['products' => $products]);
//             }
//     		$view = view('frontend.shops.products', ['products' => $products])->render();
//             return response()->json(['html'=>$view]);
//         }
        
//         // }else{
//         //    $pdtByColor = ProductsColor::where('color', $request->color)->get();
//         //    $unique_pdtId = $pdtByColor->unique('products_id');
//         //    $pdtId = $unique_pdtId->pluck('products_id'); 

//         //    $productBy = Product::whereIn('id', $pdtId)->where($data[0], $data[1])->whereBetween('price', [$request->min, $request->max])->orderBy($sort[0], $sort[1])->get();

//         //}

        
//         //return view('frontend.shops.products', ['products' => $products]);
//     }
 }
