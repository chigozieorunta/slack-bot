const fs = require('fs');
const { src, dest, watch } = require('gulp');

const minify = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass')(require('sass'));

const compile = () => {
	return src('./css/src/**/*.scss')
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minify())
		.pipe(dest('./assets/dist/css'));
}

const build = () => {
	src('src/*.php')
		.pipe(dest('build/src'));
	src('./*.php')
		.pipe(dest('build'));
	src('./composer.json')
		.pipe(dest('build'));
	src('./readme.txt')
		.pipe(dest('build'));
	src('assets/*')
		.pipe(dest('build/assets'));
	src('languages/*')
		.pipe(dest('build/languages'));
}

exports.sass = compile;
exports.build = build;

const vendor = () => {
	const composer = fs.readFileSync('./composer.json', 'utf8');
	const dependencies = Object.keys(JSON.parse(composer).require);
	dependencies.forEach((key, index) => {
		let dependency = key.split('/');
		if(dependency[0] !== 'php') {
			src(`vendor/${dependency[0]}/**/*`)
				.pipe(dest(`build/vendor/${dependency[0]}`));
		}
	});
}
