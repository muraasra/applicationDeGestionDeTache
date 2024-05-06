<?php
session_start();
//require "connection.php";
require "php/database.php";
$db = database::connect();


$id_user= $_SESSION['id_user'];
// Affichage du nom dutilisation
$checkUser = $db->query("SELECT * FROM user WHERE id_user = '$id_user' ");
$user = $checkUser->fetch();



?>
<!-- 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Todo_list</title>
</head>

<body>
    <h1>modifier une tache</h1>
    


    <h1>Creer </h1>
     <?php
    
    // $db = database::connect();
    // echo '<a href="php/create_task.php?id_user=' . $id_user . '">creer une tache</a>';
    // echo '<br><br><h1>Affichage des taches</h1><br><br>';

    // $view_task = $db->query('SELECT *FROM task WHERE id_user =' . $id_user);
    // if ($view_task->rowCount() < 1) {
    //     echo " (Vous n'avez encore creer aucune tache) ";
    // } else {
    //     $view_category = $db->query('SELECT * FROM categories');
    //     $view_any_category = $view_category->fetchAll();
    //     foreach ($view_any_category as $categories) {
    //         echo '<h3> Categorie: ' . $categories['name_category'] . '</h3>';
    //         $id_category = $categories['id_category'];
    //         $view_task_by_category = $db->query('SELECT *FROM task WHERE id_category=' . $id_category . ' AND id_user =' . $id_user);

    //         if ($view_task_by_category->rowCount() < 1) {
    //             echo  '  (vide)';
    //         } else {
    //             while ($item = $view_task_by_category->fetch()) {

    //                 echo "<br>Nom:   " . $item['name_task'] ;
    //                 echo "<br>Description:   " . $item['description'];
    //                 echo "<br>Heure de creation:   " . $item['hour'];
    //             }
    //         }
    //     }
    // } 
    



    ?> 
    <br>
    <br>

</body>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">
    <script src="js/script.js"></script>
 
    <title>Accueil todo list</title>
</head>
<body>
    <nav class="sidebar ">
        <header>
            <!-- Nom de l'utilisateur  -->
          <div class="image-text ">
              <p class=" text bienvenue ">Bienvenue  </p>
              <span class="name"> <?php echo $user['name_user'] ; ?>   </span> 
              <i class='bx bx-chevron-right toggle'></i>
          </div>
          <!-- Bouton por afficher et pouser la nav bar  -->
          <span class=''></span>
        </header>
    
        <div class="menu-bar">
          <div class="menu">
    
            <li class="search-box text">
                
                <!-- <i class="glyphicon glyphicon-search"> </i> -->
              <input type="text"  placeholder="Search ...">
            </li>
    
            <ul class="menu-links">
              <li class="nav-link">
                <a href="#">
                    <!-- glyphicon de aujoud'hui -->
                  <i class=' glyphicon glyphicon-dashboard glyphiconHover'></i>
                  <span class="text nav-text">Aujourd'hui</span>
                </a>
              </li>
    
              <li class="nav-link">
                <a href="#">
                    <!-- glyphicon de a venir -->
                    <i class="glyphicon glyphicon-calendar">  </i>
                  
                  <span class="text nav-text">A venir</span>
                </a>
              </li>
    
              <li class="nav-link">
                <a href="#">
                    <!-- glyphicon de  Deja fait-->
                  <i class='glyphicon glyphicon-check '></i>
                  <span class="text nav-text">Deja fait</span>
                </a>
              </li>
    
              <li class="nav-link">
                <a href="#">
                    <!-- glyphicon de important -->
                  <i class='glyphicon glyphicon-star '></i>
                  <span class="text nav-text">Important</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="#">
                    <!-- glyphicon de important -->
                  <i class='glyphicon glyphicon-star '></i>
                  <span class="text nav-text"> 
        

                  <?php
         echo' <select class="form-control"  name="id_category">';

            $db = Database::connect();
            echo'<option >Categories </option>';
            foreach ($db->query('SELECT*FROM categories') as $row) {
                echo '<option value="' . $row['id_category'] . '">' . $row['name_category'] .
                    '</option>';
            }
            echo" </select>"
            ?>
                  </span>
                </a>
            </li>
    
            </ul>
          </div>
    
          
        </div>
    <div class="bottom-logout">
            <li class="">
              <a href="php/deconnection.php">
                <i class="glyphicon glyphicon-log-out "></i>
                <span class="text nav-text "> Logout</span>
              </a>
            </li>

          </div>
      </nav>
      <div class="welcome">

      
<header class="topup" >
        <p class="ongletTitle"> Aujourd'hui</p>
        <?php 
    $hour= date('y-m-d h:i:s' );
  
