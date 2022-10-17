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
  <h3 class="page-heading mb-4">Tarihi Camiler</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form action="ara_cami.php" method="POST">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="s" placeholder="Search">
                    <button class="btn btn-success" style=" background:blue;" type="submit">ARA</button>
                  </div>
                </form>
                <div class="table-responsive">
                  
</div>

<div class="card-deck">
        <div class="card col-lg-12 px-0 mb-4">
          <div class="card-body">
            <a href="ekle.php" ><i class="fa-solid fa-plus ekleme"></i></a>
            <h5 class="card-title"></h5>
            <div class="table-responsive">
              <table class="table center-aligned-table">
                <thead>
                  <tr class="text-primary">
                    <th>Fotoğraf</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>İşlem </th>
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php
                if ($_POST) 
                    $ara = $_POST["s"]; 
                    $sorgu = $conn->query("SELECT * FROM tarihi_cami where baslik like '%$ara%'"); // Makale tablosundaki tüm verileri çekiyoruz.
                    if (mysqli_num_rows($sorgu)<1) { echo "<script>window.location.replace('tarihi_cami.php')</script>";} 
                    else

                        while ($sonuc = $sorgu->fetch_assoc()) {

                            $id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
                            $foto = $sonuc['foto'];
                            $baslik = $sonuc['baslik'];
                            $icerik = $sonuc['icerik'];

                        // While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
                            ?>
                                            <tr>
                                    <!-- <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td> -->
                                    <td><img width="150px" src="images/<?php echo $foto; ?>" style="height:90px;" alt=""></td>
                                    <td><?php echo $baslik; ?></td>
                                    <td><?php echo $icerik; ?></td>
                                    <td><span><a href="duzenle.php?id=<?php echo $id; ?>" ><i class="fa-solid fa-pen-to-square ikon"></i></a></span>
                                    <span><a href="sil.php?id=<?php echo $id; ?>" ><i class="fa-solid fa-trash-can ikon" ></i></a></span></td>
                                </tr>

                            <?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<!-- ############################################################## -->
<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->

              </div>
            </div>
<hr>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php include "footer.php"; ?>