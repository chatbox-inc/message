<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/01/31
 * Time: 19:08
 */
namespace App\Http\Response;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\ResponseTrait;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Exception;

/**
 * 例外をResponseに変換する仕組み
 * @package App\Exceptions
 */
trait ApiExceptionHandlerTrait
{
    protected function handleError(Exception $e,JsonResponse $res){
        if($e instanceof HttpException){
            $res->setStatusCode(400);
            $res->setData([
                "status" => "BAD",
                "msg" => "not found"
            ]);
            return $res;
        }else{
            return $this->getErrorResponse($e,$res);
        }
    }


    protected function getErrorResponse(Exception $e,JsonResponse $res){
        $data = $this->formatException($e);
        $data["status"] = "ERROR";

        $res->setData($data);
        $res->setStatusCode(500);
        return $res;
    }

    protected function formatException(Exception $e){
        if(env("APP_ENV") === "local"){
            return $this->formatExceptionOnLocal($e);
        }else{
            return $this->formatExceptionOnProduction($e);
        }
    }

    protected function formatExceptionOnLocal(Exception $e){
        return [
            "msg" => $e->getMessage(),
            "line" => $e->getLine(),
            "file" => $e->getFile(),
            "code" => $e->getCode(),
            "previous" => $e->getPrevious(),
            "trace" => $e->getTrace(),
            "class" => get_class($e),
        ];
    }

    protected function formatExceptionOnProduction(Exception $e){
        return [
            "msg" => "whoops, something wrong"
        ];
    }

}