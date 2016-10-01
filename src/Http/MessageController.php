<?php
namespace Chatbox\Message\Http;
use Chatbox\Message\Http\Input\Message;
use Chatbox\Message\MessageServiceInterface;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:02
 */
class MessageController
{
    protected $message;

    public function __construct(
        MessageServiceInterface $message
    ){
        $this->message = $message;
    }

    public function get($id)
    {
        $message = $this->message->find($id);
        return [
            "message" => $message
        ];
    }

    public function write(Message $message){
        $message = $this->message->write((array)$message);
        return [
            "message" => $message
        ];
    }

    public function rewrite($uid,Message $message){
        $this->message->rewrite($uid,(array)$message);
        return [
            "message" => $message
        ];
    }

    public function delete($uid){
        $this->message->remove([
            "id" => $uid
        ]);
        return [
            "uid" => $uid
        ];
    }

}