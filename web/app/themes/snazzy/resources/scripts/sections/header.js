export function Header() {
  const body = document.querySelector('body');
  const menuToggle = document.querySelector('.js-menu-toggle');

  menuToggle.addEventListener('click', ()=>{
    body.classList.toggle('activated-nav-side');
  });

  document.addEventListener("scroll", () => {

    var scrolled = document.scrollingElement.scrollTop;
    var position = body.offsetTop;

    if(scrolled > position + 20){
      body.classList.add(
        'scrolled',
        );
    } else {
      body.classList.remove(
        'scrolled',
      );
    }

    window.setTimeout(function(){
      var oldScrollY = window.scrollY;

      window.onscroll = function() {
        if(oldScrollY < window.scrollY){
          body.classList.add(
            'going-down',
            );

          } else {
          body.classList.remove(
            'going-down',
          );
        }

        oldScrollY = window.scrollY;
      }

    }, 1000);
  });
}
