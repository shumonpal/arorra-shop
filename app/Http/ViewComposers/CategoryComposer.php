<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use App\Frontend\ProductsCategory;

/**
* ProductComposer
*/
class CategoryComposer {
	


	public function compose(View $view)
	{
		$categories = ProductsCategory::latest()->get();
		$view->with('categories', $categories);
	}
	
}