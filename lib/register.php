<?php
require_once("./conectadb.php");
if(isset($_POST['register'])) {
        if (strlen($_POST['username']) >= 1 && strlen($_POST['mail']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['verifypassword']) >= 1) {
            $username = trim($_POST['username']);
            $email = trim($_POST['mail']);
            $password = trim($_POST['password']);
            $verifypass = trim($_POST['verifypassword']);
            $creationdate = date('Y\/m\/d G:i:s');
            if($password==$verifypass){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $consulta = "INSERT INTO `user`(usuari, password, email, creationdate ) VALUES (:usuario, :password, :email, :creationdate);";
                $resultat = $db->prepare($consulta);
                $resultat->execute(array(':usuario' => $username,':password' => $password, ':email' => $email, ':creationdate' => $creationdate));
                header("Location: login.php");
            }
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
            <p class="text-white">register to start using our services</p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="signin-form">
                <br>
                    <div class="col-lg-12"><input class="input-morado" type="text" name="username" placeholder="Username" pattern="[a-zA-Z0-9]+" required /></div>
                    <br>
                    <div class="col-lg-12"><input class="input-morado" type="email" name="mail" placeholder="Mail" required /></div>
                    <br>
                    <div class="col-lg-12"><input class="input-morado" type="password" name="password" placeholder="Password" required /></div>
                    <br>
                    <div class="col-lg-12"><input class="input-morado" type="password" name="verifypassword" placeholder="Verify Password" pattern="[a-zA-Z0-9]+" required /></div>
                    <br>
                    <div class="col-lg-12"><a href="./login.php" style="text-decoration:none">Do you have account already? Log In</a></div>
                    <br>
                    <div class="col-lg-12"><button class="btn btn-primary" type="submit" name="register">Sign In</button></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>