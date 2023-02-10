<?php

include "konekcija.php";
require "model/korisnik.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $korisnik = new Korisnik(1, $username, $password);
    $admin = Korisnik::login($korisnik, $conn);

    if($admin->num_rows==1){
        $_SESSION['admin'] = $korisnik->username;
        setcookie("admin", $username, time() + 3600);
        header('Location: index.php');
        exit();
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Losi kredencijali, pokusajte ponovo."); } 
              </script>'; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Biospajz prodavnica</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="css/bootstrap.css" rel="stylesheet">

</head>

<body class="cssLogin">
    <div class="login-form" style="background-color:#27171e; margin-left:200px; margin-right:200px;padding-top:100px; margin-top:50px;padding-bottom:200px; opacity:90%">
        <div class="main-div">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="">
                <br><br><br><br>
                <br>
                <div class="container" style="width: 30%; margin: auto;">
                    <br>

                    <label style="color:white; font-size:20px; font-weight:bold" for="username">Korsnicko ime:</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>

                    <label style="color:white; font-size:20px; font-weight:bold"for="password">Lozinka:</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>

                    <button type="submit" class="btn btn-primary" style="background-color:#7b9d70; width: 80%; margin-left: 10%; margin-top:5%; border: 1px #80da62;font-size:20px; font-weight:bold" 
                    name="submit"> Uloguj se</button>
                    <br><br>
                </div>
            </form>
        </div>
    </div>

    <br>

</body>
</html>