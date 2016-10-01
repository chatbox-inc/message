<?php
namespace Chatbox\Message\Spec;
use Chatbox\Message\MessageInterface;
use Chatbox\Message\MessageNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Testing\Concerns\MakesHttpRequests;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/07
 * Time: 17:30
 */
class HttpSpec
{
    use MakesHttpRequests;

    protected $app;

    protected $entry;

    protected $baseUrl = 'http://localhost:8080';

    /**
     * HttpSpec constructor.
     * @param $lumen
     */
    public function __construct($lumen)
    {
        $this->app = $lumen;
    }

    /**
     * @return Response;
     */
    public function response(){
        $response = $this->response;
        return $response;
    }

    public function callGet($token){
        $this->get("/message/$token");
        return $this;
    }

    public function callPost($message){
        $this->post("/message/",[
            "message" => $message
        ]);
        return $this;
    }

    public function callPut($token,$message){
        $this->put("/message/$token",[
            "message" => $message
        ]);
        return $this;
    }

    public function callDelete($token){
        $this->delete("/message/$token");
        return $this;
    }

    protected function getUid(){
        $body = $this->response()->getOriginalContent();
        return array_get($body,"uid");
    }

    protected function getMessage(){
        $body = $this->response()->getOriginalContent();
        return array_get($body,"message");
    }

    public function assertResponseHasUid():string{
        $uid = $this->getUid();
        assert(is_string($uid));
        return $uid;
    }

    public function assertResponseHasMessage():MessageInterface{
        $message = $this->getMessage();
        assert($message instanceof MessageInterface);
        return $message;
    }

    public function assertResponseHasNotFoundException(){
        $e = $this->response()->exception;
        assert($e instanceof MessageNotFoundException);
    }

    public function assertResponseHasValidationException(){
        $e = $this->response()->exception;
        assert($e instanceof ValidationException);
    }

    public function isOk(){
        assert($this->response()->getStatusCode() === 200);
    }

}