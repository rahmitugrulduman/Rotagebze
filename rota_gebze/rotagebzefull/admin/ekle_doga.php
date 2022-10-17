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
  <h3 class="page-heading mb-4">Doğa Turizmi Ekleme</h3>
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

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
    
    $baslik = $_POST['baslik']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $icerik = $_POST['icerik'];

    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
    if ($baslik <> "" && $icerik <> "" && isset($_FILES['foto'])) {
        
        if ($_FILES['foto']['error'] != 0) {
            echo "Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.";
        } else {

            $dosya_adi = strtolower($_FILES['foto']['name']);
            if (file_exists('images/' . $dosya_adi)) {
                echo "Aynı isimde dosya var!!";
                
            } else {
                $boyut = $_FILES['foto']['size'];
                if ($boyut > (1024 * 1024 * 5)) {
                    echo 'Dosya boyutu 2MB den büyük olamaz.';
                } else {
                    $dosya_tipi = $_FILES['foto']['type'];
                    $dosya_uzanti = explode('.', $dosya_adi);
                    $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                    if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                        //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                        echo 'Hata, dosya türü JPEG veya PNG olmalı.';
                    } else {
                        $foto = $_FILES['foto']['tmp_name'];
                        copy($foto, 'images/' . $dosya_adi);

                        echo 'Dosyanız upload edildi!';

                        if ($conn->query("INSERT INTO doga_turizmi(foto, baslik, icerik) VALUES ('$dosya_adi','$baslik','$icerik')")) // Veri ekleme sorgumuzu yazıyoruz.
                        {
                            echo "Veri Eklendi";
                            echo "<script>window.location.replace('doga_turizmi.php')</script>"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                        } else {
                            echo "Hata oluştu";
                        }
                    }
                }
            }
        }


    }
    else
    {
      echo "Boş yerleri doldurunn.";
    }
}

?>
          </div>
        </div>
      </div>
    </div>
  </div>





<?php include "footer.php"; ?>