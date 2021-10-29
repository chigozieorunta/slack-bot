const gulp = require('gulp');

gulp.task('build', async function () {
	gulp.src('src/*.php')
		.pipe(gulp.dest('build/src'));
	gulp.src('./*.php')
		.pipe(gulp.dest('build'));
	gulp.src('./composer.json')
		.pipe(gulp.dest('build'));
	gulp.src('./readme.txt')
		.pipe(gulp.dest('build'));
	gulp.src('assets/*.')
		.pipe(gulp.dest('build/assets'));
	gulp.src('languages/*.')
		.pipe(gulp.dest('build/languages'));
});