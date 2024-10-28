<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ResponseTrait {

    public function successResponse($statusCode, $msg, $data){
      return response()->json([
            'status' => true,
            'msg' => $msg,
            'data' => $data,
      ],$statusCode);
    }

    public function errorResponse($statusCode, $msg, $data){
      return response()->json([
            'status' => true,
            'msg' => $msg,
            'data' => $data,
      ],$statusCode);
    }

}