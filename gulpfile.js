var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

gulp.task('watch', function(){
  gulp.watch('styles/**/*.scss', gulp.series('sass'));
  // Other watchers
  browserSync.init({
        port: 8200,
        proxy: "http://localhost:8200"
    });
    gulp.watch("./*.php").on("change", browserSync.reload);
    gulp.watch("./styles/**/*.scss").on("change", browserSync.reload);
})

gulp.task('sass', function(){
  return gulp.src('styles/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ) )
    .pipe(gulp.dest('./'))
});
