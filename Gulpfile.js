var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var rename       = require('gulp-rename');
var cssmin       = require('gulp-cssmin');
var plumber      = require('gulp-plumber');
var watch        = require('gulp-watch');
var livereload   = require('gulp-livereload');

// Asset paths.
var paths = {
  styles: 'app/assets/sass/**/*.scss',
  css:    'public/css/main.min.css'
};

gulp.task('sass', function() {
  gulp.src('app/assets/sass/main.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer('last 10 versions'))
    .pipe(rename({ basename: 'main', suffix: '.min' }))
    .pipe(gulp.dest('public/css'));
});
gulp.task('watch', function() {
  livereload.listen();

  gulp.watch(paths.styles, ['sass'])

  watch(paths.css)
    .pipe(livereload());
});
