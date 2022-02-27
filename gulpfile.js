const fs = require('fs');
const path = require('path');
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

const build = async() => {
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
	vendorize();
}

const vendorize = async (node) => {
	node = node ? __dirname : node;
	let composer = fs.readFileSync(node + '/composer.json', 'utf8');
	let dependencies = Object.keys(JSON.parse(composer).require);
	console.log(node + '/composer.json');
	dependencies.forEach(key => {
		let dependency = key.split('/');
		let dir = node + '/vendor/' + dependency[0] + '/' + dependency[1];
		if (fs.existsSync(dir)) {
			vendorize(dir);
		}
	});
}

async function packageComposer (nodePoint = '.') {
	if(nodePoint) console.log(nodePoint);
	//const composer = fs.readFileSync(node + '/composer.json', 'utf8');
    //const dependencies = Object.keys(JSON.parse(composer).require);
    //console.log("Found dependencies", dependencies);
    //for (const key of dependencies) {
    //    const pieces = key.split("/");
    //    const dir = path.join(node, 'vendor', pieces[0], pieces[1]);
    //    if (fs.existsSync(dir)) {
    //        console.log(`Calling packageComposer(${dir}) recursively`);
    //        packageComposer(dir);
    //    }
    //}
}

//src(`${__dirname}/vendor/${dependency[0]}/**/*`).pipe(dest(`build/vendor/${dependency[0]}`));
//vendorize(dir);

//const vendor = () => {
//	const composer = fs.readFileSync('./composer.json', 'utf8');
//	const dependencies = Object.keys(JSON.parse(composer).require);
//	dependencies.forEach((key, index) => {
//		let dependency = key.split('/');
//		if(dependency[0] !== 'php') {
//			src(`vendor/${dependency[0]}/**/*`)
//				.pipe(dest(`build/vendor/${dependency[0]}`));
//		}
//	});
//}

exports.sass = compile;
exports.build = build;
exports.watch = observe;
exports.vendorize = packageComposer;
