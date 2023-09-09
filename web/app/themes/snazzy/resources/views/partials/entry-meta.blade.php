<div class="entry-meta entry-meta-{!! get_post_type() !!}">
  <ul class="nolist">
    @if($profile)
      <li>
        <span>{{ __('By', 'sage') }}</span>
        <a href="{!! get_the_permalink($profile) !!}" class="p-author h-card">
          {!! get_the_title($profile) !!}
        </a>
      </li>
    @endif
    <li>
      <time class="dt-published" datetime="{{ get_post_time('c', true) }}">
        <i class="fas fa-calendar secondary"></i> <span>{{ get_the_date() }}</span></li>
      </time>

  </ul>
</div>
