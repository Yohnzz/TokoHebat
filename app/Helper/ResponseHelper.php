<?php
namespace App\Helper;

use Illuminate\Http\Response;

class ResponseHelper{
    public static function success(mixed $data = null, mixed $message = 'Success', int $code = Response::HTTP_OK){
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ],$code);
    }
    public static function error(mixed $data = null, mixed $message = 'Error', int $code = Response::HTTP_BAD_REQUEST){
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,
        ],$code);
    }
}