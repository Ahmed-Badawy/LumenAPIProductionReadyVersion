<?php

namespace App\Helpers;

class ResponseHelper {
    //Please check: https://github.com/omniti-labs/jsend

    // status: (success or failure)
    // message: 
    // data: null or json array
    public static function res($status="success",$message=null,$data=null){
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }
}
