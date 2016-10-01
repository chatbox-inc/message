const Swagger = require('swagger-client');
const fs = require('fs');
const yaml = require("js-yaml")

const text = fs.readFileSync(__dirname + '/swagger.yml', 'utf-8');

const spec = yaml.safeLoad(text);

const promise = new Swagger({
    spec,
    usePromise: true
})

module.exports = promise