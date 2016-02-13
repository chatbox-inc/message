<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new \Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    throw $e;
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/')
);

$app->withFacades();

$app->withEloquent();

$app->register(\App\Providers\ApiServiceProvider::class);

//$app->group(['namespace' => 'App\Http\Controllers'], function ($app) {
//    require __DIR__.'/../app/Http/routes.php';
//});

return $app;
