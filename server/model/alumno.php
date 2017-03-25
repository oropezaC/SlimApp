<?php
require 'main.php';

function alumnos() {
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
}

function addstudents(){
  $req = \Slim\Slim::getInstance()->request();
  $d = json_decode($req->getBody());
  $query = "INSERT INTO
  estudiante
  (num_ctrl,nombre,a_paterno,a_materno,telefono,promedio)
  VALUES
  (:num_control,:nombre,:paterno,:materno,:telefono,:promedio);";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("num_control",   $d->num_control);
    $st->bindParam("nombre", $d->nombre);
    $st->bindParam("paterno",   $d->paterno);
    $st->bindParam("materno", $d->materno);
    $st->bindParam("telefono",   $d->telefono);
    $st->bindParam("promedio", $d->promedio);
    $st->execute();
    $con = null;
  } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
  }
}


?>