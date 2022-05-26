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
if(isset($_POST['create'])) {
        if (strlen($_POST['tienda']) >= 1 && strlen($_POST['type']) >= 1) {
            $nombretienda=$_POST['tienda'];
            $typeplan=$_POST['type'];
            $iduser = idusuari($usuari,$db);
            
            //insert de los campos a la taula shop :)
            newshop($nombretienda,$typeplan,$iduser,$db);
            
            $idshop = getidshop($iduser,$db);
            $db_name=$nombretienda;
            $db_user=$usuari;
            $db_passwd=generaPass();
            //hash de la pass

            sentenciasSQL($db_name,$db_user,$db_passwd,$db);
            //insert tabla clients de los campos
            insertclients($idshop,$db_name,$db_user,$db_passwd,$db);

            //exec("./creaciowordpress.sh '$db_name' '$db_user' '$db_passwd'");
            if($typeplan=='Pro'){
                //exec("./creacioftp.sh '$db_user' '$db_passwd'");
            }
            header("Location:../home.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Eternal</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
            <a href="../home.php" style="text-decoration:none"><h1>Eternal</h1></a>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="signin-form">
                <br>
                    <p class="text-white">Put the name of your store</p>
                    <br>
                    <div class="col-lg-12"><input class="input-morado" type="text" name="tienda" placeholder="Name Shop" required /></div>
                    <br>
                    <p class="text-white">Select your plan</p>
                    <br>
                    <div class="col-lg-12">
                        <select class="input-morado text-white-50" name="type">
                            <option>Pro</option>
                            <option selected>Simple</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-12"><button class="btn btn-primary" type="submit" name="create">create</button></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>