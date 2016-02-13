<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/02/13
 * Time: 4:14
 */

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use Laravel\Lumen\Application;
use Carbon\Carbon;
/**
 *
 * User: mkkn
 * Date: 2016/02/09
 * Time: 20:09
 */
class DebugServiceProvider extends ServiceProvider
{

    public function boot(){
        if(env("APP_ENABLE_QUERYLOG")){
            app("db")->listen(function($sql, $bindings, $time) {
                /** @var LoggerInterface $logger */
                $logger = app(LoggerInterface::class);
                $logger->debug(print_r($sql, TRUE));
                $logger->debug(print_r($bindings, TRUE));
            });
        }
    }

    public function register(){
        $this->registerDebugRoute();


    }

    protected function registerDebugRoute(){
        /** @var Application $app */
        $app = $this->app;

        $app->get("/debug",function(){
            $key = "DEBUG_COUNT";
            $session = app(Request::class)->session();
            $count = $session->get($key,0);
            $session->put($key,$count+1);
            return JsonResponse::create([
                "debug" => "this is debug route",
                "time" => Carbon::now(),
                "session" => $count
            ]);
        });
        $app->get("/error",function(){
            throw new \Exception;
        });
    }

}