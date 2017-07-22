<?php

require 'model/alumno.php';

function postEstudentCtrl($body) {
	$addstdModel = postEstudentModel($body);
	return $addstdModel;
}

function getEstudentsCtrl(){
	$stdsModel=getEstudentsModel();
	return $stdsModel;
}

function updateEstudentCtrl($body) {
	$putstdModel = putEstudentModel($body);
	return $putstdModel;
}

function removeEstudentCtrl($id) {
	$arr = array('id' => $id);
	$d = json_encode($arr);
	$removestdModel = removeEstudentModel($d);
	return $removestdModel;
}

function getEstudentCtrl($id) {
	$arr = array('id' => $id);
	$d = json_encode($arr);
	$stdModel=getEstudentModel($d);
	return $stdModel;
}

?>