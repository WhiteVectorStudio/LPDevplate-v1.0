/************************************************
	INCLUDE PLUGINS
************************************************/
	var gulp       = require('gulp');
	var compass    = require('gulp-compass');
	var uglify     = require('gulp-uglify');
	var concat     = require('gulp-concat');
	var browserify = require('browserify');
	var source     = require('vinyl-source-stream');
	var streamify  = require('gulp-streamify');
	var uglify     = require('gulp-uglify');
	var plumber    = require('gulp-plumber');
	var minifycss  = require('gulp-cssmin');
	var notify     = require('gulp-notify');
	var autoprefix = require('gulp-autoprefixer');
	var connect    = require('gulp-connect');
	var rename     = require("gulp-rename");

/************************************************
	PATH VARIABLES
************************************************/
	var htmlSrc      = './build/index.html';
	var htmlWatch    = './build/index.html';

	var stylesSrc    = './src/scss/**/*.scss';
	var stylesDest   = './build/css';
	var stylesWatch  = './src/scss/**/*.scss';

	var scriptsSrc   = './src/js/index';
	var scriptsDest  = './build/js';
	var scriptsWatch = './src/js/**/*.js';

	var imgSrc       = 'src/img/**/*';
	var imgDest      = 'build/img';
	var imgWatch     = './src/img/**/*';

/************************************************
	HTML
************************************************/
	gulp.task('html', function() {
		return gulp.src(htmlSrc)
			.pipe(notify('HTML changed!'))
			.pipe(connect.reload())
			.pipe(rename('index.php'));
	});

/************************************************
	SCSS & CSS
************************************************/
	gulp.task('styles', function() {
		return gulp.src(stylesSrc)
				.pipe(plumber())
				.pipe(compass({
					config_file: './config.rb',
					css: 'build/css',
					sass: 'src/scss/',
					comments: false
				}))
				.pipe(autoprefix("last 15 version"))
				.pipe(concat('style.css'))
				.pipe(minifycss())
				.pipe(rename('styles.min.css'))
				.pipe(gulp.dest(stylesDest))
				.pipe(notify('Styles compiled!'))
				.pipe(connect.reload());
	});

/************************************************
	JS
************************************************/
	gulp.task('scripts', function() {
	return browserify(scriptsSrc, { debug: true })
			.bundle()
			.pipe(source('bundle.js'))
			.pipe(streamify(uglify()))
			.pipe(rename('scripts.min.js'))
			.pipe(gulp.dest(scriptsDest))
			.pipe(notify('Scripts compiled!'))
			.pipe(connect.reload());
	});

/************************************************
	IMG
************************************************/
	gulp.task('images', function () {
		return gulp.src(imgSrc)
				.pipe(gulp.dest(imgDest))
				.pipe(notify('Images delivered!'))
				.pipe(connect.reload());
	});

/************************************************
	LIVERELOAD
************************************************/
	gulp.task('connect', function(){
		connect.server({
			root: 'build',
			livereload: true
		});
	});

/************************************************
	WATCH
************************************************/
	gulp.task('watch', function() {
		gulp.watch(stylesWatch, ['styles']);
		gulp.watch(scriptsWatch, ['scripts']);
		gulp.watch(htmlWatch, ['html']);
		gulp.watch(imgWatch, ['images']);
	});

/************************************************
	DEFAULT
************************************************/
	gulp.task('default', ['html', 'styles', 'scripts', 'watch', 'connect']);