@if($date)
  <div class="entry-meta entry-meta-{!! get_post_type() !!}">
    <time class="dt-published" datetime="{{ wp_date('c', $epoch) }}">
      <ul class="nolist">
        <li><i class="fas fa-calendar secondary"></i> <span>{!! $date !!}</span></li>
        @if($time)
          <li><i class="fas fa-clock secondary"></i> <span>{!! $time !!}</span></li>
        @endif
      </ul>
    </time>
  </div>
@endif
