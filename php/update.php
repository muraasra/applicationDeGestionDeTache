<?php
//require "../connection.php";
require "database.php";
$id_task=$_GET['id_task'];
$db = database::connect();
class task
{

    private $name_task;
    private $hour;
    private $description;
    private $id_task;
    private $id_category;

    public function __construct($name_task, $hour, $description, $id_task, $id_category)
    {
        $this->name_task = $name_task;
        $this->hour = $hour;
        $this->description = $description;
        $this->id_task = $id_task;
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
            $db->query("INSERT INTO task (name_task, hour, description,id_user,id_category)VALUES  ('$this->name_task', '$this->hour ' , '$this->description','$this->id_user','$this->id_category' )");
            echo "Tache ajouter";
            header("location:../index.php");
            
        } else echo "Tache non ajouter.";
    }
    public function update_task()
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
        // $checkTask = $db->query("SELECT * FROM task WHERE name_task='$this->name_task' AND description='$this->description' AND id_user='$this->id_user'");
       
        // //  $count = $checkTask->fetchColumn();
        // if ($isSucces AND $checkTask->rowCount() > 0) {
        //     echo "Cette tache existe deja.";
        //     $isSucces = false;
        // }
        if ($isSucces) {
            
            $statement = $db->prepare("UPDATE task SET name_task=?,description=?,
        hour=?,id_category=? WHERE `task`.`id_task` = ?");
            $statement->execute(array($this->name_task, $this->description, $this->hour, $this->id_category , $this->id_task));
            if(!$statement->execute()){
                die("ça n'a pas marché :(");
              };
            
        } else echo "Tache non modifier.";
    }
    public function task_do()
    {
    }
    public function task_important()
    {
    }
}


if (isset($_POST['update_task'])) {

    $name_task = $_POST['name_task'];
    $description_task = $_POST['description_task'];
    //$hour = '2024-01-10 20:20:35';
    // $hour= date('y-m-d h:i:s' );
    $hour = $_POST['date_task'];
    $id_category = $_POST['id_category'];
    $task1 = new task($name_task, $hour, $description_task, $id_task, $id_category);
    $task1->update_task();
    header("location:../index.php");

}

$view_task = $db->prepare('SELECT * FROM task WHERE id_task =? ' );
$view_task->execute(array($id_task));
$view_task_any = $view_task->fetch();
    $view_category = $db->query('SELECT * FROM categories WHERE id_category= ' .$view_task_any['id_category'] );
      $view_any_category=$view_category->fetch(); 

      $name_task=$view_task_any['name_task'];
      $hour = $view_task_any['hour'];
      $description = $view_task_any['description'];
      $id_category = $view_any_category['id_category'];
      $name_category = $view_any_category['name_category'];;
      
    


      


















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
   
    <title>Todo_list_update_task</title>
</head>

<body style="font-family: 'sedan';">

    
    <form method="POST" action="">
       <h1>Modifier une tache</h1> 
       <input type="text" name="name_task" placeholder="Nom de la tache"  value = " <?php echo $name_task  ; ?>"><br>
        <select class="form-control" id="category" name="id_category"  value = " <?php echo $id_category  ; ?>">
            <?php
            $db = Database::connect();
           
            foreach ($db->query('SELECT*FROM categories') as $row) {
                if ($row['id_category'] == $id_category)
                    echo '<option selected="selected" value="' . $row['id_category'] . '">' . $row['name_category'] .
                        '</option>';
                else
                    echo '<option  value="' . $row['id_category'] . '">' . $row['name_category'] .
                        '</option>';
            }
            ?>
        </select><br>
        <input id="description_task" name="description_task" placeholder="Entrez la description de votre tache" value = " <?php echo  $description; ?>" ><br>
            <input type="DATE"  name="date_task" placeholder = "Date et heure"  value = " <?php echo $hour  ; ?>" id="date_task"><br>
        <button type="submit" name="update_task">Modifier</button>
    </form>

</body>

</html>