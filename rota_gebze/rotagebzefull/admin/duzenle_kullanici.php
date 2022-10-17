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
<?php
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sorgu = $conn->query("SELECT * FROM kullanicilar WHERE tc =" . $_GET['tc']);
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

?>
<div class="content-wrapper">
  <h3 class="page-heading mb-4">İçerik Düzenle</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  
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

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    $ad = $_POST['ad']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $soyad = $_POST['soyad'];
    $tc= $_POST['tc'];
    $sifre= $_POST['sifre'];
    
    if ($ad <> "" && $soyad <> "" && $tc <>"" && $sifre) {

        if ($conn->query("UPDATE kullanicilar SET ad = '$ad', soyad = '$soyad', sifre='$sifre' WHERE tc =" . $_GET['tc'])) // Veri güncelleme sorgumuzu yazıyoruz.
        {
            echo "<script>window.location.replace('kullanici.php')</script>";
            // header("location:tarihi_cami.php"); // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
            // die();
        }
        else {
            echo 'Düzenleme hatası oluştu: '; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
    else
    {
    
        echo 'Boş yerleri doldurun.'; // form elemanlarının boş olma durumunua göre hata döndürüyoruz.
    }
}

?>