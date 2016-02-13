<?php
namespace App\Providers;

use App\Http\Response\ApiExceptionHandlerTrait;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Console\Kernel;
use App\AppConsoleKernel;

use App\ApiExceptionHandler;
use App\Http\Response\JsonResponseFactoryInterface;
/**
 * Bootstrap に書く上で名前空間が面倒なところとかを処理
 * User: mkkn
 * Date: 2016/02/13
 * Time: 0:41
 */
class ApiServiceProvider extends ServiceProvider
{

    public function boot(){
        $app = $this->app;
    }

    public function register()
    {
        $app = $this->app;
        $this->registerContainerBindings($app);
        $this->registerMiddleware($app);
        $this->registerServiceProvider($app);
    }

    /*
    |--------------------------------------------------------------------------
    | Register Container Bindings
    |--------------------------------------------------------------------------
    |
    | Now we will register a few bindings in the service container. We will
    | register the exception handler and the console kernel. You may add
    | your own bindings here if you like or you can make another file.
    |
    */
    protected function registerContainerBindings(Application $app)
    {
        $app->singleton(SessionManager::class,function()use($app){
            $manager = new \Illuminate\Session\SessionManager($app);
            $app->configure("session");
            return $manager;
        });

        $app->singleton(ExceptionHandler::class,ApiExceptionHandler::class);

        $app->singleton( Kernel::class, AppConsoleKernel::class);

        $app->singleton(JsonResponseFactoryInterface::class,function(){
            return new class() implements JsonResponseFactoryInterface{
                use ApiExceptionHandlerTrait;

                public function create(array $data = [], $status = 200, array $headers = []):JsonResponse
                {
                    return JsonResponse::create($data,$status,$headers);
                }

                public function createFromError(\Exception $e):JsonResponse
                {
                    $res = $this->create([],500);
                    return $this->handleError($e,$res);
                }

            };
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Register Service Providers
    |--------------------------------------------------------------------------
    |
    | Here we will register all of the application's service providers which
    | are used to bind services into the container. Service providers are
    | totally optional, so you are not required to uncomment this line.
    |
    */
    protected function registerMiddleware(Application $app){
        $app->middleware([
            StartSession::class
        ]);

        // $app->routeMiddleware([
        //     'auth' => App\Http\Middleware\Authenticate::class,
        // ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Register Middleware
    |--------------------------------------------------------------------------
    |
    | Next, we will register the middleware with the application. These can
    | be global middleware that run before and after each request into a
    | route or middleware that'll be assigned to some specific routes.
    |
    */
    protected function registerServiceProvider(Application $app){

        // $app->register(App\Providers\AppServiceProvider::class);
        // $app->register(App\Providers\AuthServiceProvider::class);
        // $app->register(App\Providers\EventServiceProvider::class);

        $app->register(SessionServiceProvider::class);
        if(class_exists(IdeHelperServiceProvider::class)){
            $app->register(IdeHelperServiceProvider::class);
        }
        $app->register(DebugServiceProvider::class);
    }


}