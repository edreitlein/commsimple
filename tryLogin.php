<!-- the form login.php will send to.

-->
<?php include "./databaseInit.php" ?> <!-- initializes database from file for better code sustainability -->
<?php


$users = $mysqli->query("SELECT * FROM users");

//will get username and password
session_destroy();
session_destroy();
session_destroy();
session_start();
if($users->num_rows>0){
    while($row=$users->fetch_assoc()){//for each result from query
        
        if($_POST["email"]==$row["email"] && $_POST["password"]==$row["password"]){
            
            
            $_SESSION["loggedIn"]=true;
            $_SESSION["email"]=$row["email"];
            $_SESSION["firstName"]=$row["firstName"];
            $_SESSION["lastName"]=$row["lastName"];

            header('Location: ./createUserBackend.php');
            
        }
        
    }
    if(!(isset($_SESSION["loggedIn"])) || $_SESSION["loggedIn"]==false){//if someone tries to access this page directly they get redirected
        $_SESSION["loggedIn"]=false;

        header('Location: ./login.php');
    }
}




$mysqli->close();

?>