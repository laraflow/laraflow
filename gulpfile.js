'use strict';

const { src, dest, series, watch } = require('gulp');
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const bs = require('browser-sync').create();
const npmDist = require('gulp-npm-dist');
const htmlInjector = require('bs-html-injector');

sass.compiler = require('node-sass');

// Compile scss files to style.css file
function compileStyle() {
  return src('./scss/dashforge.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(dest('./assets/css'))
  .pipe(bs.stream());
}

// Compile and minify scss files to style.css file
function minifyStyle () {
  return src('./scss/dashforge.scss')
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(rename({suffix: '.min'}))
    .pipe(dest('./assets/css'))
    .pipe(bs.stream());
}

// Compile skins styles to css folder
function compileSkinStyle() {
  return src('./scss/skins/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(rename({prefix: 'skin.'}))
  .pipe(dest('./assets/css'))
  .pipe(bs.stream());
}

// Compile pages styles to css folder
function compilePageStyle() {
  return src('./scss/pages/*.scss')
  .pipe(sass().on('error', sass.logError))
  .pipe(rename({prefix: 'dashforge.'}))
  .pipe(dest('./assets/css'))
  .pipe(bs.stream());
}

exports.compileStyle = compileStyle;
exports.minifyStyle = minifyStyle;
exports.compileSkinStyle = compileSkinStyle;
exports.compilePageStyle = compilePageStyle;

// Start a server
function serve () {
  bs.use(htmlInjector, {
    files: "**/*.html"
  });

  // Now init the Browsersync server
  bs.init({
    injectChanges: true,
    server: true
  });

  // Listen to change events on HTML and reload
  watch('**/*.html').on('change', htmlInjector);

  // Provide a callback to capture ALL events to CSS
  // files - then filter for 'change' and reload all
  // css files on the page.
  watch('scss/**/*.scss', series(compileStyle, minifyStyle));

  watch('scss/skins/**/*.scss', compileSkinStyle);
  watch('scss/pages/*.scss', compilePageStyle);

  watch(
    ['scss/_variables.scss','scss/bootstrap/_variables.scss'],
    series(compileStyle, compilePageStyle)
  );

}

exports.serve = serve;

// Copy dependencies to template/lib
function npmDep () {
  return src(npmDist(), { base:'./node_modules/' })
    .pipe(rename(function(path) {
      path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
    }))
    .pipe(dest('./lib'));
}

exports.npmDep = npmDep;
