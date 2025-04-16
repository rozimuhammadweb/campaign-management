<?php

namespace App\Mixins;

use Illuminate\Http\JsonResponse;

class ResponseFactoryMixin
{
    public function successJson()
    {
        return function($data, $message = 'ok'){
            return [
                'success'=> true,
                'data' => $data,
                'message' => $message
            ];
        };
    }

    public function errorJson()
    {
        return function($message, $status, $errors = null, $data = null){
            $data = [
                'success' => false,
                'message' => $message,
                'errors' => $errors,
                'data' => $data
            ];
            return new JsonResponse($data, $status);
        };
    }
}
