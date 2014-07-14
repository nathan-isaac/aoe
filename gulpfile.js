/**
 * Dependencies
 */
var gulp = require('gulp'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-ruby-sass');

/**
 * JavaScript source files
 *
 * @type {string[]}
 */
var jsSrc = [
    'app/assets/bower/angular/angular.js',
    'app/assets/bower/jquery/dist/jquery.js',
    'app/assets/js/modules/*.js'
];

/**
 * JavaScript target folder
 *
 * @type {string}
 */
var jsTarget = 'public/js';

/**
 * Sass source file
 *
 * @type {string}
 */
var sassSrc = 'app/assets/sass/main.scss';

/**
 * Sass Target
 *
 * @type {string}
 */
var sassTarget = 'public/css';

/**
 * Copy bower packages
 *
 * Ref: http://stackoverflow.com/questions/21224252/looking-for-way-to-copy-files-in-gulp-and-rename-based-on-parent-directory
 */
gulp.task('copy-bower-packages', function() {
    gulp.src('app/assets/bower/font-awesome/**/*.*', {base: 'app/assets/bower/font-awesome'})
        .pipe(gulp.dest('public/vendor/font-awesome/'));

    gulp.src('app/assets/bower/normalize-css/*.*', {base: 'app/assets/bower/normalize-css'})
        .pipe(gulp.dest('public/vendor/normalize-css/'));

    gulp.src('app/assets/bower/respond/dest/*.*', {base: 'app/assets/bower/respond/dest'})
        .pipe(gulp.dest('public/vendor/respond/'));

    gulp.src('app/assets/bower/html5shiv/dist/*.*', {base: 'app/assets/bower/html5shiv/dist'})
        .pipe(gulp.dest('public/vendor/html5shiv/'));
});

/**
 * Compile Sass
 */
gulp.task('css', function() {
    return gulp.src(sassSrc)
        .pipe(sass({
            sourcemap: true,
            style: "compressed"
        }))
        .pipe(gulp.dest(sassTarget));
});

/**
 * Compile js
 */
gulp.task('js', function() {
    gulp.src(jsSrc)
        .pipe(sourcemaps.init())
            .pipe(concat('bundle.js'))
            .pipe(uglify({
                mangle: false
            }))
            .pipe(rename(jsTarget + '/bundle.min.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./'));
});

/**
 * Watcher task
 */
gulp.task('watch', function() {
    gulp.watch(['app/assets/sass/**/*.scss', 'app/assets/sass/**/*.sass'], ['css']);
    gulp.watch('app/assets/js/**/*.js', ['js']);
});

/**
 * Default task
 */
gulp.task('default', ['css', 'js', 'watch']);