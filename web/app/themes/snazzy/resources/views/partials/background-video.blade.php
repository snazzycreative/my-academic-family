<video
  width="{!! $width !!}"
  height="{!! $height !!}"
  @if($autoplay) autoplay @endif
  muted
  loop
  src="{!! $url !!}"
></video>
