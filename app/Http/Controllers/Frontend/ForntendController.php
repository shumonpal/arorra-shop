<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
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

    public function shop(Request $request)
    {
        
        if ($request->queryBy == "all") {

            $products = $this->productsQueryByAll($request);

        }else{
            
            $products = $this->productsQueryByNotAll($request);

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


    private function pdtIdInSize($size)
    {
        $pdtBySize = ProductSize::where('size', $size)->get();
        $unique_pdtId = $pdtBySize->unique('product_id');
        return $unique_pdtId->pluck('product_id'); 
    }
   
   
    private function pdtIdInColor($color)
    {
        $pdtByColor = ProductColor::where('color', $color)->get();
        $unique_pdtId = $pdtByColor->unique('product_id');
        return $unique_pdtId->pluck('product_id'); 
    }


    private function productsQueryByAll($request)
    {
        $products = Product::orderByDesc('id')->paginate(9);

        if ($request->sort) {
            $orderBy = explode( '-', $request->sort );
        }

        if ($request->price) {
            $range = explode( ';', $request->price );
            $minPrice = intval($range[0]);
            $maxPrice = intval($range[1]);
           
            if (($request->color == null) && ($request->size == null)) {
                $products = Product::whereBetween('price', [$minPrice, $maxPrice])->orderByDesc('id')->paginate(9);
                if ($request->sort) {                    
                    $products = Product::whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }
                
            }elseif(($request->color == null) && ($request->size != null)){
                $pdtIdInSize = $this->pdtIdInSize($request->size);
                $products = Product::whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {                    
                    $products =Product::whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }elseif(($request->color != null) && ($request->size == null)){
                $pdtIdInColor = $this->pdtIdInColor($request->color);
                $products = Product::whereIn('id', $pdtIdInColor)->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {                    
                    $products =Product::whereIn('id', $pdtIdInColor)->whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }elseif(($request->color != null) && ($request->size != null)){
                $pdtIdInSize = $this->pdtIdInSize($request->size);
                $pdtIdInColor = $this->pdtIdInColor($request->color);
                $products = Product::whereIn('id', $pdtIdInColor)->whereIn('id', $pdtIdInSize)
                            ->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {                    
                    $products = Product::whereIn('id', $pdtIdInColor)->whereIn('id', $pdtIdInSize)
                                ->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }
            //$products = Product::orderByDesc('id')->paginate(9);
        }

        return $products;

        
    }


    private function productsQueryByNotAll($request)
    {
        $where = explode( '-', $request->id );

        if ($request->sort) {
            $orderBy = explode( '-', $request->sort );
        }

        if ($request->orderBy) {
            
            $products = $this->productsQueryByNotAllButOrderBy($request, $where, $orderBy);
            
        }else{

            $products = Product::where($where[0], $where[1])->latest()->paginate(9);
            if ($request->price) {
                $range = explode( ';', $request->price );
                $minPrice = intval($range[0]);
                $maxPrice = intval($range[1]);

                if (($request->color == null) && ($request->size == null)) {
                    $products = Product::where($where[0], $where[1])->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderByDesc('id')->paginate(9);
                    if ($request->sort) {                    
                        $products = Product::where($where[0], $where[1])->whereBetween('price', [$minPrice, $maxPrice])
                        ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                    }
                    
                }elseif(($request->color == null) && ($request->size != null)){
                    $pdtIdInSize = $this->pdtIdInSize($request->size);
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInSize)
                                ->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderByDesc('id')->paginate(9);
                    if ($request->sort) {                    
                        $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInSize)
                        ->whereBetween('price', [$minPrice, $maxPrice])
                        ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                    }

                }elseif(($request->color != null) && ($request->size == null)){
                    $pdtIdInColor = $this->pdtIdInColor($request->color);
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                                ->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderByDesc('id')->paginate(9);
                    if ($request->sort) {                    
                        $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                        ->whereBetween('price', [$minPrice, $maxPrice])
                        ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                    }

                }elseif(($request->color != null) && ($request->size != null)){
                    $pdtIdInSize = $this->pdtIdInSize($request->size);
                    $pdtIdInColor = $this->pdtIdInColor($request->color);
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                                ->whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderByDesc('id')->paginate(9);
                    if ($request->sort) {                    
                        $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                        ->whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                        ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                    }

                }
            }

        }

        return $products;
    }


    private function productsQueryByNotAllButOrderBy($request, $where, $orderBy)
    {
        $orderBy = explode( '-', $request->orderBy );
        $products = Product::where($where[0], $where[1])->orderBy($orderBy[0], $orderBy[1])->paginate(9);
        if ($request->price) {
            $range = explode( ';', $request->price );
            $minPrice = intval($range[0]);
            $maxPrice = intval($range[1]);

            if (($request->color == null) && ($request->size == null)) {
                $products = Product::where($where[0], $where[1])->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {
                    $products = Product::where($where[0], $where[1])->whereBetween('price', [$minPrice, $maxPrice])
                                ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }
                
            }elseif(($request->color == null) && ($request->size != null)){
                $pdtIdInSize = $this->pdtIdInSize($request->size);
                $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInSize)
                            ->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInSize)
                    ->whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }elseif(($request->color != null) && ($request->size == null)){
                $pdtIdInColor = $this->pdtIdInColor($request->color);
                $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                            ->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);

                if ($request->sort) {
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                    ->whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }elseif(($request->color != null) && ($request->size != null)){
                $pdtIdInSize = $this->pdtIdInSize($request->size);
                $pdtIdInColor = $this->pdtIdInColor($request->color);
                $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                            ->whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByDesc('id')->paginate(9);
                if ($request->sort) {
                    $products = Product::where($where[0], $where[1])->whereIn('id', $pdtIdInColor)
                    ->whereIn('id', $pdtIdInSize)->whereBetween('price', [$minPrice, $maxPrice])
                    ->orderBy($orderBy[0], $orderBy[1])->paginate(9);
                }

            }
        }

        return $products;
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
