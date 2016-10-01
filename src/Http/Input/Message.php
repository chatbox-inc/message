<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/10/01
 * Time: 0:07
 */

namespace Chatbox\Message\Http\Input;

class Message
{
    use InputTrait;

    public $subject;

    public $from;

    public $to;

    public $body;

    public function __construct($message=null)
    {
        if(!$message){
            $message = $this->request()->get("message");
            $this->validate([
                "message" => $message
            ],[
                "message" => ["required","array"],
                "message.subject" => ["required","max:200"],
                "message.from" => ["required","max:200"],
                "message.to" => ["required","max:200"],
                "message.body" => ["required","array"],
            ]);

            $this->subject = $message["subject"];
            $this->to = $message["to"];
            $this->from = $message["from"];
            $this->body = $message["body"];
        }
    }

}