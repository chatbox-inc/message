<?php
namespace App\Http\Response;
use Illuminate\Http\JsonResponse;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2016/02/13
 * Time: 4:06
 */
interface JsonResponseFactoryInterface
{
    public function create(array $data=[],$status=200,array $headers = []):JsonResponse;

    public function createFromError(\Exception $e):JsonResponse;

}