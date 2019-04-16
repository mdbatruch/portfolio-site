var gulp = require('gulp');
var sass = require('gulp-sass');
const concat = require('gulp-concat-css');
var browserSync = require('browser-sync').create();
 
// gulp.task('default', function(){
 
//     console.log('default gulp task...')
 
// });

function runSass() {
    return gulp
    .src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
      .pipe(concat('style.css'))
      .pipe(gulp.dest('../css'));
  }
 
function watch() {
    gulp.watch('sass/*.scss', runSass).on('change', browserSync.reload);
    // gulp.watch("app/*.html").on('change', browserSync.reload);
}

exports.runSass = runSass;
exports.watch = watch;