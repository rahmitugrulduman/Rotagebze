
    <!-- Tarihi yaklaşan etkinlikler sırasıyla listelenecek 
    <form action="../admin/excel/excel.php" method="post">
      <div class="card-deck">
        <div class="card col-lg-12 px-0 mb-4">
          <div class="card-body">
            <h5 class="card-title">Gelecek Etkinlikler</h5>
            <div class="table-responsive">
              <table class="table center-aligned-table">
                <thead>
                  <tr class="text-primary">
                    <th>Kategori</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Sorumlu Personel Ad </th>
                    <th>Sorumlu Personel Ad </th>
                    <th>Tarih</th>
                  </tr>
                </thead>
                <tbody>
                <?php

include "../login/baglanti.php";

$sec = " SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE etkinlikler.tarih > CURRENT_TIMESTAMP and durum='1' ORDER BY etkinlikler.id DESC";


$sorgu = mysqli_query($conn, $sec);

?>

<?php while ($sonuc = mysqli_fetch_row($sorgu)) { ?>
  <tr>
    <td><?= $sonuc[9] ?></td>
    <td><?= $sonuc[3] ?></td>
    <td><?= $sonuc[4] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[1] ?></td>
    <td><a href="etkinlik_ekle.php?pid=<?= $sonuc[0] ?>" class="btn btn-primary btn-sm">Düzenle</a></td>
    <td><a href="#" class="btn btn-danger btn-sm">Sil</a></td>
  </tr>
<?php } ?>

</tbody>
</table>
</div>
<div class="form-group">
<button type="submit" name="yazdir_aktif" class="btn btn-primary">Yazdır</button>
</div>
</div>
</div>
</div>



<div class="card-deck">
<div class="card col-lg-12 px-0 mb-4">
<div class="card-body">
<h5 class="card-title">Pasif Etkinlikler</h5>
<div class="table-responsive">
<table class="table center-aligned-table">
<thead>
<tr class="text-primary">
  <th>Kategori</th>
  <th>Başlık</th>
  <th>Açıklama</th>
  <th>Sorumlu Personel Ad </th>
  <th>Sorumlu Personel Ad </th>
  <th>Tarih</th>
</tr>
</thead>
<tbody>
<?php

include "../login/baglanti.php";

$sec = "SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE durum = '0' ORDER BY etkinlikler.id DESC";



$sorgu = mysqli_query($conn, $sec); ?>

<?php while ($sonuc = mysqli_fetch_row($sorgu)) { ?>

  <tr>
    <td><?= $sonuc[9] ?></td>
    <td><?= $sonuc[3] ?></td>
    <td><?= $sonuc[4] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[1] ?></td>
    <td><a href="etkinlik_ekle.php?pid=<?= $sonuc[0] ?>" class="btn btn-primary btn-sm">Düzenle</a></td>
    <td><a href="#" class="btn btn-danger btn-sm">Sil</a></td>
  </tr>

<?php } ?>

</tbody>
</table>
</div>
<div class="form-group">
<button type="submit" name="yazdir_pasif" class="btn btn-primary">Yazdır</button>
</div>

</div>
</div>
</div>



<div class="card-deck">
<div class="card col-lg-12 px-0 mb-4">
<div class="card-body">
<h5 class="card-title">Tarihi Geçmiş Etkinlikler</h5>
<div class="table-responsive">
<table class="table center-aligned-table">
<thead>
<tr class="text-primary">
  <th>Kategori</th>
  <th>Başlık</th>
  <th>Açıklama</th>
  <th>Sorumlu Personel Ad </th>
  <th>Sorumlu Personel Ad </th>
  <th>Tarih</th>
</tr>
</thead>
<tbody>
<?php

include "../login/baglanti.php";
/*
     $sec="SELECT * FROM etkinlikler";
     $kategori="";
     $sonuc=$conn->query($sec);
     if($sonuc->num_rows>0)
     {
        while($cek=$sonuc->fetch_assoc())
        {
           echo "

               <tr>
                  <td>".$cek['id']."</td>
                  <td>".$cek['kategori_id']."</td>
                  <td>".$cek['baslik']."</td>
                  <td>".$cek['aciklama']."</td>
                  <td>".$cek['gorevli_personel_id']."</td>
               </tr>

             ";
         }
      }                    
    else
    {
        echo "kayitli veri bulunamadı";

    }
    */

$sec = " SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE etkinlikler.tarih < CURRENT_TIMESTAMP and durum='1' ORDER BY etkinlikler.id DESC";



$sorgu = mysqli_query($conn, $sec);

?>

<?php while ($sonuc = mysqli_fetch_row($sorgu)) { ?>
  <tr>
    <td><?= $sonuc[9] ?></td>
    <td><?= $sonuc[3] ?></td>
    <td><?= $sonuc[4] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
    <td><?= $sonuc[1] ?></td>
    <td><a href="etkinlik_ekle.php?pid=<?= $sonuc[0] ?>" class="btn btn-primary btn-sm">Düzenle</a></td>
    <td><a href="#" class="btn btn-danger btn-sm">Sil</a></td>
  </tr>
<?php }
?>
</tbody>
</table>
</div>

<div class="form-group">
<button type="submit" name="yazdir_tarihi_gecmis" class="btn btn-primary">Yazdır</button>
</div>
</div>
</div>

</form>
</div>
</div>
