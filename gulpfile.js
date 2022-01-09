const fs = require('fs');
const { src, dest, watch } = require('gulp');

const minify = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass')(require('sass'));

const paths = {
	src: {
		css: './css/src/**/*.scss',
		js: './js/src/**/*.js'
	},
	dest: {
		css: './css/dist/css',
		js: './js/dist/js'
	}
}

const compile = () => {
	return src(paths.src.css)
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(minify())
		.pipe(dest(paths.dest.css));
}

const observe = () => {
	watch(paths.src.css, compile);
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

exports.sass = compile;
exports.build = build;
exports.watch = observe;
