"use strict"
/**
 * bower_components の転送用サンプル
 */
var concat = require("gulp-concat");

module.exports = function(){
    this.src('./bower_components/jquery/dist/**')
        .pipe(this.dest("contents/lib/jquery"));
    this.src('./bower_components/bootstrap-sass/assets/fonts/bootstrap/**/*')
        .pipe(this.dest("contents/lib/bootstrap/fonts/"));
    this.src('./bower_components/bootstrap-sass/assets/javascripts/*')
        .pipe(this.dest("contents/lib/bootstrap/js/"));
    this.src('./bower_components/font-awesome/css/**/*')
        .pipe(this.dest("contents/lib/font-awesome/css"));
    this.src('./bower_components/font-awesome/fonts/**/*')
        .pipe(this.dest("contents/lib/font-awesome/fonts"));
}