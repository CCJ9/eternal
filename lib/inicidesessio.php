<?php
    require_once("./conectadb.php");
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
       //consulta que miri si existeix l'usuari
        $select = "SELECT usuari, password FROM user WHERE usuari = :usuario";
        $selectlogin = $db->prepare($select);
        $selectlogin->execute(array(':usuario' => $username));
        //var_dump($selectlogin);
        if(isset($selectlogin)){
            $existeix = false;
            foreach ($selectlogin as $fila){
                //var_dump(password_verify($password, $fila[1]));
                if($username == $fila[0] && password_verify($password, $fila[1])){
                    $existeix = true;
                    $ultimlogin = date('Y\/m\/d G:i:s');
                    $update = "update user SET lastSignIn = :a WHERE usuari = :b";
                    $preparada = $db->prepare($update);
                    $preparada->execute(array(':a' => $ultimlogin, ':b' => $username));
                    break;
                }
            }
        }
        if($existeix == true){
            session_start();
            $_SESSION['username'] = $username;
            header("Location:../home.php");
        }
        else{
            header("Location:./login.php?error=1");
        }
    }
    
?>