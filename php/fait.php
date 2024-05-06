<?php 
require "database.php";

$db= database::connect();
$id_task=$_GET['id_task'];

$query = $db->query("UPDATE `task` SET `fait` = 1 
WHERE `task`.`id_task` = '$id_task'");
if(!$query){
    die("ça n'a pas marché :(");
  };
  header("location: ../index.php")





?>