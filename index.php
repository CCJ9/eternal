<?php
    if(isset($_COOKIE["PHPSESSID"])){
        session_start();
        if(isset($_SESSION["username"])){
            $usuari = $_SESSION['username'];
            header("Location:../home.php");
        }
    }
    require_once("./lib/conectadb.php");
    require_once("./lib/funciones.php");
    $cantitatShops=countShops($db);
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
                <br>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#prices">Prices</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="./lib/login.php">Login</a></li>
                        <!-- link a una pagina donde explicamos quienes somos que ofrecemos... -->
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
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Make your company better.</h2>
                        <a href="#about"><img class="rocket" src="./assets/img/rocket.png" alt="rocket"></a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <p id="about"></p>
        <br>
        <section class="about-section text-center">
            <div class="container px-5 px-lg-6 sectionindex">
                <div class="row gx-4 gx-lg-6 justify-content-center">
                <h1 class='text-white mb-5'>About us</h1>
                <h3 class='text-white mb-5'><em class='text-em2'>Eternal</em> is a project that consists of hosting and creating websites in <em class='text-em2'>wordpress</em>. 
                Specifically it is based on implementing, optimizing and securing the services that are used every day to run a website.
                The name was an inspiration from the word eternal, the literal meaning is that it has <em class='text-em2'>no end</em>, for us it is a word that means commitment and constancy, 
                something very important for a business.
                </h3>
                <img class ="logo" src="./assets/img/logo.gif" alt="logo">
                <?php
                if($cantitatShops>0){
                    echo "<h3 class='text-white mb-5'>We have <em class='text-em2'>$cantitatShops shop</em> already, what are you waiting for joining us?</h3>";
                }
                ?>
                </div>
                <br>
            </div>
        </section>
        <section class="about-section text-center" id="prices">
            <div class="container px-5 px-lg-6 sectionindex">
                <div class="row gx-4 gx-lg-6 justify-content-center">
                <h3 class="text-white mb-5">Choose your plan and start creating an online store</h3>
                    <div class="col-lg-6">
                        <table class="text-white text-center align-items-center table">
                            <tr>
                              <th></th>
                              <th>Simple</th>
                              <th>Pro</th>
                            </tr>
                            <tr>
                              <td>Simple configuration</td>
                              <td>✔</td>
                              <td>✔</td>
                            </tr>
                            <tr>
                              <td>Advanced configuration</td>
                              <td>✖</td>
                              <td>✔</td>
                            </tr>
                            <tr>
                                <td>FTP</td>
                                <td>✖</td>
                                <td>✔</td>
                            </tr>
                            <tr>
                                <td>24/7 Support</td>
                                <td>✖</td>
                                <td>✔</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-white"><a class='btn btn-primary' href='./lib/login.php'>Free</a></td>
                                <td class="text-white"><a class='btn btn-primary' href='./lib/login.php'>50€</a></td>
                            </tr>
                          </table>
                          <br>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/bg-masthead.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Example page</h4>
                            <p class="text-black-50 mb-0">Quick sample of how your website will look</p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-01.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">You can create your products</h4>
                                    <!-- <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p> -->
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="assets/img/demo-image-02.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">You can sell your products</h4>
                                    <!-- <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p> -->
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Eternal 2022</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
