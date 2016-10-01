<?php
namespace Chatbox\Message\Storage\Eloquent;
use Chatbox\Message\MessageInterface;
use Chatbox\Message\MessageNotFoundException;
use Chatbox\Message\MessageServiceException;
use Chatbox\Message\MessageServiceInterface;
use Chatbox\Message\Storage\SimpleSchema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 2:51
 */
class MessageService extends Model implements MessageServiceInterface, MessageInterface
{
    use SimpleSchema;

    protected $table = "cb_message";

    protected $fillable = ["code","from","to","body","subject"];

    public function getUid()
    {
        return $this->code;
    }

    public function find($_uid):MessageInterface
    {
        $message = $this->where("code",$_uid)->first();
        if($message){
            return $message;
        }else{
            throw new MessageNotFoundException("message not found");
        }
    }

    public function write(array $message = []):MessageInterface
    {
        $message["code"] = sha1(mt_rand());
        $message["body"] = json_encode(array_get($message,"body"));
        $message = $this->validate($message);
        return $this->create($message);
    }

    public function rewrite($_uid, array $message)
    {
        $message["body"] = json_encode($message["body"]);
        $message["code"] = $_uid;

        $loaded = $this->find($_uid);
        $loaded->fill($message);
        $this->validate($loaded->toArray());
        $loaded->update();
        return $loaded;
    }

    public function remove($uid)
    {
        $this->where("code",$uid)->delete();
    }

    protected function validate(array $message){
        $rules = [
            "code" => ["required","string","max:255","alpha_num"],
            "from" => ["required","string","max:255"],
            "to" => ["required","string","max:255"],
            "body" => ["required","string"],
            "subject" => ["required","string","max:255"],
        ];
        /** @var Factory $validator */
        $validator = app("validator");
        $val = $validator->make($message,$rules,$message);
        if($val->passes()){
            return $message;
        }else{
            throw new ValidationException($val);
        }
    }
}