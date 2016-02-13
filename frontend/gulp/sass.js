"use strict"
var sass = require('gulp-sass')
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

module.exports = function(){
    this.src('scss/common.scss')
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(sass())
    .pipe(this.dest('contents/assets/css/'))
};