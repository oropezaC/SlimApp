<?php
require 'model/alumno.php';

function getA($id) {
	$arr = array('id' => $id);
	$d = json_encode($arr);
	getAlumno($d);
}

function postA($body) {
	postAl($body);
}


function delA($id) {
	$arr = array('id' => $id);
	$d = json_encode($arr);
	delAlumno($d);
}


?>