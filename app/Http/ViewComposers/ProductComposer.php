<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\ProductRepository;
use App\Models\Product;

/**
* ProductComposer
*/
class ProductComposer {

	protected $productRepository;

	public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

	public function compose(View $view)
	{
		$products = $this->productRepository->all();
		$view->with('products', $products);
	}
	
}