<?php

$conn = require 'main.php';

function postEstudentModel($body){
  $d = json_decode($body);
  $query = "INSERT INTO
  estudiante
  (num_ctrl,nombre,a_paterno,a_materno,telefono,promedio,id_carrera)
  VALUES
  (:num_ctrl,:nombre,:a_paterno,:a_materno,:telefono,:promedio,:id_carrera)";

  try {
   $con = Connection();
   $st = $con->prepare($query);
   $st -> bindParam("num_ctrl",$d->num_ctrl);
   $st -> bindParam("nombre",$d->nombre);
   $st -> bindParam("a_paterno",$d->a_paterno);
   $st -> bindParam("a_materno",$d->a_materno);
   $st -> bindParam("telefono",$d->telefono);
   $st -> bindParam("promedio",$d->promedio);
   $st -> bindParam("id_carrera",$d->id_carrera);
   $st -> execute();
   $con = null;
  return "Insercion Correcta";
  } catch(PDOException $e) {
  return '{"error":{"text":'. $e->getMessage() .'}}';
  }
}

function getEstudentsModel() {
  $query = "SELECT * FROM estudiante";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->execute();
    $result = $st->fetchAll(PDO::FETCH_OBJ);
    $con = null;
    return $datos = json_encode($result);
  } catch(PDOException $err) {
   return '{"error":{"ERROR":'. $err->getMessage() .'}}';
 }
}

function putEstudentModel($body){
  $d = json_decode($body);
  $query = "UPDATE 
  estudiante
  SET
     num_ctrl = :num_ctrl, nombre = :nombre, a_paterno = :a_paterno
    ,a_materno = :a_materno, telefono = :telefono, promedio = :promedio
    ,fecha_registro =now() ,id_carrera = :id_carrera
  WHERE
    id = :id;";
  try {
   $con = Connection();
   $st = $con->prepare($query);
   $st -> bindParam("id",$d->id);
   $st -> bindParam("num_ctrl",$d->num_ctrl);
   $st -> bindParam("nombre",$d->nombre);
   $st -> bindParam("a_paterno",$d->a_paterno);
   $st -> bindParam("a_materno",$d->a_materno);
   $st -> bindParam("telefono",$d->telefono);
   $st -> bindParam("promedio",$d->promedio);
   $st -> bindParam("id_carrera",$d->id_carrera);
   $st -> execute();
   $con = null;
  return "Actualización Correcta";
  } catch(PDOException $e) {
  return '{"error":{"text":'. $e->getMessage() .'}}';
  }
}

function removeEstudentModel($d) {
  $dato = json_decode($d);
  $query = "DELETE FROM estudiante WHERE id = :id;";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("id", $dato->id);
    $st->execute();
    $con = null;
    return '{"descripcion": "Registro Eliminado"}';
  } catch(PDOException $err) {
    return '{"error":{"ERROR":'. $err->getMessage() .'}}';
  }
}

function getEstudentModel($d) {
  $dato = json_decode($d);
  $query = "SELECT * FROM estudiante WHERE id = :id;";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("id", $dato->id);
    $st->execute();
    $result = $st->fetchAll(PDO::FETCH_OBJ);
    $con = null;
    return $datos = json_encode($result);
  } catch(PDOException $err) {
    return '{"error":{"ERROR":'. $err->getMessage() .'}}';
  }
}



?>