<?php
    require_once("./conectadb.php");
    require_once("./funciones.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_start();
        if(isset($_SESSION["username"]) && $_SESSION["username"] =="admin"){
            $usuari = $_SESSION['username'];          
        }
    }
    else{
        header("Location:../index.php");
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
        <link rel="icon" type="image/x-icon" href="../assets/img/logo.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <header class="mastheadv2">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../home.php">Eternal</a>
                <div id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class='mx-auto my-0 text-uppercase text-white-50'><em>Admin</em> Panel</h1>
                    </div>
                </div>
    </header>
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center cpanelblanco col-12">
                    <?php
                    $cantitatShops=countShops($db);
                    $iduser=idusuari($usuari,$db);

                        $name_shop=getShop($db);
                        if($cantitatShops==0){
                             echo "<h4 class='text-black-50 mb-0'>Theres no shops right now</h4>";
                        }
                        else {
                                echo "<table class='text-white text-center align-items-center table'>
                                    <tr>
                                    <th><h4 class='text-black-50 mb-0'>USER</h4></th>
                                        <th><h4 class='text-black-50 mb-0'>SHOP</h4></th>
                                        <th><h4 class='text-black-50 mb-0'>DELETE</h4></th>
                                    </tr>";
                            for ($i=0; $i<$cantitatShops; $i++){
                                $shop = $name_shop->fetch(PDO::FETCH_ASSOC);
                                $name_shop2 = $shop['name_shop'];
                                $userdb = $shop['user_db'];
                                $request=deleteRequest2($name_shop2,$db);
                                echo "
                                <form method='post' action='borrarShop.php' name='delete-form'>";
                                    if($request==1){
                                        echo "
                                        <tr class='background-yellow'>
                                            <td><em class='text-em'>". $userdb ."</em></td>
                                            <td><em class='text-em'>". $name_shop2 ."</em></td>
                                            <td><button class='trashbutton' type='submit' name='delete' value='delete'><img class='trash' src='../assets/img/trash.png' alt='basura'></button></td>
                                        </tr>
                                        <input type='hidden' name='shop' value='". $name_shop2 ."'/>";
                                    }
                                    else{
                                        echo "
                                        <tr>
                                            <td><em class='text-em'>". $userdb ."</em></td>
                                            <td><em class='text-em'>". $name_shop2 ."</em></td>
                                            <td><button class='trashbutton' type='submit' name='delete' value='delete'><img class='trash' src='../assets/img/trash.png' alt='basura'></button></td>
                                        </tr>
                                        <input type='hidden' name='shop' value='". $name_shop2 ."'/>";
                                    }
                                    
                                    echo "</form>";
                            }
                                echo "</table>";
                        }
                        
                    ?>
                    </div>
                </div>
            </div>
    </body>
 </html>