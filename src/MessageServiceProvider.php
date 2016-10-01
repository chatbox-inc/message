<?php
namespace Chatbox\Message;
use Chatbox\Message\Storage\Eloquent\MessageService;
use Illuminate\Support\ServiceProvider;
use Chatbox\Message\Http\MessageController;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 1:36
 */
class MessageServiceProvider extends ServiceProvider
{
    public function register()
    {
        //サービスの登録
        $this->app->singleton(MessageServiceInterface::class,function(){
            return new MessageService();
        });
        //メッセージの登録
        $this->setRoute($this->app);
    }

    public function setRoute($app){
        // 単一メッセージの取得

        $app->get("/message/{uid}",MessageController::class."@get");
        // メッセージの投稿
        $app->post("/message/",MessageController::class."@write");
        // メッセージの更新
        $app->put("/message/{uid}",MessageController::class."@rewrite");
        // メッセージの削除
        $app->delete("/message/{uid}",MessageController::class."@delete");
    }
}