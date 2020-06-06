var gulp = require('gulp'),
	browserSync = require('browser-sync').create();
	sass = require('gulp-sass');



gulp.task('sass', function(done){
	gulp.src('./src/sass/*.sass')
		.pipe(sass())
		.pipe(gulp.dest('./src/css/'))
		.pipe(browserSync.stream());

		done()
});


gulp.task('serve', function(done) {

    browserSync.init({
        server: "./src/"
    });

    gulp.watch("./src/sass/*.sass", gulp.series('sass'));

    gulp.watch("./src/*.html").on('change', () => {
      browserSync.reload();
      done();
    });
    gulp.watch("./src/js/*.js").on('change', () => {
      browserSync.reload();
      done();
    });


    done();
});

gulp.task('default', gulp.series('sass', 'serve'));
