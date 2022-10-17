<?php
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}

?>


  <!-- partial -->
  <div class="content-wrapper">
    <h3 class="page-heading mb-4">YÖNETİM PANELİ</h3>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-danger">
                    <i class="fa fa-bar-chart-o " aria-hidden="true"></i>
                </h4>
                
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Mesaj Sayısı</p>
                <h4 class="bold-text">
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM mesaj");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>

                </h4> <!-- mesaj sayısı yer alacak -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                <i class="fa-solid fa-mosque " ></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen Tarihi Cami Sayısı      </p>
                <h4 class="bold-text"></h4> <!-- Yaklaşan Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM tarihi_cami");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                <i class="fa-solid fa-umbrella-beach ikon2 "></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen turizm yeri sayısı      </p>
                <h4 class="bold-text"></h4> <!-- Yaklaşan Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM doga_turizmi");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                <i class="fa-brands fa-fort-awesome ikon3 "></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen Tarihi Kalelerin Sayısı</p>
                <h4 class="bold-text"></h4> <!-- Yaklaşan Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM tarihi_kaleler");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                <i class="fa-solid fa-plate-wheat ikon4"></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen Yemeklerin sayısı</p>
                <h4 class="bold-text"></h4> <!-- Yaklaşan Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM yoresel_yemekler");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-warning">
                <i class="fa-solid fa-faucet-drip ikon5 "></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen Tarihi Çeşmelerin Sayısı</p>
                <h4 class="bold-text"></h4> <!-- Yaklaşan Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM tarihi_cesmeler");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-success">
                <i class="fa-solid fa-house-flood-water ikon6 "></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Eklenen Tarihi Hamamlar Sayısı</p>
                <h4 class="bold-text"></h4> <!-- İptal Edilen Etkinlik Sayısı -->
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM tarihi_hamamlar");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
        <div class="card card-statistics">
          <div class="card-body" style="height: 120px;">
            <div class="clearfix">
              <div class="float-left">
                <h4 class="text-primary">
                <i class="fa-solid fa-users "></i>
                </h4>
              </div>
              <div class="float-right">
                <p class="card-text text-dark">Kullanıcılar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <h4 class="bold-text"></h4> 
                <?php
                include "../login/baglanti.php";
               $result=mysqli_query($conn,"SELECT count(*) AS total FROM kullanicilar");
               $data=mysqli_fetch_assoc($result);

               echo $data['total'];
                 
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
