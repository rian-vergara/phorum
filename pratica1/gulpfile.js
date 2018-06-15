const project     = 'oficina-javascript/iniciais/pratica1'; 
const projectName = 'pratica1'; 

var gulp = require('gulp'),
cssnano = require('gulp-cssnano'),
autoprefixer = require('gulp-autoprefixer'),
postcss = require('gulp-postcss'),
browserSync = require('browser-sync');

gulp.task('server', ['build-precss', 'browserSync'], function() {
  gulp.watch('assets/dev-css/**/*.css').on('change', function (){
    gulp.start('build-precss');
  });
  gulp.watch('./assets/**/*',{ interval: 400 }).on('change', browserSync.reload);
});

gulp.task('browserSync', function() {

  browserSync.init({
    // server:{ baseDir:'./' }
    proxy:'localhost/'+project
  });
});

gulp.task('build-precss', ()=> {
  gulp.src('assets/dev-css/**/*.css')
    .pipe(postcss([require('precss')]))
    .pipe(autoprefixer({
        browsers: ['last 20 versions'],
        cascade: false
    }))
    .pipe(cssnano({zindex: false, reduceIdents: false}))
    .pipe(gulp.dest('assets/css/'))
});
