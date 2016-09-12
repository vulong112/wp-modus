// Include gulp
var gulp = require('gulp');

// Include Our Plugins

// Requires the gulp-sass plugin
var sass = require('gulp-sass');

// var browserSync = require('browser-sync').create();


gulp.task('sass', function(){
  return gulp.src('sass/style.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest(''))
});


/*// Gulp watch syntax
gulp.watch('sass/style.scss', ['sass']); */


gulp.task('watch', function(){
  gulp.watch('sass/style.scss', ['sass']); 
  // Other watchers
})

/*gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: 'app'
    },
  })
})*/

/*
gulp.task('sass', function() {
  return gulp.src('sass/style.scss') // Gets all files ending with .scss in app/scss
    .pipe(sass())
    .pipe(gulp.dest('app/css'))
    .pipe(browserSync.reload({
      stream: true
    }))
});*/
