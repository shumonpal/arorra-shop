<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

/**
* ProductComposer
*/
class CategoryComposer {
	


	public function compose(View $view)
	{
		$categories = Category::latest()->get();
		$view->with('categories', $categories);
	}
	
}