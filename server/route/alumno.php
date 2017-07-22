<?php


require 'controller/alumno.php';

$app->post('/postEstudent',function($request,$response){
	$body = $request->getBody();
	$addestudentCtrl = postEstudentCtrl($body);
	return $addestudentCtrl;
});

$app->get('/getEstudents',function(){
	$studentsCtrl = getEstudentsCtrl();
	return $studentsCtrl;
});

$app->put('/updateEstudent',function($request,$response){
	$body = $request->getBody();
	$putestudentCtrl = updateEstudentCtrl($body);
	return $putestudentCtrl;
});

$app->delete('/removeEstudent/{id}',function($request,$response){
	$id = $request->getAttribute('id');
	$delestudentCtrl = removeEstudentCtrl($id);
	return $delestudentCtrl;
});

$app->get('/getEstudent/{id}',function($request,$response){
	$id = $request->getAttribute('id');
	$studentCtrl = getEstudentCtrl($id);
	return $studentCtrl;
});




?>