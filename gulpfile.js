"use strict"
var gulp = require("gulp");

gulp.task('sass', require("./gulp/sass.js"));

gulp.task("babel",require("./gulp/babel.js"))

gulp.task("wintersmith",require("./gulp/wintersmith.js"))

gulp.task("imagemin",require("./gulp/image-min.js"))

gulp.task("bower",require("./gulp/bower.js"))

gulp.task("sitemap",require("./gulp/sitemap.js"))

gulp.task("webpack",require("./gulp/webpack.js"))

gulp.task("watch",function(){
    gulp.watch('./scss/**/*.scss', ['sass']);
    //gulp.watch('./script/**/*.js', ['babel']);
});

gulp.task("default",["watch"])

