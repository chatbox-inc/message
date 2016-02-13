"use strict"
/**
 * WintersmithとBrowsersyncの連携
 */
var gulp = require("gulp");
var browserSync = require("browser-sync")
var wintersmith = require("wintersmith")

module.exports = function(){
    console.log
    var env = wintersmith("./config.json");

    env.preview(function(error,server){
        //console.log("hoge",server);
    })

    browserSync.init({
        proxy: "http://localhost:8080",
        open:"external"
    });
    this.watch([
        './contents/**/*','./templates/**/*'
    ], function(){
        setTimeout(function(){
            browserSync.reload();
        },500);
    });
}

