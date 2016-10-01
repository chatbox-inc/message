<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/10/01
 * Time: 0:09
 */

namespace Chatbox\Message\Http\Input;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

trait InputTrait
{
    protected function request():Request{
        return app(Request::class);
    }

    protected function validate($data,$rules,$message=[]){
        /** @var Factory $validator */
        $validator = app("validator");
        $val = $validator->make($data,$rules,$message);
        if($val->passes()){
            return $data;
        }else{
            throw new ValidationException($val);
        }
    }


}