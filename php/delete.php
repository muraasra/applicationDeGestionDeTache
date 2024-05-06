<?php
require 'database.php';
session_start();
$id_user = $_SESSION['id_user'];
$id_task=$_GET['id_task'];
$db = database::connect();


$sql = "DELETE FROM `task` WHERE `task`.`id_task`= :id_task";
 
$query = $db->prepare($sql);
$query->bindParam(":id_task", $id_task);
if(!$query->execute()){
  die("ça n'a pas marché :(");
};

header("Location: ../index.php");








?>
