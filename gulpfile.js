var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('compile-sass', function() {
  var sassOptions = {
    outputStyle: 'nested',
    precision: 3,
    errLogToConsole: true,
    includePaths: ['node_modules/bootstrap/scss', 'wordpress-theme/src/sass']
  };


  return gulp.src('assets/sass/screen.scss')
    .pipe(sass(sassOptions))
    .pipe(gulp.dest('wordpress-theme/assets/css'));
});

gulp.task('process-images', function() {
  // simple copy for now
  return gulp.src('assets/img/**')
    .pipe(gulp.dest('wordpress-theme/assets/img'));
});

gulp.task('process-fonts', function() {
  return gulp.src('assets/fonts/*/**')
    .pipe(gulp.dest('wordpress-theme/assets/fonts'));
});

gulp.task('watch', function() {
  gulp.watch('assets/sass/**/*', gulp.series('compile-sass'));
  gulp.watch('assets/img/**/*', gulp.series('process-images'));
  gulp.watch('assets/fonts/**/*', gulp.series('process-fonts'));
});
