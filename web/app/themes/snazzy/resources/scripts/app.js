import domReady from '@roots/sage/client/dom-ready';
/**
 * Application entrypoint
 */
domReady(async (err) => {
  if (err) {
    console.log(err);
  }

  const { Header } = await import('../views/sections/header/header.js');
  new Header()
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
