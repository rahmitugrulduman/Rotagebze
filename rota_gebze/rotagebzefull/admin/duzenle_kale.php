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
$sorgu = $conn->query("SELECT * FROM tarihi_kaleler WHERE id =" . (int)$_GET['id']);
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
                          <td class="tipp">Başlık</td>
                          <td><textarea type="text" class="form form-control form_aciklama "name="baslik" placeholder="   Başlık giriniz"></textarea></td>
                        </tr>
                        <tr>
                          <td class="tipp">İçerik</td>
                          <td><textarea class="form form-control form_aciklama" name="icerik" id="" cols="30" rows="10" placeholder="   Açıklama giriniz"></textarea></td>
                        </tr>
                        <tr>
                          <td class="tipp">Resim seçiniz</td>
                          <td> <input type="file" class="inp_baslik"  name="foto"> </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><button type="submit" class="btn btn-primary son">Kaydet</button></td>
                        </tr>
                      </table>
                    </div>
                  </form>
        <?php

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    $baslik = $_POST['baslik']; // Post edilen değerleri değişkenlere aktarıyoruz
    $icerik = $_POST['icerik'];
    $hata='';

if ($_FILES["foto"]["name"] != "") {
     $foto = strtolower($_FILES['foto']['name']);
    if (file_exists('images/' . $foto)) {
        $hata= "$foto diye bir dosya var";
    } else {
        $boyut = $_FILES['foto']['size'];
        if ($boyut > (1024 * 1024 * 2)) {
            $hata = 'Dosya boyutu 2MB den büyük olamaz.';
        } else {
            $dosya_tipi = $_FILES['foto']['type'];

            $dosya_uzanti = explode('.', $foto);
            $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

            if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                $hata = 'Hata, dosya türü JPEG veya PNG olmalı.';
            } else {
                $dosya = $_FILES["foto"]["tmp_name"];
                copy($dosya, "images/" . $foto);
                unlink('images/'.$sonuc["foto"]); //eski dosya siliniyor.
            }
        }
    }
}
else
    {
        //Eğer kullanıcı fotoğraf seçmedi ise veri tabanındaki resimi değiştirmiyoruz
        $foto = $sonuc["foto"];
    }


    if ($baslik <> "" && $icerik <> "" && $hata=="") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.

        if ($conn->query("UPDATE tarihi_kaleler SET baslik = '$baslik', icerik = '$icerik', foto='$foto' WHERE id =" . $_GET['id'])) // Veri güncelleme sorgumuzu yazıyoruz.
        {
            echo "<script>window.location.replace('tarihi_kaleler.php')</script>";
            // header("location:tarihi_cami.php"); // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
            // die();
        }
        else {
            echo 'Düzenleme hatası oluştu: '; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
    else
    {
    
        echo 'Hata oluştu: '.$hata; // dosya hatası ve form elemanlarının boş olma durumunua göre hata döndürüyoruz.
    }
}

?>