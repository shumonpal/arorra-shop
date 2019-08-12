<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use App\Frontend\ProductsBrand;

/**
* ProductBrandComposer
*/
class ProductsBrandComposer {
	

	public function compose(View $view)
	{
		$productBrands = ProductsBrand::latest()->get();
		$view->with('productBrands', $productBrands);
		
	}
	
}