const gulp = require('gulp');
      imagemin = require('gulp-imagemin');
      watch = require('gulp-watch');

gulp.task('default', function () {
    // Endless stream mode
    return watch('public/uploads/*', { ignoreInitial: false })
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('public/images'))
});
// exports.default = () => (
//     gulp.src('public/uploads/*')
//         .pipe(imagemin([
//             imagemin.gifsicle({interlaced: true}),
//             imagemin.jpegtran({progressive: true}),
//             imagemin.optipng({optimizationLevel: 5}),
//             imagemin.svgo({
//                 plugins: [
//                     {removeViewBox: true},
//                     {cleanupIDs: false}
//                 ]
//             })
//         ]))
//         .pipe(gulp.dest('public/images'))
// );
