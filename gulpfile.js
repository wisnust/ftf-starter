var gulp 			= require('gulp');
var plumber 		= require('gulp-plumber');
var sass 			= require('gulp-sass');
var watch 			= require('gulp-watch');
var rename 			= require('gulp-rename');
var postcss 		= require('gulp-postcss');
var sourcemaps 		= require('gulp-sourcemaps');
var autoprefixer 	= require('autoprefixer');
var cleanCSS 		= require('gulp-clean-css');
var gulpSequence 	= require('gulp-sequence');
var uglify 			= require('gulp-uglify');
var concat 			= require('gulp-concat');

gulp.task('watch', function () {
    gulp.watch('./styles/scss/**/*.scss', ['styles']);
    gulp.watch('./js/**/*.js', ['scripts']);
});

gulp.task('styles', function(callback){
    gulpSequence('sass', 'css-min')(callback)
});

gulp.task('css-min', function() {
    return gulp.src('./styles/css/main.css')
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(cleanCSS({compatibility: '*'}))
    .pipe(plumber({
        errorHandler: function (err) {
            console.log(err);
            this.emit('end');
        }
    }))
    .pipe(rename({suffix: '.min'}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./styles/css/'));
});

gulp.task('sass', function () {
    var stream = gulp.src('./styles/scss/main.scss')
    .pipe(plumber({
        errorHandler: function (err) {
            console.log(err);
            this.emit('end');
        }
    }))
    .pipe(sass())
    .pipe(postcss([ autoprefixer({ browsers: ["> 0%"] }) ]))
    .pipe(gulp.dest('./styles/css/'))
    .pipe(rename('main.css'))
    return stream;
});

gulp.task('scripts', function() {
    var stream = gulp.src(['./js/main.js'])
    .pipe(plumber({
        errorHandler: function (err) {
            console.log(err);
            this.emit('end');
        }
    }))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./js/'))
    return stream;
});

gulp.task('build', ['watch']);