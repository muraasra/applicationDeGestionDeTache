<?php
//require "../connection.php";
session_start();
$id_user = $_SESSION['id_user'];
require "database.php";
$db = database::connect();
class task
{

    private $name_task;
    private $hour;
    private $description;
    private $id_user;
    private $id_category;

    public function __construct($name_task, $hour, $description, $id_user, $id_category)
    {
        $this->name_task = $name_task;
        $this->hour = $hour;
        $this->description = $description;
        $this->id_user = $id_user;
        $this->id_category = $id_category;
    }
    public function create_task()
    {
        $db = database::connect();


        $isSucces = true;

        if (empty($this->name_task)) {
            echo "Le nom de tache ne peut pas etre vide. ";
            $isSucces = false;
        }
        if (empty($this->description)) {
            echo "La description de la tache ne peut pas etre vide. ";
            $isSucces = false;
        }
        $checkTask = $db->query("SELECT * FROM task WHERE name_task='$this->name_task' AND description='$this->description' AND id_user='$this->id_user'");
       
        //  $count = $checkTask->fetchColumn();
        if ($isSucces AND $checkTask->rowCount() > 0) {
            echo "Cette tache existe deja.";
            $isSucces = false;
        }
        if ($isSucces) {
            $query=$db->query("INSERT INTO task (name_task, hour, description,id_user,id_category)VALUES  ('$this->name_task', '$this->hour ' , '$this->description','$this->id_user','$this->id_category' )");
            if(!$query){
                die("ça n'a pas marché :(");
              };
            echo "Tache ajouter";
            header("location:../index.php?id_user=" . $this->id_user);
            
        } else echo "Tache non ajouter.";
    }
    public function view_task()
    {
    }
    public function task_do()
    {
    }
    public function task_important()
    {
    }
}


if (isset($_POST['create_task'])) {

    $name_task = $_POST['name_task'];
    $description_task = $_POST['description_task'];
    // $hour = '2024-01-10 20:20:35';
    // $hour= date('y-m-d' );
    $hour = $_POST['date_task'];
    $id_user = $_SESSION['id_user'];

    $id_category = $_POST['id_category'];
    $task1 = new task($name_task, $hour, $description_task, $id_user, $id_category);
    $task1->create_task();
}























?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../javascrip/scrip.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan:ital@0;1&display=swap" rel="stylesheet">  
   
    <title>Todo_list_create_task</title>
</head>

<body style="font-family: 'sedan';">

    <form method="POST" action="">
    <h1>Creer une tache</h1>
        <input type="text" name="name_task" placeholder="Nom de la tache"><br>
        <select class="form-control" id="category" name="id_category">
            <?php
            $db = Database::connect();
            foreach ($db->query('SELECT*FROM categories') as $row) {
                echo '<option value="' . $row['id_category'] . '">' . $row['name_category'] .
                    '</option>';
            }
            ?>
        </select><br>
        <textarea id="description_task" name="description_task" placeholder="Entrez la description de votre tache"></textarea><br>
            <input type="DATE" type="TIME" name="date_task" placeholder = "Date et heure" id="date_task"><br>
        <button type="submit" name="create_task">Creer une tache</button>
    </form>

</body>

</html>