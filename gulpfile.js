var gulp = require("gulp");

//For postcss
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var partialImport = require('postcss-partial-import')({ /* options */ });
var precss = require('precss'); //use Sass-like markup in your CSS files
var sourcemaps = require('gulp-sourcemaps');

var ts = require("gulp-typescript");
var tsProject = ts.createProject("tsconfig.json");

console.log('tsProject', tsProject.options.outDir);

gulp.task("scripts", function () {
    return tsProject.src()
        .pipe(ts(tsProject))
        .js.pipe(gulp.dest("./"+tsProject.options.outDir));
});

gulp.task('css', function () {
    return gulp.src([
                     '!./app/Resources/assets/styles/modules/',
                     './app/Resources/assets/styles/*.css'
                    ])
        .pipe( sourcemaps.init() )
        .pipe( postcss([ partialImport, autoprefixer, precss ]) )
        .pipe( sourcemaps.write('.') )
        .pipe( gulp.dest('./app/assets/css/') );
});


gulp.task('watch', function () {
   gulp.watch('./app/Resources/css/**/*.css', ['css']);
   gulp.watch('./app/Resources/scripts/**/*.ts', ['scripts']);
});

gulp.task('default', ['scripts', 'css', 'watch']);
