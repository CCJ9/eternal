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
            <br>
                <form method="post" action="inicidesessio.php" name="signin-form">
                    <div class="form-signup">
                        <label class="text-white-50 mx-auto mt-2 mb-5">Username</label>
                        <input class="input-morado" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
                    </div>
                    <div class="form-element">
                        <label class="text-white-50 mx-auto mt-2 mb-5">Password</label>
                        <input class="input-morado" type="password" name="password" required />
                    </div>
                    <div class="text-white- mb-0">
                    <?php
                    if(isset($_GET['error'])){
                        if($_GET['error']==1){
                            echo "<div class='bad'>Login incorrecto</div><br>";
                        }
                    }
                    ?>
                    <a href="./register.php" style="text-decoration:none" class="createacc">Don’t have an account yet? Sign Up</a>
                    <!--<p class="text-white-50 mb-0"><a href="./formReset.php" class="createacc">Forgot password?</a></p>-->
                    </div>
                    <br>
                    <button class="btn-primary btn text-white-50" type="submit" name="login" value="login">Log In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>