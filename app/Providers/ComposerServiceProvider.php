<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(
            ['frontend.index', 'frontend.layouts.header'],
            'App\Http\ViewComposers\ProductComposer'
        );

        View::composer(
            ['products.fields', 'categories.table', 'subcategories.fields',
             'frontend.layouts.header', 'frontend.left_column.categories'
            ],  
            'App\Http\ViewComposers\CategoryComposer'
        );

        View::composer(
            ['frontend.layouts.footer', 'frontend.layouts.header'],  
            'App\Http\ViewComposers\BrandComposer'
        );

        // View::composer(
        //     ['frontend.product-details.review'],  
        //     'App\Http\ViewComposers\ReviewsComposer'
        // );
    }
}
