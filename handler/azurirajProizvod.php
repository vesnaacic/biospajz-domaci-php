<?php
 require '../konekcija.php';
 require '../model/proizvod.php';
 require '../model/kategorija.php';


 if(isset($_POST['proizvodId']) && isset($_POST['kategorija'])&& isset($_POST['imeProizvoda']) && isset($_POST['nutritivnaVrednost']) ){
  $proizvodId=$_POST['proizvodId'];
  $imeProizvoda=$_POST['imeProizvoda'];
  $nutritivnaVrednost=$_POST['nutritivnaVrednost'];


  $proizvod=new Proizvod($proizvodId,$imeProizvoda,$nutritivnaVrednost);
  $rezultat=$proizvod->update($conn);
  
  if($rezultat){
    echo 'Ok';
 }else{ 
   echo 'Not okay';
   echo $status;
 }
 } 
  ?>