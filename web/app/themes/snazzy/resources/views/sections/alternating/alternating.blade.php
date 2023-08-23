@if(@$section['alternating'])
  <div class="section-alternating-wrap">
    @foreach($section['alternating'] as $row)
      <div class="section-alternating-row">
        <div class="section-alternating-col section-alternating-image bg-black">
          @if(@$row['image']['ID'])
            {!! \App\frontend\img_srcset([
              'name' => 'overview',
              'image' => $row['image']['ID'],
              'lazy' => true,
            ]) !!}
          @endif
        </div>
        <div class="section-alternating-col section-alternating-content">
          <pre>{!! print_r($row['content']) !!}</pre>
        </div>
      </div>
    @endforeach
  </div>
@endif

