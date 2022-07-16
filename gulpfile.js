const {src, dest, series, parallel} = require('gulp');
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const npmDist = require('gulp-npm-dist');

sass.compiler = require('node-sass');

// Compile scss files to style.css file
function compileStyle() {
    return src('./resources/scss/laraflow.scss')
        .pipe(sass({outputStyle: 'compressed'})
            .on('error', sass.logError))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest('./public/css'));
}

// Compile skins styles to css folder
function compileSkinStyle() {
    return src('./resources/scss/skins/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(rename({prefix: 'skin.'}))
        .pipe(dest('./public/css'));
}

// Compile pages styles to css folder
function compilePageStyle() {
    return src('./resources/scss/pages/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(rename({prefix: 'laraflow.'}))
        .pipe(dest('./public/css'));
}

function copyDummyDataJson() {
    return src('./resources/data/**/*.*')
        .pipe(dest('./public/data'));
}

function copyFonts() {
    return src('./resources/fonts/**/*.*')
        .pipe(dest('./public/fonts'));
}

function copyImage() {
    return src('./resources/img/**/*.*')
        .pipe(dest('./public/img'));
}

function compileJavaScript() {
    return src('./resources/js/**/*.*')
        .pipe(dest('./public/js'));
}

function npmDep() {
    return src(npmDist(), {base: './node_modules/'})
        .pipe(rename(function (path) {
            path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
        }))
        .pipe(dest('./public/lib'));
}


exports.default = parallel(
    series(
        compileStyle,
        compileSkinStyle,
        compilePageStyle
    ),
    series(
        copyDummyDataJson,
        copyFonts,
        copyImage,
        compileJavaScript
    ),
    npmDep
);
