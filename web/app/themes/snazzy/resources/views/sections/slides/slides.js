import Glide from '@glidejs/glide'

export function Slides() {

  new Glide('.js-hero-slider')

  var glide = new Glide('.js-hero-slider', {
    type: 'carousel',
    perView: 1,
    gap: 0,
    autoplay: 5000,
  });

  glide.mount();

}
