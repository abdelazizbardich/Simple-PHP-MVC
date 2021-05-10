<?php

$headers = apache_request_headers();


if(isset($headers['token']) && isset($_SESSION['email'])){
    $tokenData = parceToken($headers['token']);
    if($tokenData){
        if($_SESSION['email'] !== $tokenData->email){
            echo json_encode($responce = [
                "state" => 401,
                "msg" => "Permition denied!",
                "data" => []
            ]);
            die();
        }
    }else{
        echo json_encode($responce = [
            "state" => 401,
            "msg" => "Permition denied!",
            "data" => []
        ]);
        die();
    }
}else{
    echo json_encode($responce = [
        "state" => 401,
        "msg" => "Permition denied!",
        "data" => []
    ]);
    die();
}

