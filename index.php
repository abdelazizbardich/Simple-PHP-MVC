<?php
require_once './helpers/functions.php';
require_once './_classes/Routes.php';

$notFound = true;
require_once './routes/web.route.php';
// if no page found
if($notFound){
    require "./_classes/controller.php";
    $controller = new controller();
    $controller->view("404",array());
}