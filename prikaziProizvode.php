<?php
include 'konekcija.php';
include 'model/proizvod.php';
include 'model/kategorija.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php          
if (isset($_POST['kategorija'])) {
  $icko = $_POST['kategorija'];
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="css/bootstrap.css" rel="stylesheet">
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

    <div class="modal fade" id="my" role="dialog" >
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="align-items:center; justify-content: center;" >
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color:#7b9d70; text-align: center ">Dodaj proizvod:</h3>
                            <div class="row" >
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label style="color:#7b9d70" for="">Ime proizvoda:</label>
                                        <input type="text" style="border: 1px solid black" name="imeProizvoda" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#7b9d70"for="">Nutritivna vrednost:</label>
                                        <input type="text" style="border: 1px solid black" name="nutritivnaVrednost" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#7b9d70" for="">Cena proizvoda:</label>
                                        <input type="text" style="border: 1px solid black" name="cena" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <select id="kategorijaId" name="kategorijaId" class="form-control">
                                            <?php
                                            $rez = $conn->query("SELECT * from kategorija");
                                            while ($red = $rez->fetch_array()) {
                                            ?>
                                                <option name="value" value="<?php echo $red['kategorijaId'] ?>"> <?php echo $red['imeKategorije'] ?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: #7b9d70">
                                            Dodaj novi proizvod</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

  <!--promeni prozivod -->
<div class="modal fade" id="my1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="align-items:center; justify-content: center;">
          <div class="container prijava-form">
            <form action="#" method="post" id="izmeniForma">

              <h3 style="color:#7b9d70; text-align: center">Izmeni proizvod</h3>
              <div class="row" >
                <div class="col-md-11 ">

                  <div style="display: none;" class="form-group">
                    <label for="">proizvodId</label>
                    <input  id="proizvodId" type="text" style="border: 1px solid #90C7CA" name="proizvodId" class="form-control" />
                  </div>

                  <div class="form-group" style="display: none;">
                    <label style="color:#7b9d70;" for="">kategorijaId</label>
                    <input id="kategorijaId"  type="text" style="border: 1px solid #90C7CA" name="kategorija" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label style="color:#7b9d70;" for="">Ime proizvoda</label>
                    <input id="imeProizvoda" type="text" style="border: 1px solid #90C7CA" name="imeProizvoda" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label style="color:#7b9d70;" for="">Nutritivna vrednost</label>
                    <input id="nutritivnaVrednost" type="text" style="border: 1px solid #90C7CA" name="nutritivnaVrednost" class="form-control" />
                  </div>
                 
                  <div class="form-group">
                    <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="background-color:#7b9d70">
                    Izmeni proizvod</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>
 
  <div class="container pt">
    <?php
    $niz = [];
    $rez = $conn->query("select * from proizvodi pr join kategorija k on pr.kategorijaId=k.kategorijaId");
    while ($red = $rez->fetch_array()) {
      $kategorija = new Kategorija($red['kategorijaId'], $red['imeKategorije']);
      $proizvodi = new Proizvod($red['proizvodId'], $red['imeProizvoda'], $red['nutritivnaVrednost'],$red['cena'], $kategorija);
      array_push($niz, $proizvodi);
    }
    ?>
    <p id="p" style="color:#7b9d70; font-size:35px ;padding-top:30px; padding-bottom:10px">Svi proizvodi:</p>
    <table class="table table-hover">
      <thead style="font-weight:500px; font-size:20px; color: #7b9d70; background-color: #2f2f2f">
        <tr>
          <th>Ime proizvoda</th>
          <th>Nutritivna vrednost</th>
          <th>Cena</th>
          <th>Kategorija proizvoda</th>
          <th>Obrisi proizvod</th>
          <th>Izmeni proizvod</th>
        </tr>
      </thead>
      <tbody style="color:#7b9d70; font-size:20px ; font-weight: bold; background-color: #2f2f2f; opacity:85%">
        <?php
        foreach ($niz as $vrednost) {
        ?>
          <tr>
            <td style="display:none" data-target="kategorijaId"><?php echo $vrednost->kategorijaId->kategorijaId?></td>
            <td data-target="imeProizvoda"><?php echo $vrednost->imeProizvoda ?> </td>
            <td data-target="nutritivnaVrednost"><?php echo $vrednost->nutritivnaVrednost ?> </td>
            <td data-target="cena"><?php echo $vrednost->cena ?> </td>
            <td data-target="kategorijaId"><?php echo $vrednost->kategorijaId->imeKategorije ?></td>
            <td><button id="btnObrisi" name="btnObrisi" class="btn btn-danger" style="background-color:#6e5a42 ; color:white ; font-weight:bold; padding-top:10px; font-size:17px"
            data-id1="<?php echo $vrednost->proizvodId ?>">Obrisi</a></td>
            <td><button class="btn btn-info" data-toggle="modal" style="background-color:#7b9d70 ; color:white ; font-weight:bold; padding-top:10px; font-size:17px"
            data-target="#my1" data-id2="<?php echo $vrednost->proizvodId ?>">Izmeni</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

  </div>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    
    
</body>

</html>