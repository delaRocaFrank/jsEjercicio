const gulp = require('gulp'),
sass=require('gulp-sass'),
autoprefixer= require('gulp-autoprefixer'),
browserSync = require('browser-sync').create();

gulp.task('sass',()=>{
    gulp.src('scss/*.scss')
    .pipe(sass({
        outputStyle: 'expanded'
    }))
    .pipe(autoprefixer({
        versions:['last 2 browsers']
    }))
    .pipe(gulp.dest('./'))

});
gulp.task('default',() =>{
    browserSync.init({
        proxy:"localhost/login",
<<<<<<< HEAD
        port:8080
=======
        port:8000
>>>>>>> 3d2e58b9e5bf2c4282561ad9ff00c74e2f2ef9c4
    })
    gulp.watch('./*.php').on('change',browserSync.reload);
    gulp.watch('./*.html').on('change',browserSync.reload);
    gulp.watch('./*.css').on('change',browserSync.reload);
    gulp.watch('./*.js').on('change',browserSync.reload);
    gulp.watch('./scss/*.scss',['sass']);
    
});
