
<?php 
session_start();
$id_user = $_SESSION['id_user'];
$_SESSION['id_user'] = $_SESSION['null'] ; 
session_destroy();

header("location:../connection.php");


?>