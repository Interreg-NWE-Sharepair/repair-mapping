const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const LiveReloadPlugin = require('webpack-livereload-plugin');

mix.ts('resources/js/app.ts', 'public/js').version();
mix.vue();
mix.postCss('resources/css/app.css', 'public/css').version();
mix.copy('resources/img', 'public/img', false);

// Extract alpinejs to a vendor file
mix.extract(['alpinejs', 'lazysizes']);

mix.webpackConfig( {
  plugins: [
    new LiveReloadPlugin(),
    new ImageminPlugin( {
      test: /\.(jpe?g|png|gif|svg)$/i,
    }),
  ],
});
