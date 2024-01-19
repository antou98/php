<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Factory\AppFactory;

#le auto loader nécessaire
//require '../vendor/autoload.php';

// comme =  var app = express();
$app = new \Slim\App;

$app->get("/api/test", function (Request  $request,Response  $response, array $args){
    $response->getBody()->write("succes");
    return $response->withStatus(200);
});

