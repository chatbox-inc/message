"use strict"
var webpack = require("webpack")

module.exports = function(){

    var compiler = webpack({
        "entry": {
            "common":"./script/app.js"
        },
        "output": {
            "filename": "./contents/assets/js/[name].bundle.js"
        },
        module: {
            loaders: [
                { test: /\.js/, loader: "es6" },
                { test: /\.html/, loader: "html" }
            ]
        },
        resolve: {
            extensions:["",".js"]
        }
    });

    console.log(compiler)

    compiler.run(function(err, stats) {
        console.log("hogehogemi",err);
    });

    compiler.watch({ // watch options:
        aggregateTimeout: 300, // wait so long for more changes
        poll: gulpfile.js // use polling instead of native watchers
        // pass a number to set the polling interval
    }, function(err, stats) {
        console.log("hogehogemipiyoyo",err);
        // ...
    });
}

