@if(@$schedule['date'])
  <div class="entry-meta entry-meta-{!! get_post_type() !!}">
    <time class="dt-published" datetime="{{ wp_date('c', @$schedule['epoch']) }}">
      <ul class="nolist">
        <li><i class="fas fa-calendar secondary"></i> <span>{!! $schedule['date'] !!}</span></li>
        @if(@$schedule['time'])
          <li><i class="fas fa-clock secondary"></i> <span>{!! @$schedule['time'] !!}</span></li>
        @endif
      </ul>
    </time>
  </div>
@endif
