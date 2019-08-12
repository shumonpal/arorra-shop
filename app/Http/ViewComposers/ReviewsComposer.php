<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use App\Frontend\ProductsReview;

/**
* ProductComposer
*/
class ReviewsComposer {
	


	public function compose(View $view)
	{
		$reviews = ProductsReview::latest()->get();
		$view->with('reviews', $reviews);
	}
	
}