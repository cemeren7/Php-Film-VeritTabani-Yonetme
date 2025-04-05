<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Sil Sayfası" ?></title>
    <link rel="stylesheet" href="./boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="./boostrap/bootstrap.min.css.map">
    <link rel="stylesheet" href="./Fılm.css">
</head>
<body>
    <?php
     $conn = mysqli_connect("localhost","root","","fılmler");
     mysqli_set_charset($conn,"utf8");
    ?>
     <div class="d-flex justify-content-end mt-3 me-3">
        <a href="./Güncelle.php"><button type="button" class="btn btn-primary me-2">Güncelle Sayfasına Git</button></a>
        <a href="./Kaydet.php"><button type="button" class="btn btn-primary">Kaydet Sayfasına Dön</button></a>
    </div>
    <div class="d-flex justify-content-center mt-3">
  <table class="table table-striped w-75">
  <thead class="border-top">
    <tr>
      <th scope="col">Film_No</th>
      <th scope="col">Film_Adı</th>
      <th scope="col">Tur</th>
      <th scope="col">Ulke</th>
      <th scope="col">Sure</th>
      <th scope="col">Puan</th>
    </tr>
  </thead>
  <tbody> <!--tablonun ana bolüm başlangıcı-->
   <?php
   $sql=mysqli_query($conn,"SELECT * FROM `fılm`");
    while ($row=mysqli_fetch_assoc($sql)) {
   ?>
        <tr> <!--her bir defasında satır yapısı oluşturur-->
        <td scope="row"><?php echo $row['Fılm_Id']; ?></td> <!--sütun yapısı oluşturur-->
        <td scope="row"><?php echo $row['Fılm_Adı']; ?></td>
        <td scope="row"><?php echo $row['Tur']; ?></td>
        <td scope="row"><?php echo $row['Ulke']; ?></td>
        <td scope="row"><?php echo $row['Sure']; ?></td>
        <td scope="row"><?php echo $row['Puan']; ?></td>
      </tr>
     </tbody>
     <?php
    }
     ?>
    </table>
    </div>

<div class="d-flex justify-content-center mt-2">
<form method="post">
<div class="p-5 border border-2 rounded width">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fılm Adı</label> 
    <input type="text" class="form-control" name="Ad" > 
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary">Sil</button>
  <button type="reset" class="btn btn-primary">Formu Temizle</button>
  </div>
  </div>
</form>
</div>


</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $Fılm_Adı=$_POST['Ad'];
   if ($Fılm_Adı==null || $Fılm_Adı=="") {
     echo "<center>Lütfen Film Adı Alanının Boş Olmadıgından Emin Olun</center>";
   } else {
    $sqldelete="DELETE  FROM fılm WHERE Fılm_Adı='$Fılm_Adı' ";
    if (mysqli_query($conn,$sqldelete)) {
      echo "<center>Silme İşlemi Başarıyla Gerçekleşti</center>";
    } else {
      echo "<center>Silme İşlemi Başarısız Oldu</center>";
    }
    
   }
   
}
?>