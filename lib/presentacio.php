<?php
    require_once("./conectadb.php");
    require_once("./funciones.php");
    if(isset($_COOKIE["PHPSESSID"])){
        session_start();
        if(isset($_SESSION["username"]) && $_SESSION["username"] =="admin"){
            $usuari = $_SESSION['username'];          
        }
        else{
            header("Location:../index.php");
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
                        <h1 class='mx-auto my-0 text-uppercase text-white-50'><em>Presentació</em></h1>
        </div>
        </div>
    </header>
    <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="../assets/img/team.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Eternal Team</h4>
                            <p class="text-black-50 mb-0">Somos un grupo de 4 alumnos de ASIX que hemos estado trabajando en este proyecto llamado Eternal</p>
                        </div>
                    </div>
                </div>
                
                <!-- en que se basa nuestro proyecto-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img/wordpress.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Nuestro proyecto se basa en el hosting de web especialmente de Wordprees</h4>
                                    <!-- <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p> -->
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Infrastructura-->
                <h1 class="text-center"><em>Infraestructura</em></h1>
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img/infrastructura.PNG" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Nuestra Red está gestionada por <em>1 servidor</em> y <em>1 firewall</em></h4>
                                    <p class="text-white">Nuestro servidor contiene un Proxmox con dos maquinas y nuestro firewall gestiona nuestro DNS (resolucion de nombres), la VPN y todo lo que viene a ser la seguridad de la Red</p>
                                    <!-- <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p> -->
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tecnologies-->
                <br>
                <h1 class="text-center"><em>Tecnologias</em></h1>
                <h3 class="text-center">Las tecnologias que hemos usado durante el Proyecto</h3>
                <br>
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img/frontybackend.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Web</h4>
                                    <p class="text-white">Hecho a mano tanto el Frontend(<em>html, css</em>) como el Backend(<em>php, mariadb</em>) con el programa <em>Visual Studio Code</em></p>
                                    <!-- <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p> -->
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img/proxmoxpj.png" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Proxmox</h4>
                                    <p class="text-white">En el Proxmox tenemos dos maquinas, una contiene el Servidor Web(<em>Apache</em>) y FTP y la otra contiene la Base de Datos(<em>mariaDB, phpmyAdmin</em>)</p>
                                    <!-- <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p> -->
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img/pfsense.png" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Pfsens</h4>
                                    <p class="text-white">Nuestro firewall firewall en el cual tenemos nuestro <em>DNS</em>, la <em>VPN</em>  y todo lo que viene a ser la <em>seguridad de la Red</em></p>
                                    <!-- <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p> -->
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </body>
 </html>