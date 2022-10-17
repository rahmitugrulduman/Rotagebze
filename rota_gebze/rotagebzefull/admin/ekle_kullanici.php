<?php
session_start();
if($_SESSION["ad"]=="")
{
  header("location:../login/panelgiris.php");//bu doğru olan
}
?>

<?php 
include "navbar_sol.php" ;
include "../login/baglanti.php";?>
<div class="content-wrapper">
  <h3 class="page-heading mb-4">Kullanıcı Ekleme</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                 
</div>


              </div>
            </div>

                  <form class="forms-sample" action="" enctype="multipart/form-data" method="POST">
                    <div class="form-group" act>
                      <table>
                        <tr>
                          <td class="tipp">Ad</td>
                          <td><textarea type="text" class="form form-control form_aciklama "name="ad" placeholder="   Başlık giriniz"></textarea></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="tipp">Soyad</td>
                          <td><textarea class="form form-control form_aciklama" name="soyad"  placeholder="   Açıklama giriniz"></textarea></td>
                        </tr>
                        <tr>
                        <td class="tipp">TC Kimlik</td>
                          <td><textarea type="text" class="form form-control form_aciklama "name="tc" placeholder="   Başlık giriniz"></textarea></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="tipp">Şifre</td>
                          <td><textarea type="password" class="form form-control form_aciklama "name="sifre" placeholder="   Başlık giriniz"></textarea></td>
                        </tr>
                        <tr>
                          <td><button type="submit" class="btn btn-primary son">Kaydet</button></td>
                        </tr>
                      </table>
                    </div>
                  </form>
                  <?php

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
    
    $ad = $_POST['ad']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $soyad = $_POST['soyad'];
    $tc= $_POST['tc'];
    $sifre= $_POST['sifre'];

    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
    if ($ad <> "" && $soyad <> "" && $tc <>"" && $sifre) {

                        if ($conn->query("INSERT INTO kullanicilar(ad, soyad, tc,sifre) VALUES ('$ad','$soyad','$tc','$sifre')")) // Veri ekleme sorgumuzu yazıyoruz.
                        {
                            echo "Veri Eklendi";
                            echo "<script>window.location.replace('kullanici.php')</script>"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                        } else {
                            echo "Hata oluştu";
                        }
                    }
                }
    else
    {
      echo "Boş yerleri doldurunn.";
    }


?>
          </div>
        </div>
      </div>
    </div>
  </div>





<?php include "footer.php"; ?>