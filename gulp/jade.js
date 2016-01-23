"use strict"
var jade = require("gulp-jade")
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var wintersmith = require("wintersmith")


module.exports = function(){
    this.src('jade/index.jade')
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(jade({
            pretty: true
    }))
    .pipe(this.dest('public/'))
};
