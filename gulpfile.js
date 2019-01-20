const gulp      = require("gulp"); 
const concat    =require ("gulp-concat");
const sass      = require("gulp-sass"); 
const imagemin  = require('gulp-imagemin');
const cleanCSS  = require('gulp-clean-css')


/* Flytta PHP-filer */
gulp.task("copyphp", function(){
    return gulp.src("src/*.php")  /* */
        .pipe(gulp.dest("pub/")) /* Skickar vidare till mappen pub */
});

gulp.task("copyphpinclude", function(){
    return gulp.src("src/include/*.php")  /* */
        .pipe(gulp.dest("pub/include/")) /* Skickar vidare till mappen pub */
});

gulp.task("copyphpclass", function(){
    return gulp.src("src/classes/*.php")  /* */
        .pipe(gulp.dest("pub/classes/")) /* Skickar vidare till mappen pub */
});


gulp.task('scss', function () {
    return gulp.src('src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat("style.css"))
    .pipe(gulp.dest('src/css/'));
  });

  /* Minifiera och sätta ihop css-filer */ 
gulp.task('minifycss', function() {
    return gulp.src('src/css/*.css')
      .pipe(concat("style.css"))
      .pipe(cleanCSS())
      .pipe(gulp.dest('pub/css'));
  });

  gulp.task('imagemin', function() {
    return gulp.src('src/images/*')
        .pipe(imagemin())
        .pipe(gulp.dest('pub/images'))
}); 

gulp.task("default", function(){

});
   
