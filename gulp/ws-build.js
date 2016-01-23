"use strict"
/**
 * WintersmithとBrowsersyncの連携
 */
var gulp = require("gulp");
var wintersmith = require("wintersmith")

module.exports = function(){
    var env = wintersmith("./config.json");

    console.log(this)
    env.build(function(error) {
        if (error) throw error;
        console.log('Done!');
    });
}

