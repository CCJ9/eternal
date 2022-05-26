<?php
require_once("./conectadb.php");
require_once("./funciones.php");
if(isset($_COOKIE["PHPSESSID"])){
    session_start();
    if(isset($_SESSION["username"])){
        $usuari=$_SESSION['username'];
    }
}
else{
    header("Location:../index.php");
}

if(isset($_POST['delete-request'])) {
    $update = "UPDATE clients set elimina_db='1' WHERE user_db=:user";
    $update2 = $db->prepare($update);
    $update2->execute(array(':user' => $usuari));
        
    if($update2){
        header("Location:../home.php");
    }
}
else{
    header("Location:../home.php");
}
