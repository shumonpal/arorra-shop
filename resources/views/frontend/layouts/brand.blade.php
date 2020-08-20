<div class="footer-bottom ptb_20">
  <div class="container">
    <div class="row">
      <div id="brand_carouse" class="ptb_60 text-center">
        <div class="type-01">
          <div class="heading-part mb_10 ">
            <h2 class="main_title">{{__('master_page.brand')}}</h2>
          </div>
          <div class="row" style="width: 100%;">
            <div class="col-sm-12">
              <div class="brand owl-carousel ptb_20">
                @foreach($brands as $brand)
                <div class="item text-center"> <a href="{{ route('shop', ['id' => 'brand_id-' . $brand->id]) }}"><img
                      src="/{{ $brand->logo }}" alt="{{ $brand->name }}" class="img-responsive" /></a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>