// Récupère la date actuelle
$date = new DateTime();

// Obtient le jour, le mois et l'année
$day = $date->format('d');
$dayOfWeek= $date->format('l');

$month = $date->format('m');


$year = $date->format('Y');

// Obtient le nom complet du mois (en lettres)
$monthName = $date->format('F');


                ?>
        <p class="ongletDate"> <?php echo "$dayOfWeek" . ", "  . "$day $monthName $year" ?> <span class="glyphicon glyphicon-option-horizontal option"></span> </p>
          
   <?php
         ?>
  </header>
       
    

      <?php 
      echo' <div class="listTask ">
      
      <div class="table">';
      $view_task = $db->prepare('SELECT * FROM task WHERE id_user =? ORDER BY task.hour DESC' );
      $view_task->execute(array($id_user));
      $view_task2 = $db->prepare('SELECT * FROM task WHERE id_user =? ORDER BY task.hour DESC' );
      $view_task2->execute(array($id_user));
      $view_task_any = $view_task->fetch();
      if ((int)$view_task_any < 1) {
        
          echo "  <strong> ( Vous n'avez encore creer aucune tache ) </strong>  ";
    echo " <a href='php/create_task.php?id_user=' . $id_user . '' class='glyphicon glyphicon-plus addTask'> <strong>Nouvelle Tache </strong></a>";

          
      } else {
          
          
          
          
                  while ($item =$view_task->fetch()) {
                     if (!$item['fait']==1) {
                       $view_category = $db->query('SELECT * FROM categories WHERE id_category= ' .$item['id_category'] );
                         $view_any_category=$view_category->fetch(); 
                         
                         echo'<div class=" col-xs-12 col-sm-6 col-md-4  container_task">';


                         echo'<div class="title_task">
                         <strong> '.$item["name_task"].' </strong>

                         </div>';
                         echo'<div class="category_task">
                         <p> Categorie : '.$view_any_category ["name_category"].' </p>

                         </div>';
                         echo'<div class="statut_task">
                         <p> Statut : Non-Terminer </p>

                         </div>';
                          echo'<div class="hour_task"> 
                          <p>  '.$item["hour"].' </p>
                          </div>';
                         echo'<div class="description_task">
                         <p>  '.$item["description"].' </p>
                         </div>';
                        

                         echo "<span> <a class='btn btn-success' href='php/fait.php?id_task=". $item['id_task'] . "' ><span class='glyphicon glyphicon-ok'></span></a> ";

                         echo ' <a href="php/delete.php?id_task=' . $item["id_task"] . '?id_user=' . $item["id_user"] . '" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                                </a>';
                        echo ' <a href="php/update.php?id_task=' . $item["id_task"] . '" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pencil"></span>
                                </a> </span>';

                                echo'</div>';
                   }
                  }
                  while ($item2 =$view_task2->fetch()) {
                    if (!$item2['fait']==0) {
                      $view_category = $db->query('SELECT * FROM categories WHERE id_category= ' .$item2['id_category'] );
                        $view_any_category=$view_category->fetch(); 
                        
                        echo'<div class="col-xs-12 col-sm-6 col-md-4   container_task">';


                          echo'<div class="title_task">
                          <strong> '.$item2["name_task"].' </strong>

                          </div>';
                          echo'<div class="category_task">
                          <p> Categorie : '.$view_any_category ["name_category"].' </p>

                          </div>';
                          echo'<div class="statut_task">
                          <p> Statut : Terminer </p>

                          </div>';
                          echo'<div class="description_task"> 
                          <p>'.$item2["description"].' </p>
                          </div>';
                          echo'<div class="hour_task">
                          <p> '.$item2["hour"].' </p>
                          </div>';

                           echo '<br> <a href="php/delete.php?id_task=' . $item2["id_task"] . '?id_user=' . $item2["id_user"] . '" class="btn btn-danger">
                               <span class="glyphicon glyphicon-remove"></span>
                               </a>';

                        echo'</div>';
                  }
                 }
                   


              }
    echo'</div> ';
 echo " <a href='php/create_task.php?id_user=" . $id_user . "' class='glyphicon glyphicon-plus addTask'> <strong>Nouvelle Tache </strong></a> ";

    echo'</div>';
   
            //   Les habitudes 
            // la motiaction
$db = database::disconnect();
        
      ?>
      

        
           
    
    <footer>
      <p> Tout droit reservés , ©2023–2024 by mura</p>
    </footer>
    </div>
            


    <script>
      const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle");
      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
    </script>
  


    
</body>
</html>