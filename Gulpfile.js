var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
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
    styles:  'app/assets/**/*.{sass,scss}',
    scripts: 'app/assets/javascripts/**/*.js',
    css:     'public/css/main.min.css',
    php:     'app/**/*.php'
};

gulp.task('sass', function() {
    gulp.src('app/assets/sass/main.scss')
        .pipe(plumber())
        .pipe(sass({ bundleExec: false }))
        .pipe(autoprefixer('last 10 versions'))
        .pipe(cssmin())
        .pipe(rename({ basename: 'main', suffix: '.min' }))
        .pipe(gulp.dest('public/css'));
});

gulp.task('js', function() {
    browserify('./app/assets/javascripts/main.js')
        .bundle()
        .pipe(source('main.min.js'))
        .pipe(streamify(uglify()))
        .pipe(gulp.dest('./public/js'));
});

gulp.task('watch', function() {
    livereload.listen();


    watch(paths.styles, function() {
        gulp.start('sass');
    });

    watch(paths.scripts, function() {
        gulp.start('js');
    });

    watch([paths.css, paths.php])
        .pipe(livereload());
});

gulp.task('default', ['sass', 'js', 'watch']);
