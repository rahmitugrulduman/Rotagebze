<!DOCTYPE html>
<html lang="tr">

<!-- eksiklikler -->
<!-- kullanıcı fotografı -->
<?php 
include "../login/baglanti.php";?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> <?php echo $_SESSION["ad"] . " " . $_SESSION["soyad"]; ?></title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->


    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->

        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">

            <img src="images/face.jpg" alt=""> <!--kullanıcı fotografı-->
            <p class="name"><?php echo $_SESSION["ad"] . " " . $_SESSION["soyad"]; ?></p>
            <p class="designation">
              admin
            </p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item"> <!--active-->
              <a class="nav-link" href="panel.php">
                <img src="images/icons/1.png" alt="">
                <span class="menu-title">Ana Ekran</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tarihi_cami.php">
                <i class="fa-solid fa-mosque ikon1"></i>
                <span class="menu-title">Tarihi Camiler</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doga_turizmi.php">
              <i class="fa-brands fa-pagelines ikon2"></i>
                <span class="menu-title">Doğa Turizmi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tarihi_kaleler.php">
               <i class="fa-brands fa-fort-awesome ikon3"></i>
                <span class="menu-title">Tarihi Kaleler</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="yoresel_yemekler.php">
              <i class="fa-solid fa-plate-wheat ikon4"></i>
                <span class="menu-title">Yöresel Yemekler</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tarihi_cesmeler.php" >
              <i class="fa-solid fa-faucet-drip ikon5"></i>
                <span class="menu-title">Tarihi Çeşmeler</i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tarihi_hamamlar.php" >
              <i class="fa-solid fa-house-flood-water ikon6"></i>
                <span class="menu-title">Tarihi Hamamlar</i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sehit_mezarligi.php" >
              <img src="images/mezar.jpeg" alt="">
                <span class="menu-title">Şehit Mezarlığı</i></span>
              </a>
            </li>
            <?php  
            $ad=$_SESSION['ad'];
            $soyad=$_SESSION['soyad'];
            $sorgu = $conn->query("SELECT * FROM kullanicilar where ad='$ad' && soyad='$soyad'" );
            $admincek= mysqli_fetch_assoc($sorgu);

            if ($admincek['yetki']=="1"){ ?>
              <li class="nav-item">
              <a class="nav-link" href="kullanici.php">
              <i class="fa-solid fa-users ikon5"></i>
                <span class="menu-title">Kullanıcı</span>
              </a>
            </li>
            <?php } ?>

            <li class="nav-item">
              <a class="nav-link" href="mesaj.php">
                <img src="images/icons/005-forms.png" alt="">
                <span class="menu-title">Mesaj Kutusu</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../login/cikis.php">
                <img src="images/icons/logout.png" alt="">
                <span class="menu-title">Çıkış Yap</span>
              </a>
            </li>

          </ul>
        </nav>