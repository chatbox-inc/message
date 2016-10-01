<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/08/06
 * Time: 1:37
 */

namespace Chatbox\Message;

/**
 * Interface MessageServiceInterface
 * @package Chatbox\Message
 */
interface MessageServiceInterface
{

    /**
     * メッセージの取得
     * @throws MessageNotFoundException
     * @return mixed
     */
    public function find($_uid):MessageInterface;

    /**
     * メッセージの発行
     * @return mixed
     */
    public function write(array $message=[]):MessageInterface;

    /**
     * メッセージの更新
     * @throws MessageNotFoundException
     * @return mixed
     */
    public function rewrite($_uid,array $message);

    /**
     * メッセージの削除
     * @return mixed
     */
    public function remove($uid);
}

class MessageServiceException extends \Exception{}

class MessageNotFoundException extends MessageServiceException{}