<?php
require "php/database.php";

class user
{
    private $name_user;
    private $email;
    private $password;

    public function __construct($name_user, $email, $password)
    {

        $this->name_user = $name_user;
        $this->email = $email;
        $this->password = $password;
    }
    public function signin()
    {
        $db = database::connect();
        $passwordError2 = $emailError = $passwordError = "";

        $isSucces = true;




        $checkUserAlreadyExit = $db->query("SELECT * FROM user WHERE name_user = '$this->name_user' ");
        if ($checkUserAlreadyExit->rowCount() > 0) {
            $isSucces = false;
            echo "Ce nom exxiste deja. ";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "L'email saisie n'est pas valide. ";
            $isSucces = false;
        }
        if (strlen($this->password) > 0 and strlen($this->password) < 8) {
            echo "Le mot de passe est court. ";
            $isSucces = false;
        } elseif (preg_match("/^[0-9 ]+$/", $this->password)) {
            echo "Le mot de passe ne doit pas contenir unique des chiffre. ";
            $isSucces = false;
        } elseif (empty($this->password)) {
            echo "Le mot de passe ne peut pas etre vide. ";
            $isSucces = false;
        }


        if ($isSucces) {
            $db->query("INSERT INTO user (name_user, email, password)VALUES  ('$this->name_user', '$this->email ' , '$this->password' )");
            echo "Inscription reussie";
        } else echo "Inscription echoue.";
    }
    public function login()
    {
        $db = database::connect();
        $checkUser = $db->query("SELECT * FROM user WHERE name_user = '$this->name_user' AND password ='$this->password' ");
        if ($checkUser->rowCount() > 0) {
            // while ($user = $checkUser->fetch()) {
            //     echo $user['id_user'];
            //     echo $user['name_user'];
            //     echo $user['email'];
            //     echo $user['password'];
            // }
            echo "Connexion reussie pour ";
            $redirect = $checkUser->fetch()['id_user'];
            session_start();
            
            $_SESSION['id_user']=$redirect;
           
            header("location:index.php");
            exit;
        } else echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}
if (isset($_POST['register'])) {


    $name_user = $_POST['name_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user2 = new user($name_user, $email, $password);
    $user2->signin();
}



if (isset($_POST['login'])) {
    $name_user = $_POST['name_user'];
    $password = $_POST['password'];
    $email = " ";
    $user2 = new user($name_user, $email, $password);
    $user2->login();
}

$db = database::disconnect();






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
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan:ital@0;1&display=swap" rel="stylesheet">  
    
    <title>Todo_list_connection</title>
</head>

<body Class="bodyConnection">
<div class="container" style="font-family: 'sedan';">

    <form method="POST" action="" id="signin" >
    <h2>Inscription</h2>
   
        <input type="text" name="name_user" placeholder="Nom d'utilisateur"><br><br>
        <input type="email" name="email" placeholder="Adresse e-mail"><br>
        <?php echo ' <span class="error"> ' .  '  </span> <br>' ?>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <?php echo '<span class="error">' . '  </span>' ?><br>

        <button type="submit" name="register">S'inscrire</button>
        <br><a href="#login" id="loginLink">Se connecter</a>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form method="POST" action="" id="login">
        <h2>Connexion</h2>
    
        <?php echo '<span class="error">' .  '  </span>' ?><br>

        <input type="text" name="name_user" placeholder="Nom d'utilisateur"><br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <button type="submit" name="login">Se connecter</button>
        <br><a href="#signin" id="signupLink">Créer un compte</a>
    </form>
</div>
</body>

</body>
<script src="javascrip/jquery-3.7.1.min (1).js"></script>
<script src="javascrip/scrip.js"></script>



</html>

