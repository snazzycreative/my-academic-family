<div class="entry-meta entry-meta-{!! get_post_type() !!}">
  <ul class="nolist">
    <li>
      <span>{{ __('By', 'sage') }}</span>
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="p-author h-card">
        {{ get_the_author() }}
      </a>
    </li>
    <li>
      <time class="dt-published" datetime="{{ get_post_time('c', true) }}">
        <i class="fas fa-calendar secondary"></i> <span>{{ get_the_date() }}</span></li>
      </time>

  </ul>
</div>
