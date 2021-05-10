<?php

session_start();

require_once './_config/config.php';

function custom_autoloader($class) {
    $file = '_classes/' . $class . '.php';
    if(file_exists($file)) {
        require_once $file;
    }
}
require __DIR__ . '/vendor/autoload.php';
spl_autoload_register('custom_autoloader');

require_once './helpers/functions.php';

$notFound = true;
require_once './routes/web.route.php';


$url = explode('/',$_GET['url']);
if(str_contains($url[0],"api") || str_contains($url[1],"api")){
    header('content-type: application/json; charset=utf-8');
}
require_once './routes/api.route.php';

// if no page found
if($notFound){
    $controller = new controller();
    echo json_encode([
        "state" => 404,
        "msg" => "Not found!",
        "data" => []
    ]);
}