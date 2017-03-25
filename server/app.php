<?php

require '../vendor/autoload.php';
require 'route/alumno.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->get('/', function() {
            echo "Pagina de gestión API REST de mi aplicación.";
        });

 $app->get('/estudiante', function (){
 		ver();
	 }
 );

 $app->post('/addestudiante',function(){
 		add();
 	}
 );



$app->run();

?>