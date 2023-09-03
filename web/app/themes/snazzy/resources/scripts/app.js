import domReady from '@roots/sage/client/dom-ready';
import LazyLoad from "vanilla-lazyload";

/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    console.log(err);
  }

  const lazyLoadOptions = {};
  new LazyLoad(lazyLoadOptions);

  const { Header } = await import('../views/sections/header/header.js');
  new Header();

  const { Slides } = await import('../views/sections/slides/slides.js');
  new Slides();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
