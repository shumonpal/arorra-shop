
        <div class="row">

            
            @foreach($products as $product)
            <div class="product-layout col-md-4 col-xs-6 shop-page-product">
                <div class="mb_30">
                    @include('frontend.home_page.product')
                </div>
            </div>
            @endforeach

        </div>
        {{-- $products->appends(request()->query())->links() --}}