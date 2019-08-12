<div class="col-sm-12 mtb_10">
  <div class="mt_60">
    <div class="heading-part mb_10 ">
      <h2 class="main_title">Deals of the Week</h2>
    </div>
    <div class="latest_pro box">
      <div class="latest owl-carousel">
      @foreach($week_deals as $product)
        @include('frontend.home_page.product')
      @endforeach
      </div>
    </div>
  </div>
</div>