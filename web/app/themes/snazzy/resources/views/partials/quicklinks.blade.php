<div class="quicklinks">
  <div class="container">
    <ul class="nolist bg-primary knockout">
      @foreach($quicklinks as $item)
        @php
          $content = @$item['content'];
          $link = @$content['link'];
        @endphp

        <li class="quicklink">
          @if($link)
            <a href="#">
              <div class="inner">
                <div class="quicklink-icon">
                  <i class="fas fa-{!! $item['fontawesome_solid'] ?: 'question-circle' !!} secondary"></i>
                </div>
                <p class="quicklink-content">
                  @if(@$content['small']) <small class="secondary">{!! $content['small'] !!}</small> @endif
                  @if(@$content['large']) <strong>{!! $content['large'] !!}</strong> @endif
                </p>
                <div class="quicklink-arrow">
                  <i class="fa-solid fa-arrow-right secondary"></i>
                </div>
              </div>
            </a>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
</div>
