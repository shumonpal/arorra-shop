<div class="row">
    <div class="col-md-12">
      <div class="heading-part text-center mb_10">
        <h2 class="main_title mt_50">Related Products</h2>
      </div>
      <div class="related_pro box">
        <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
        @foreach($related_products as $rlt_product)
          @include('frontend.home_page.product')
        @endforeach
        </div>
      </div>
    </div>
  </div>