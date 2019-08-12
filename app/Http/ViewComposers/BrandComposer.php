<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\BrandRepository;
use App\Models\Brand;

/**
* ProductComposer
*/
class BrandComposer {

	protected $brandRepository;

	public function __construct(BrandRepository $brandRepo)
    {
        $this->brandRepository = $brandRepo;
    }

	public function compose(View $view)
	{
		$brands = $this->brandRepository->all();
		$view->with('brands', $brands);
	}
	
}