/* File: gulpfile.js */

// Include gulp
var gulp   = require('gulp');

// Include plugins
var jshint = require('gulp-jshint');
var sourcemaps = require('gulp-sourcemaps');
var concat  = require('gulp-concat');
var uglify  = require('gulp-uglify');
var rename  = require('gulp-rename');
var ngAnnotate = require('gulp-ng-annotate');

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('src/angular/**/*.js')
       .pipe(concat('app.js'))
       .pipe(rename({suffix: '.min'}))
    //    .pipe(ngAnnotate())
    //    .pipe(uglify())
       .pipe(gulp.dest('assets/angular'));
});
// Default Task
gulp.task('default', ['scripts']);

// configure the jshint task
gulp.task('jshint', function() {
  return gulp.src('source/angular/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});
