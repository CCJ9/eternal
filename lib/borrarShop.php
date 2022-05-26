<?php
require_once("./conectadb.php");
require_once("./funciones.php");
if(isset($_COOKIE["PHPSESSID"])){
    session_start();
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin"){
        $usuari=$_SESSION['username'];
    }
}
else{
    header("Location:../index.php");
}

if(isset($_POST['delete'])) {
        $shop=$_POST['shop'];
        
        deleteShop($shop,$db);

        //exec("./eliminarshop.sh '$shop'");


        header("Location:adminpanel.php");
    }
?>