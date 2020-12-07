<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;

/**
 * Class BrandRepository
 * @package App\Repositories
 * @version April 11, 2019, 2:48 pm UTC
 *
 * @method Brand findWithoutFail($id, $columns = ['*'])
 * @method Brand find($id, $columns = ['*'])
 * @method Brand first($columns = ['*'])
*/
class FrontendRepository
{
    
    public function pdtIdInSize($size)
    {
        $pdtBySize = ProductSize::where('size', $size)->get();
        $unique_pdtId = $pdtBySize->unique('product_id');
        return $unique_pdtId->pluck('product_id'); 
    }
   
   
    public function pdtIdInColor($color)
    {
        $pdtByColor = ProductColor::where('color', $color)->get();
        $unique_pdtId = $pdtByColor->unique('product_id');
        return $unique_pdtId->pluck('product_id'); 
    }


    public function productsQueryByAll($request)
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


    public function productsQueryByNotAll($request)
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


    public function productsQueryByNotAllButOrderBy($request, $where, $orderBy)
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


}
