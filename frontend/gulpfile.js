"use strict"
var gulp = require("gulp");

gulp.task('sass', require("./gulp/sass.js"));

gulp.task("babel",require("./gulp/babel.js"))

gulp.task("imagemin",require("./gulp/image-min.js"))

gulp.task("bower",require("./gulp/bower.js"))

gulp.task("sitemap",require("./gulp/sitemap.js"))

gulp.task("webpack",require("./gulp/webpack.js"))

gulp.task("ws:preview", require("./gulp/ws-preview"));

gulp.task("ws:build",   require("./gulp/ws-build"));

gulp.task("watch",function(){
    gulp.watch('./scss/**/*.scss', ['sass']);
    //gulp.watch('./script/**/*.js', ['babel']);
});

gulp.task("default",["watch"])

