<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Veri Tabanı Kaydetme" ?></title>
    <link rel="stylesheet" href="./boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="./boostrap/bootstrap.min.css.map">
    <link rel="stylesheet" href="./Fılm.css">
</head>
<body>
    <!--baglantı işlemleri-->
    <?php
     $conn = mysqli_connect("localhost","root","","fılmler"); 
     // veri tabanın veri dil setini ayarladık
     mysqli_set_charset($conn,"utf8"); // bu iki function tabanlı yapıyı burada tanımlayarak sayfanın her yerinde kullanabiliriz
   ?>
   <div class="d-flex justify-content-end mb-3 mt-3 me-3">
     <a href="./Güncelle.php"><button type="button" class="btn btn-primary">Güncelle Sayfasına Git</button></a>
   </div>
    <div class="d-flex justify-content-center mt-4"> <!--genel tablo flex yapısı-->
<table class="table table-striped w-75">
  <thead class="border-top"><!--başlık kısmı-->
    <tr> <!--baslık kısmı için satır olusşturdu-->
      <th scope="col">Film_No</th> <!--başlık etiketleri-->
      <th scope="col">Film_Adı</th>
      <th scope="col">Tur</th>
      <th scope="col">Ulke</th>
      <th scope="col">Sure</th>
      <th scope="col">Puan</th>
    </tr>
  </thead>
  <tbody><!--tablonun ana satır ve sütun yapısı-->
  <?php
     $query = mysqli_query($conn,"SELECT * FROM `fılm`");
     while ($row=mysqli_fetch_assoc($query)) { // sonuçları satır satır almaya yarar verilere sütun isimleri ile erişiriz
    ?>
    <tr> <!--her bir defasında satır yapısı oluşturur-->
      <td scope="row"><?php echo $row['Fılm_Id']; ?></td> <!--sütun yapısı oluşturur-->
      <td scope="row"><?php echo $row['Fılm_Adı']; ?></td> <!--burada satır tabanlı verilere sütun isimleri-->
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

<div class="form-container">
<form method="post">
    <div class="p-5 border border-2 rounded width">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fılm Adı</label> 
    <input type="text" class="form-control"  name="Movie_Name"> <!-- biz burada veri tabanına veri kaydederken name ile degeri alırız-->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tür</label>
    <input type="text" class="form-control"  name="Movie_Type">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Süre</label>
    <input type="text" class="form-control"  name="Movie_Time">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ülke</label>
    <input type="text" class="form-control" name="Movie_Country">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Puan</label>
    <input type="text" class="form-control"  name="Movie_Points">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Dil</label>
    <input type="text" class="form-control"  name="Movie_Language">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-primary">Kaydet</button>
  <button type="reset" class="btn btn-primary">Formu Temizle</button>
  </div>
  </div>
  </form>

</div>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){ // öcelikle formlardan gelen methdo post olup olmadıgını kontrol eder
  // input içindeki tüm verilere name kısmı ile erişir ve degişkenler ile alırız
  $Fılm_Adı=$_POST['Movie_Name'];
  $Tur=$_POST['Movie_Type'];
  $Ulke=$_POST['Movie_Country'];
  $Sure=$_POST['Movie_Time'];
  $Puan=$_POST['Movie_Points'];
  $Dıl=$_POST['Movie_Language'];
  if ($Fılm_Adı==null || $Tur==null || $Ulke ==null ||  $Sure==null || $Puan==null || $Dıl==null) { // name ile alınan degelerin null durumu kontrol edilir
    echo "<center>HiçBir Alan Boş Geçilemez</center>";
  } else {
    $sql_insert="INSERT INTO fılm(Fılm_Adı,Tur,Ulke,Sure,Puan,Dıl) VALUES('$Fılm_Adı','$Tur','$Ulke','$Sure','$Puan','$Dıl')";
    if (mysqli_query($conn,$sql_insert)) { // veri tabanına kayıt eklenip eklenmedigini kontrol eder
      echo "<center>Başarılı Şekilde Veri Tabanına Kaydedildi</center>";
    } else {
      echo "<center>Kaydetme Başarısız</center>";
    }
  }
}

?>