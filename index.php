<?php
include 'konekcija.php';
include 'model/proizvod.php';
include 'model/kategorija.php';

session_start();

$user="";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
if (isset($_COOKIE["admin"]))
    {
        $user=$_COOKIE["admin"];
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biospajz</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="stranica" style=" 
background-image:url(https://img.freepik.com/premium-photo/healthy-food-background-concept-healthy-food-fresh-vegetables-nuts-fruits-stone-background-top-view-copy-space_187166-25394.jpg); background-repeat: repeat; background-size:cover; position:absolute" >
   
    <nav class="navbar navbar-expand-lg navbar-light" id="navCont" style="height:100px; ">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav p-lg-0 " style="margin-left: 2%; margin-top:10px;   ">
                    <li><a id="btn-Pocetna" href="index.php" type="button" class="btn btn-success btn-block" >
                        Pocetna</a></li>
                    <li><a id="btn-Dodaj" type="button" class="btn btn-success btn-block"  data-toggle="modal" data-target="#my" >
                        Nov proizvod </a></li>
                    <li><a id="btn-Prikazi" href="prikaziProizvode.php" type="button" class="btn btn-success btn-block">
                        Svi proizvodi</a></li>
                    <li><a id="btn-Pocetna" href="odjava.php" type="button" class="btn btn-success btn-block" >
                    Odjavi se</a> </li>
                    <li> <h1 class="navbar-brand " style="color:#5f7745 ; font-weight:bold; font-size:30px; margin-top:-70px; margin-left: 900px; text-decoration:underline">
                    Biospajz prodavnica</h1></li>
                </div>
            </div>
    </nav>

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                <h2 style="color:white ; background-color:#7b9d70; padding:15px; border-radius:25px;margin-bottom:60px"> Dobrodošli u Bio Špajz zdrava hrana.</h2>
                    <div class="slikeKontejner">
                    <img src="https://cdn.shopaccino.com/refresh/articles/asdada-333588_l.jpg" alt="pocetna" class="img img-circle">
                    <img src="https://parade.com/.image/t_share/MTkwNTgxMjkxNjk3NTc5OTAw/istock-1203599963-jpg.jpg" alt="pocetna" class="img img-circle">
                    <img src="https://n1info.rs/wp-content/uploads/2020/02/mixed-1938302-960-720-301358.jpeg" alt="pocetna" class="img img-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt" style="margin-top:40px; margin-bottom: 300px; ">
    <div id="searchDiv" >
        <label for="pretraga"style="color:#7b9d70 ;font-weight:400px ;font-size:22px; padding-bottom:20px">Pretraga proizvoda na osnovu kategorije</label>
        <select id="pretraga" onchange="pretraga()" class="form-control" style=" font-size:20px ;" >
            <?php
            $rez = $conn->query("SELECT * from kategorija");

            while ($red = $rez->fetch_assoc()) {
            ?>
                <option 
                value="<?php echo $red['kategorijaId'] ?>"> <?php echo $red['imeKategorije'] ?></option>
            <?php   }
            ?>
        </select>
    </div>

    <div id="podaciPretraga"style="font-size:18px ; margin-top:-80px" ></div>
    </div>



    <script>
        function pretraga() {
            $.ajax({
                url: "handler/pretragaProizvoda.php",
                data: {
                    kategorijaId: $("#pretraga").val()
                },
                success: function(html) {
                    $("#podaciPretraga").html(html);
                }
            })
        }
    </script>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>




   