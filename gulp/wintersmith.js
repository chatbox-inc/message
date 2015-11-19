"use strict"
/**
 * WintersmithとBrowsersyncの連携
 */
var gulp = require("gulp");
var browserSync = require("browser-sync")
var wintersmith = require("wintersmith")

module.exports = function(){
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
        proxy: "http://localhost:8080",
        open:"external"
    });
    this.watch([
        './contents/**/*','./templates/**/*'
    ], function(){
        browserSync.reload();
    });
}

