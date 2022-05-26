<?php
    require_once("./conectadb.php");
    require_once("./funciones.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_start();
        if(isset($_SESSION["username"])){
            $usuari = $_SESSION['username'];
            $iduser = idusuari($usuari,$db);
            $idshop = getidshop($iduser,$db);
            $shopclient = getshopclient($usuari,$idshop,$db);
            $shop = $shopclient['name_shop'];
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
                        <?php
                        echo "<h1 class='mx-auto my-0 text-uppercase text-white-50'><em>$usuari</em> Control Panel</h1>";
                        ?>
                    </div>
                </div>
    </header>
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                    <?php
                        
                    // credenciales
                        echo "<div class='cpanelblanco row gx-0 mb-6 mb-lg-12 align-items-center'>";
                        echo "
                        <form method='post' name='cpanel'>
                        <table class='text-white text-center align-items-center table'>
                        <tr>
                              <th><h4 class='text-black-50 mb-0'>SHOP NAME</h4></th>
                              <th><h4 class='text-black-50 mb-0'>DATABASE USER</h4></th>
                              <th><h4 class='text-black-50 mb-0'>YOUR PASSWORD</h4></th>
                        </tr>
                        <br>";
                        echo "
                                    <td><em class='text-em2'>" . $shopclient['name_shop'] . "</em></td>
                                    
                                    <td><em class='text-em2'>" . $shopclient['user_db'] . "</em></td>
                          
                                    <td><em class='text-em2'>" . $shopclient['password'] . "</em></td>";
                               
                        echo "
                        </table>
                        </form>";
                        echo "</div>";
                        echo "<br>";
                        echo "<br>";
                        echo "<h1 class='mx-auto my-0 text-uppercase text-white-50'>Tutorial for setup your shop</h1>";
                        echo "<br>";
                        echo "<br>";
                        // pdf i videos
                        echo "<div class='row gx-0 mb-6 mb-lg-12 align-items-center'>";
                        echo "<div class='col-xl-6 col-lg-6'>";
                        echo "<div class='text-white text-center align-items-center'>";
                        echo "<h1 class='text-white-50'>Pdf</h1>";   
                        echo "<embed src='../assets/Eternal_User_Guide.pdf' type='application/pdf' width='560' height='315' />";
                        echo "<br>";
                        echo "<br>";
                        echo "</div>";  
                        echo "</div>";
                        echo "<div class='col-xl-6 col-lg-6'>";
                        echo "<div class='text-white text-center align-items-center'>";
                        echo "<h1 class='text-white-50'>Video</h1>";
                        echo "<iframe width='560' height='315' src='../assets/exemple.mp4' title='YouTube video player' frameborder='0 allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";      
                        echo "<br>";
                        echo "<br>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='cpanelblanco row gx-0 mb-6 mb-lg-12 align-items-center'>";
                        // go wordpress
                        echo "
                        <form method='post' action='deleterequest.php' name='delete-request'>
                        <table class='text-white text-center align-items-center table'>
                        <tr>
                              <th><h4 class='text-black-50 mb-0'>Acces to your shop</h4></th>
                              <th><h4 class='text-black-50 mb-0'>Delete request</h4></th>
                        </tr>
                        <td><a class='btn btn-primary' href='../".$shop."' >Start</a></td>
                        <td><button class='btn btn-red' type='submit' name='delete-request' value='delete-request'>Request</button></td>
                        <br>
                        </table>
                        </form>
                        </div>";
                    ?>
                    <br>
                    </div>
                </div>
            </div>
            <br>
     </body>
 </html>