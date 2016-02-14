"use strict"
var webpack = require("gulp-webpack")
var setting = require("./_setting")

module.exports = function(){
    this.src([`${setting.js.src}/**/*.js`])
        .pipe(webpack({
            "entry": {
                "common": `${setting.js.src}common.js`
            },
            "output": {
                "filename": `[name].bundle.js`
            },
            module: {
                loaders: [
                    { test: /\.js/,exclude: /node_modules/, loader: "babel" },
                    { test: /\.html/, loader: "html" }
                ]
            },
            resolve: {
                extensions:["",".js"]
            }
        }))
        .pipe(this.dest(`${setting.js.dist}`))
}

