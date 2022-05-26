<?php
    require_once("./lib/conectadb.php");
    require_once("./lib/funciones.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_start();
        if(isset($_SESSION["username"])){
            $usuari = $_SESSION['username'];
            $iduser = idusuari($usuari,$db);
            $shopcreat=shopcreat($iduser,$db);
            if($shopcreat!=0){
                $request=deleteRequest($usuari,$db);
            }
        }
    }
    else{
        header("Location:./index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eternal</title>
        <link rel="icon" type="image/x-icon" href="./assets/img/logo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Eternal</a>
                <div id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if ($usuari=="admin")
                         {
                            echo "<li class='nav-item'><a class='nav-link' href='./lib/presentacio.php'>Presentacio</a></li>";
                         }
                        
                        ?>
                        <li class="nav-item"><a class="nav-link" href="./lib/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Eternal</h1>
                        <br>
                        <?php
                            if ($usuari=="admin")
                            {
                                echo "<br><a class='btn btn-primary' href='./lib/adminpanel.php'>Admin Panel</a>";
                            }
                            else{
                                if($shopcreat!=0 && $request!=1){
                                    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5'>Acces to your control panel and manage your website.</h2>";
                                    echo "<a class='btn btn-primary' href='./lib/cpanel.php'>Cpanel</a>";
                                }
                                elseif($shopcreat<1){
                                    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5'>Create your shop and start with your website.</h2>";
                                    echo "<a class='btn btn-primary' href='./lib/addshop.php'>Add site</a>";
                                }
                                elseif($request=1){
                                    echo "<h2 class='text-white-50 mx-auto mt-2 mb-5'>Request done, now wait for us to delete your page, once it is deleted, you will be able to create another one</h2>";
                                }
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </header>
        
     </body>
 </html>