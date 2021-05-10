<?php
use Firebase\JWT\JWT;
// Compare route with given url and method
function CompareUrl(string $url,string $Route,string $method){
    if($url != '/'){$url = rtrim($url,"/");}
    $fetshedUrlData = fetshUrlRoute($url,$Route);
    if($fetshedUrlData['state'] == 1){
        if($_SERVER['REQUEST_METHOD'] == $method){
            return array(
                "state" => 1,
                "params" => $fetshedUrlData["params"]
            );
        }else{
            return array(
                "state" => 0,
                "params" => ""
            );
        }
    }else{
        return array(
            "state" => 0,
            "params" => ""
        );
    }
}
function fetshUrlRoute($url,$route){
    $url = explode('/',$url);
    $route = explode('/',$route);
    if(count($url) !== count($route)){
        return array(
            "state" => 0,
            "url" => "",
            "route" => "",
            "params" => ""
        );
    }
    $params = [];
    foreach($route as $key=>$param){
        if(preg_match_all("/\{\w+\}/",$param)){      
            $param = preg_match("/\w+/",$param,$newMatches);
            if($url[$key] == ""){
                return array(
                    "state" => 0,
                    "url" => "",
                    "route" => "",
                    "params" => ""
                );
            }
            $params[$newMatches[0]] = $url[$key];
            unset($url[$key]);
            unset($route[$key]);
        }elseif($url[$key] != $route[$key]){
            return array(
                "state" => 0,
                "url" => "",
                "route" => "",
                "params" => ""
            );
        }
    }
    if(join("/",$url) != join("/",$route)){
        return array(
            "state" => 0,
            "url" => "",
            "route" => "",
            "params" => ""
        );
    }
    return array(
        "state" => 1,
        "url" => $url,
        "route" => $route,
        "params" => $params
    );
}

// assets fixer
function assets($path){
    return "./views/assets/".$path;
}

// url
function url($url){
    return ABS_PATH.$url;
}
// redirection
function redirect($path){
    header('location: '.ABS_PATH.$path);
}
// generate token
function generateToken($data){
    $payload = $data;
    $jwt = JWT::encode($payload, SECRET_KEY);
    return $jwt;
}
function parceToken($token){
    try {
        $decoded = JWT::decode($token, SECRET_KEY, array('HS256'));
        return $decoded;
    } catch (\Throwable $th) {
        return false;
    }
}