<?php

function getAlumno($d) {
  require 'main.php';
  $dato = json_decode($d);
  $query ="SELECT * FROM estudiante WHERE id =:id;";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("id", $dato->id);
    $st->execute();
    $result = $st->fetchAll(PDO::FETCH_OBJ);
    $con = null;
    echo  json_encode($result);
    $datos =json_encode($result);
  } catch(PDOException $err) {
    echo '{"error":{"ERROR":'. $err->getMessage() .'}}';
  }
}

function delAlumno($d) {
  require 'main.php';
  $dato = json_decode($d);
  $query ="DELETE FROM estudiante WHERE id =:id;";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("id", $dato->id);
    $st->execute();
    $con = null;
  } catch(PDOException $err) {
    echo '{"error":{"ERROR":'. $err->getMessage() .'}}';
  }
}

function postAl($body){
  require 'main.php';
  echo "model".$body;
  $d = json_decode($body);
  $query = "INSERT INTO
  estudiante
  (num_ctrl,nombre,a_paterno,a_materno,telefono,promedio)
  VALUES
  (:num_control,:nombre,:paterno,:materno,:telefono,:promedio)";
  try {
   $con = Connection();
   $st = $con->prepare($query);
   $st -> bindParam("num_control",$d->num_control);
   $st -> bindParam("nombre",$d->nombre);
   $st -> bindParam("paterno",$d->paterno);
   $st -> bindParam("materno",$d->materno);
   $st -> bindParam("telefono",$d->telefono);
   $st -> bindParam("promedio",$d->promedio);
   $st->execute();
   $con = null;
 } catch(PDOException $e) {
  echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}
?>