"use strict"
var gulp = require('gulp');
var sitemap = require('gulp-sitemap');

module.exports = function() {
    this.src('build/**/*.html')
        .pipe(sitemap({
            siteUrl: 'http://chatbox-inc.com/'
        }))
        .pipe(gulp.dest('./build'));
};