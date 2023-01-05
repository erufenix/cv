const { src, dest } = require('gulp');
const concat = require('gulp-concat');

const cssBundle = () =>
  src([
    'assets/bootstrap-4/css/bootstrap.min.css',
    'assets/css/reset.css',
    'assets/css/perfect-scrollbar.css',
    'assets/css/style.css',
    'assets/css/colors/color-1.css',
    'assets/css/cv.css'
  ])
  .pipe(concat('stylescv.css'))
  .pipe(dest('assets/css'));

  exports.cssBundle = cssBundle;