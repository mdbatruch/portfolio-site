var gulp = require('gulp');
var sass = require('gulp-sass');
const concat = require('gulp-concat-css');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
 
gulp.task('default', function(){
 
    console.log('default gulp task...')
 
});

function runSass() {
    return gulp
    .src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
      .pipe(concat('style.css'))
      .pipe(gulp.dest('../css'))
      .pipe(reload({stream: true}));
  }

  // function Copy() {
  //   return gulp
  //   .src('../private/**')
  //     .pipe(gulp.dest('../private/**'))
  //     .pipe(reload({stream: true}));
  // }
  
  
function watch() {

      browserSync.init({
        injectChanges: true,
        port: 8888
    });

    console.log('browsersync!');

    gulp.watch('sass/*.scss', runSass).on('change', browserSync.reload);
    // gulp.watch('../private/**', Copy).on('change', browserSync.reload);
    // gulp.watch("app/*.html").on('change', browserSync.reload);
}

exports.runSass = runSass;
// exports.Copy = Copy;
exports.watch = watch;