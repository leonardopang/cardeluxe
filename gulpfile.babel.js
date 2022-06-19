'use strict';

import gulp from 'gulp'
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import autoPrefixer from 'gulp-autoprefixer';
import concat from 'gulp-concat';
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import browserSync from 'browser-sync';
import cleanCSS from 'gulp-clean-css';

const sass = gulpSass(dartSass);

export function styles() {
  return gulp.src('./assets/css/sass/*.scss')
    .pipe(sass.sync({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(autoPrefixer({
      overrideBrowserslist: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest('./assets/css'))
    .pipe(browserSync.stream());
}

export function scripts() {
  return gulp.src('./assets/js/modules/*.js')
    .pipe(babel())
    .pipe(uglify())
    .pipe(concat('index.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(browserSync.stream());
}

export function browser() {
  browserSync.init({
    proxy: 'localhost:10010'
  })
}

export function watchFiles() {
  gulp.watch('./assets/css/sass/**/*.scss', styles);
  gulp.watch('./assets/js/modules/*.js', scripts);
}

const build = gulp.parallel(watchFiles, browser, styles, scripts);

export default build;
