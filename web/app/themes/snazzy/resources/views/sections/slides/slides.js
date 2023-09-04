import Glide from '@glidejs/glide'

export function Slides() {
  const heroSlider = document.querySelector('.js-hero-slider');
  const heroVideos = document.querySelectorAll('.js-bgvid');

  function videoSrcset( element ) {
    let sizes = JSON.parse(element.dataset.sizes);

    Object.keys(sizes).forEach(function(key) {
      let size = key;
      let source = element.querySelector('.bgvid-' + size);
      let sourceWidth = source.dataset.width;

      if(window.innerWidth >= sourceWidth) {
        console.log('screen width is greater than or equal to the source width');
        console.log('screen width: ' + window.innerWidth);
        console.log('source width: ' + sourceWidth);

        let source = element.querySelector('.bgvid-' + size);
        let poster = source.dataset.poster;

        element.src = source.src;
        element.poster = poster;
        element.load;
      }

    });
  }

  if(heroVideos) {
    let x;
    for (x = 0; x < heroVideos.length; x++) {
      let thisVideo = heroVideos[x];
      videoSrcset(thisVideo);
    }
  }

  if(heroSlider) {
    const videos = heroSlider.querySelectorAll('video');

    var glide = new Glide(heroSlider, {
      type: 'carousel',
      perView: 1,
      gap: 0,
      autoplay: 5000,
      animationDuration: 0,
      dragThreshold: false,
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
        }

    });
  }
}
