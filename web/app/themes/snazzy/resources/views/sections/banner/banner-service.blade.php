<section class="{!! $classes !!}">
  <div class="section service-banner">
    <div class="container @if(!$pricing) align-centre @endif">
      <div class="section section-zero-top service-banner-text container-small">
        <div class="titlebar" style="font-size: {!! $heading_scale !!}em;">
          <h1>{!! $title !!}</h1>
        </div>
        <div class="wysiwyg">
          {!! $excerpt !!}
        </div>
      </div>
      @if($pricing)
        <ul class="service-banner-purchase nolist service-banner-purchase-{!! count($pricing) !!}">
          @foreach($pricing as $price)
            <li>
              @if(@$price['code'])
                {!! $price['code'] !!}
              @endif
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
</section>
