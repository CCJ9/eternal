<?php
    function idusuari($usuari,$db)
    {
        $consulta = "SELECT iduser FROM user WHERE usuari = :user";
        $iduser = $db->prepare($consulta);
        $iduser->execute(array(':user' => $usuari));
        $iduser =$iduser->fetch(PDO::FETCH_ASSOC);
        $iduser = $iduser['iduser'];
        return $iduser;
    }

    function newshop($nombretienda,$typeplan,$iduser,$db)
    {
        $inserirshop="INSERT INTO shop (name, type, iduser) VALUES (:nombretienda,:tipo,:iduser)";
        $resultat = $db->prepare($inserirshop);
        $resultat->execute(array(':nombretienda' => $nombretienda,':tipo' => $typeplan,':iduser' => $iduser));
    }

    function shopcreat($iduser,$db)
    {
        $consulta = "SELECT COUNT(*) FROM shop WHERE iduser = :id";
        $totalshop = $db->prepare($consulta);
        $totalshop->execute(array(':id' => $iduser));
        $totalshop =$totalshop->fetch(PDO::FETCH_ASSOC);
        $totalshop = $totalshop["COUNT(*)"];
        return $totalshop;
    }

    function generaPass(){
    
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@#!€%&()";
        $longitudCadena=strlen($cadena);
        $pass = "";
        $longitudPass=10;
        for($i=1 ; $i<=$longitudPass ; $i++){
            $pos=rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    
    function sentenciasSQL($db_name,$db_user,$db_passwd,$db){
        $sql = "CREATE DATABASE $db_name";
        $crearDB = $db->query($sql);
        $sql2 = "CREATE USER '$db_user'@'localhost' IDENTIFIED BY '$db_passwd'";
        $crearDBUser = $db->query($sql2);
        $sql3 = "GRANT ALL ON $db_name.* TO '$db_user'@'localhost' IDENTIFIED BY '$db_passwd'";
        $privilegiosUser = $db->query($sql3);
        $sql4= "FLUSH PRIVILEGES";
        $commit = $db->query($sql4);
    }

    function getidshop($iduser,$db)
    {
        $consulta = "SELECT idshop FROM shop WHERE iduser = :iduser";
        $idshop = $db->prepare($consulta);
        $idshop->execute(array(':iduser' => $iduser));
        $ids = $idshop->fetch(PDO::FETCH_ASSOC);
        $idshop2 = $ids['idshop'];
        return $idshop2;
    }

    function insertclients($idshop,$db_name,$db_user,$db_passwd,$db)
    {
        $inserirclient="INSERT INTO clients (idshop, name_shop, user_db, password) VALUES (:idshop,:nombretienda,:usuario,:password)";
        $resultat = $db->prepare($inserirclient);
        $resultat->execute(array(':idshop' => $idshop,':nombretienda' => $db_name,':usuario' => $db_user,':password' => $db_passwd));
    }

    function getshopclient($usuari,$idshop,$db)
    {
        $consulta = "SELECT * FROM clients WHERE idshop = :idshop and user_db = :username ";
        $shopclient = $db->prepare($consulta);
        $shopclient->execute(array(':username' => $usuari,':idshop' => $idshop));
        $shopclient = $shopclient->fetch(PDO::FETCH_ASSOC);
        return $shopclient;
    }

    function countShops($db){
        $consulta = "SELECT count(*) FROM clients";
        $cantitatShops = $db->query($consulta);
        $cantitat = $cantitatShops->fetch(PDO::FETCH_ASSOC);
        $cantitat2 = (int)$cantitat['count(*)'];
        return $cantitat2;
    }

    function getShop($db){
        $consulta = "SELECT idshop,user_db,name_shop FROM clients";
        $name_shop = $db->query($consulta);
        return $name_shop;
    }

    function deleteShop($shop,$db){
        $consulta = "DROP DATABASE $shop";
        $dropDB = $db->query($consulta);
        $consulta2 = "DELETE FROM clients WHERE name_shop = :shop";
        $dropclient = $db->prepare($consulta2);
        $dropclient->execute(array(':shop' => $shop));
        $consulta3 = "DELETE FROM shop WHERE name = :shop";
        $dropshop = $db->prepare($consulta3);
        $dropshop->execute(array(':shop' => $shop));
    }

    function deleteRequest($usuari,$db){
        $consulta = "SELECT elimina_db FROM clients WHERE user_db=:user";
        $consulta2 = $db->prepare($consulta);
        $consulta2->execute(array(':user' => $usuari));
        $request = $consulta2->fetch(PDO::FETCH_ASSOC);
        $request2 = (int)$request['elimina_db'];

        return $request2;
    }

    function deleteRequest2($name_shop2,$db){
        $consulta = "SELECT elimina_db FROM clients WHERE name_shop=:shop";
        $consulta2 = $db->prepare($consulta);
        $consulta2->execute(array(':shop' => $name_shop2));
        $request = $consulta2->fetch(PDO::FETCH_ASSOC);
        $request2 = (int)$request['elimina_db'];

        return $request2;
    }

?>