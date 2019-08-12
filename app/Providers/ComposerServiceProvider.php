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
            'frontend.index',  
            'App\Http\ViewComposers\ProductComposer'
        );

        // View::composer(
        //     ['index', 'frontend.header.header', 'frontend.products.products', 'admin.product.forms.form', 'admin.product.forms.formUpdate',],  
        //     'App\Http\ViewComposers\CategoryComposer'
        // );

        View::composer(
            ['frontend.layouts.footer',],  
            'App\Http\ViewComposers\BrandComposer'
        );

        // View::composer(
        //     ['frontend.product-details.review'],  
        //     'App\Http\ViewComposers\ReviewsComposer'
        // );
    }
}