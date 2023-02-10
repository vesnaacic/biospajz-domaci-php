<?php
    require '../konekcija.php';
    require '../model/kategorija.php';
    require '../model/proizvod.php';

    if(isset($_GET['kategorijaId']))
    {
        $id = mysqli_real_escape_string($conn,$_GET['kategorijaId']);
        $niz = [];

        $rez = $conn->query("select * from proizvodi where kategorijaId=$id");
        while($red=$rez->fetch_assoc()):

        $proizvodi = new Proizvod($red['proizvodId'],$red['imeProizvoda'],$red['nutritivnaVrednost'],$red['cena'],$red['kategorijaId']);
        array_push($niz,$proizvodi);
        endwhile;
    ?>

    <table class="table table-hover"  >
    <thead style="font-weight:500px ; color:#7b9d70;background-color:#2f2f2f;">
        <tr >
            <th scope="col">Proizvod</th>
            <th scope="col">Cena</th>
            <th scope="col">Nutritivna vrednost</th>
            <th scope="col">Kategorija</th>
        </tr>
    </thead>

    <tbody style=" color:#7b9d70; background-color:#2f2f2f; opacity:70%" >
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php echo "<br>"?>
        <?php
        foreach($niz as $vrednost):
            ?>
                <tr>
                <td> <?php echo $vrednost->imeProizvoda  ?></td>
              <td><?php echo $vrednost->cena ?>  </td>
              <td><?php echo $vrednost->nutritivnaVrednost ?>  </td>
              <td><?php echo $vrednost->kategorijaId ?>  </td>
                </tr>
            <?php
        endforeach;
        ?>
    </tbody>

    </table>
    <?php

    }else{
    echo("Prosledi kategoriju za proizvod.");
    }
 ?>