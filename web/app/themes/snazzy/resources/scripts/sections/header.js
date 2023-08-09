import $ from 'jQuery';

export function Header() {
  $('.js-menu-toggle').on('click', function(e){
    e.preventDefault();
    $('body').toggleClass('activated-nav-side');
  });

  let lastScroll = 0;

  $(window).on('scroll', function(){
    setTimeout(function() {
      let scroll = $(window).scrollTop();
      if (scroll > lastScroll) {
        $('body').addClass('going-down');
      } else if (scroll < lastScroll) {
        $('body').removeClass('going-down');
      }
      lastScroll = scroll;
    }, 1000);
  });

  $(window).on('scroll', function () {
    let scroll = $(window).scrollTop();

    if (scroll >= 20) {
      $('body').addClass('scrolled');
    } else {
      $('body').removeClass('scrolled');
    }
  });
}
