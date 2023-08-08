<li class="menu-item menu-divider divider-contact">
    <a href="#">divider</a>
</li>
<li class="menu-item menu-contact-details">
    @if($contact)
      <a href="{!! get_the_permalink($contact) !!}">{!! $contact->post_title !!}</a>
    @endif

    {{ \snazzycp\frontend\contact_info(['hide-labels' => true]) }}
    @include('partials.menu-social')

</li>
