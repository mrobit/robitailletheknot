var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var rename       = require('gulp-rename');
var cssmin       = require('gulp-cssmin');
var plumber      = require('gulp-plumber');
var watch        = require('gulp-watch');
var livereload   = require('gulp-livereload');
var uglify       = require('gulp-uglify');
var streamify    = require('gulp-streamify');
var browserify   = require('browserify');
var source       = require('vinyl-source-stream');

// Asset paths.
var paths = {
    styles: 'app/assets/sass/**/*.scss',
    css:    'public/css/main.min.css',
    php:    'app/**/*.php'
};

gulp.task('sass', function() {
    gulp.src('app/assets/sass/main.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(autoprefixer('last 10 versions'))
        .pipe(cssmin())
        .pipe(rename({ basename: 'main', suffix: '.min' }))
        .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch(paths.styles, ['sass'])

    watch([paths.css, paths.php])
        .pipe(livereload());
});

gulp.task('js', function() {
    browserify('./app/assets/javascripts/main.js')
        .bundle()
        .pipe(source('main.min.js'))
        .pipe(streamify(uglify()))
        .pipe(gulp.dest('./public/js'));
});
