// GULP PACKAGES
// Most packages are lazy loaded
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    browserSync = require('browser-sync').create(),
    filter = require('gulp-filter'),
    plugin = require('gulp-load-plugins')();
    
 
// GULP VARIABLES   
// Modify these variables to match your project needs   

// Set local URL if using Browser-Sync
const LOCAL_URL = 'http://localhost/';

// Set path to Foundation files
const BOOTSTRAP = 'node_modules/bootstrap';

// Select Foundation components, remove components project will not use
const SOURCE = {
	scripts: [
		// Lets grab what-input first
	    'node_modules/popper.js/dist/umd/popper.js',  

          // Pick the components you need in your project
          BOOTSTRAP + '/js/dist/util.js',
          BOOTSTRAP + '/js/dist/alert.js',
          BOOTSTRAP + '/js/dist/button.js',
          BOOTSTRAP + '/js/dist/carousel.js',
          BOOTSTRAP + '/js/dist/collapse.js',
          BOOTSTRAP + '/js/dist/dropdown.js',
          BOOTSTRAP + '/js/dist/modal.js',
          BOOTSTRAP + '/js/dist/scrollspy.js',
          BOOTSTRAP + '/js/dist/tab.js',
          BOOTSTRAP + '/js/dist/tooltip.js',
          BOOTSTRAP + '/js/dist/popover.js',

		// Place custom JS here, files will be concantonated, minified if ran with --production
		'assets/scripts/js/**/*.js'	
    ],
   
	// Scss files will be concantonated, minified if ran with --production
	styles: 'assets/styles/scss/**/*.scss',
		
	// Images placed here will be optimized
	images: 'assets/images/**/*',
	
	php: '**/*.php'
};

const ASSETS = {
	styles: 'assets/styles/',
	scripts: 'assets/scripts/',
	images: 'assets/images/',
	all: 'assets/'
};

const JSHINT_CONFIG = {
	"node": true,
	"globals": {
		"document": true,
		"jQuery": true
	}
};

// GULP FUNCTIONS
// JSHint, concat, and minify JavaScript 
gulp.task('scripts', function() {
	
	// Use a custom filter so we only lint custom JS
	const CUSTOMFILTER = filter(ASSETS.scripts + 'js/**/*.js', {restore: true});
	
	return gulp.src(SOURCE.scripts)
		.pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
		.pipe(plugin.sourcemaps.init())
		.pipe(plugin.babel({
			presets: ['es2015'],
			compact: true,
            ignore: ['popper.js']
		}))
		.pipe(CUSTOMFILTER)
			.pipe(plugin.jshint(JSHINT_CONFIG))
			.pipe(plugin.jshint.reporter('jshint-stylish'))
			.pipe(CUSTOMFILTER.restore)
		.pipe(plugin.concat('scripts.js'))
		.pipe(plugin.uglify())
		.pipe(plugin.sourcemaps.write('.')) // Creates sourcemap for minified JS
		.pipe(gulp.dest(ASSETS.scripts))
});

// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
	return gulp.src(SOURCE.styles)
		.pipe(plugin.plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
		.pipe(plugin.sourcemaps.init())
		.pipe(plugin.sass())
		.pipe(plugin.autoprefixer({
		    browsers: [
                "Chrome >= 45",
                "Firefox ESR",
                "Edge >= 12",
                "Explorer >= 10",
                "iOS >= 9",
                "Safari >= 9",
                "Android >= 4.4",
                "Opera >= 30"
		    ],
		    cascade: false
		}))
		.pipe(plugin.cssnano())
		.pipe(plugin.sourcemaps.write('.'))
		.pipe(gulp.dest(ASSETS.styles))
		.pipe(browserSync.reload({
          stream: true
        }));
});

// Optimize images, move into assets directory
gulp.task('images', function() {
	return gulp.src(SOURCE.images)
		.pipe(plugin.imagemin())
		.pipe(gulp.dest(ASSETS.images))
});

// Browser-Sync watch files and inject changes
gulp.task('browsersync', function() {
    
    // Watch these files
    var files = [
    	SOURCE.styles, 
    	SOURCE.scripts,
    	SOURCE.images,
    	SOURCE.php,
    ];

    browserSync.init(files, {
	    proxy: LOCAL_URL,
    });
    
    gulp.watch(SOURCE.styles, gulp.parallel('styles'));
    gulp.watch(SOURCE.scripts, gulp.parallel('scripts')).on('change', browserSync.reload);
    gulp.watch(SOURCE.images, gulp.parallel('images'));

});

// Watch files for changes (without Browser-Sync)
gulp.task('watch', function() {

	// Watch .scss files
	gulp.watch(SOURCE.styles, gulp.parallel('styles'));
	
	// Watch scripts files
	gulp.watch(SOURCE.scripts, gulp.parallel('scripts'));
	
	// Watch images files
	gulp.watch(SOURCE.images, gulp.parallel('images'));
  
}); 

// Run styles, scripts and bootstrap javascripst
gulp.task('default', gulp.parallel('styles', 'scripts', 'images'));
