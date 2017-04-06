<?php

$app->get('/hello',function($request,$response){
	require 'model/main.php';
	$query ="select * from estudiante;";
	try {
		$con = Connection();
		$st = $con->query($query);


		$result = $st->fetchAll(PDO::FETCH_OBJ);
		$con = null;
		echo  json_encode($result);
		$dato =json_encode($result);
	} catch(PDOException $err) {
		echo '{"error":{"ERROR":'. $err->getMessage() .'}}';
	}
});


$app->get('/hello/{id}',function($request,$response){
	require 'controller/alumno.php';		
	$id=$request->getAttribute('id');
	getA($id);
});

$app->post('/addestudiante',function($request,$response){
 	require 'controller/alumno.php';
 	$body = $request->getBody();
 	postA($body);
 });


$app->delete('/delestudiante/{id}',function($request,$response,$params){
	require 'controller/alumno.php';
	$id=$request->getAttribute('id');
	delA($id);
	// $id=$params['control'];
	// print_r($id);
	// $query ="delete from estudiante where num_ctrl= $id;";
	// $result = $mysqli->query($query);
	return ($response);
});


?>