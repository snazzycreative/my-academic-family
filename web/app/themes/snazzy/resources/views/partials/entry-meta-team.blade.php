<div class="entry-title wysiwyg align-centre">
  <h{!! @$h ?: 3 !!}>
    {!! $personal_title !!}
    {!! get_the_title() !!}
    <small class="personal-credentials">{!! $personal_credentials !!}</small>
    @if($personal_pronouns) <small>({!! $personal_pronouns !!})</small> @endif
  </h{!! @$h ?: 3 !!}>
  <p class="personal-education">{!! $personal_education !!}</p>
</div>
