"use strict"
var gulp = require("gulp");
var sass = require('gulp-sass')
var jade = require("gulp-jade")
var imageMin = require("gulp-imagemin")
var browserSync = require("browser-sync")
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var wintersmith = require("wintersmith")


gulp.task('jade', function(){
    gulp.src('jade/index.jade')
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(jade({
            pretty: true
    }))
    .pipe(gulp.dest('public/'))
});

gulp.task("watch",function(){
    gulp.watch('./scss/**/*.scss', ['sass']);
    //gulp.watch('./jade/**/*.jade', ['jade']);
});

gulp.task("bower",function(){
    gulp.src('./bower_components/jquery/dist/**').pipe(gulp.dest("public/lib/jquery"));
    gulp.src('./bower_components/bootstrap-sass/assets/fonts/bootstrap/**/*').pipe(gulp.dest("public/lib/bootstrap-font/"));
})

gulp.task("winter",function(){
    var env = wintersmith("./config.json");

    //env.build(function(error) {
    //    if (error) throw error;
    //    console.log('Done!');
    //});
    //
    env.preview(function(error,server){
        //console.log("hoge",server);
    })
    //env.load(function(error, result) {
    //    if (error) throw error;
    //    console.log('Contents loaded!');
    //})

    browserSync.init({
        proxy: "http://localhost:8080"
    });
    gulp.watch([
        './contents/**/*','./templates/**/*'
    ], function(){
        browserSync.reload();
    });



})

gulp.task("default",["watch"])