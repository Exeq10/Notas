const { src, dest, watch, parallel } = require('gulp');
const sass = (require('gulp-sass'))(require('sass'));
const plumber = require('gulp-plumber');
const webp = require('gulp-webp');




function css(done) {
    src('src/scss/**/*.scss')

    .pipe(plumber())
        .pipe(sass())
        .pipe(dest('build/css'))

    done();
}

function dev(done) {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js');
    done();
}



function imgwebp(done) {

    const opciones = {
        quality: 50
    };
    src('src/img/**/*.{png,jpg,webp}')
        .pipe(webp(opciones))
        .pipe(dest('build/img'))

    done()

}

exports.imgwebp = imgwebp;
exports.css = css;
exports.dev = dev;