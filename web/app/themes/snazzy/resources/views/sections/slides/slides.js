import Glide from '@glidejs/glide'

export function Slides() {
  const heroSlider = document.querySelector('.js-hero-slider');
  const videos = heroSlider.querySelectorAll('video');

  var glide = new Glide(heroSlider, {
    type: 'carousel',
    perView: 1,
    gap: 0,
    autoplay: 5000,
    animationDuration: 0,
  });

  glide.mount()
    .on(['play', 'run'], function() {
      var current = glide._c.Html.slides[glide.index];
      var video = current.querySelector('video');

      if(video) {
        var i;
        for (i = 0; i < videos.length; i++) {
          videos[i].pause();
        }

        video.play();
        console.log('started video for slide ' + glide.index);
      }

  });
}
