<div class="simple-team">
  @include('partials.image', [
    'id' => $image,
    'class' => 'lazy portrait-image',
    'size' => 'thumbnail'
  ])
  <div class="entry-summary wysiwyg">
    <h3>
      {!! $personal_title !!}
      {!! $title !!}
      <small class="personal-credentials">{!! $personal_credentials !!}</small>
      @if($personal_pronouns) <small>({!! $personal_pronouns !!})</small> @endif
    </h3>
    <p class="personal-education">{!! $personal_education !!}</p>
    <p class="simple-team-link">
      <a href="{{ get_permalink() }}">
        <span>View Bio</span>
        <i class="fas fa-circle-right"></i>
      </a>
    </p>
  </div>
</div>
