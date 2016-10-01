<?php //arrayobject.spec.php
describe('MessageInterface', function() {

    /** @var \Chatbox\Message\MessageServiceInterface $service */
    $service = new \Chatbox\RestApp\Message1();

    function is_same_message(\Chatbox\Message\MessageInterface $message1,array $message2){
        assert($message1->from === $message2["from"]);
        assert($message1->to === $message2["to"] );
        assert($message1->subject === $message2["subject"] );
        assert($message1->body === json_encode($message2["body"],true) );
    }

    it('should write finelly', function() use($service) {

        // 書き込み可能かどうか
        $message = [
            "from" => "Tom",
            "to" => "John",
            "subject" => "fuga",
            "body" => ["hoge","piyo"]
        ];
        $mObj = $service->write($message);
        assert($mObj instanceof \Chatbox\Message\MessageInterface);

        // 読み出しで同じメッセージが取得できるか
        $mObj = $service->find($mObj["code"]);
        is_same_message($mObj,$message);

        // 更新で同じメッセージが取れるか
        $message = [
            "from" => "Tom2",
            "to" => "John2",
            "subject" => "fuga2",
            "body" => ["hoge2","piyo2"]
        ];
        $mObj = $service->rewrite($mObj["code"],$message);
        is_same_message($mObj,$message);

        // 再取得で更新後のオブジェクトが取れるか
        $mObj = $service->find($mObj["code"]);
        is_same_message($mObj,$message);
    });

    it('should delete finelly', function() use($service) {

        // 書き込む
        $message = [
            "from" => "Tom",
            "to" => "John",
            "subject" => "fuga",
            "body" => ["hoge","piyo"]
        ];
        $mObj = $service->write($message);
        assert($mObj instanceof \Chatbox\Message\MessageInterface);

        // 読み出す
        $mObj = $service->find($mObj["code"]);
        is_same_message($mObj,$message);

        // 削除後の取得でエラーとなるか
        $e = null;
        $service->remove($mObj["code"]);
        try{
            $service->find($mObj["code"]);
        }catch (\Chatbox\Message\MessageNotFoundException $e){}
        assert($e instanceof \Chatbox\Message\MessageNotFoundException);

        // 存在しないキーの削除でエラーとならないか
        $e = null;
        try{
            $service->delete($mObj["code"]);
        }catch (\Exception $e){}
        assert($e === null);
    });
});
?>