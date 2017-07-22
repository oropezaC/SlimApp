<?php

// use \Psr\Http\Message\ServerRequestInterface as request;
// use \Psr\Http\Message\ResponseInterface as response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require 'route/alumno.php';


$app->run();

?>