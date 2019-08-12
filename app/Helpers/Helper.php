<?php


if (!function_exists('product')) {
    function product($product_id)
    {
        return App\Models\Product::findOrFail($product_id);
        
    }
}

if (!function_exists('product1stImage')) {
    function product1stImage($product_id)
    {
        $product = product($product_id);
        return $product->images->first()->image;
    }
}

if (!function_exists('productModel')) {
    function productModel($product_id)
    {
        $product = product($product_id);
        return '#'.$product->name.'-'.$product->id;
    }
}