<?php
include "../login/baglanti.php";
session_start();
if($_SESSION["ad"]=="")
{
  header("location:../login/panelgiris.php");//bu doğru olan
}
$ad=$_SESSION['ad'];
$soyad=$_SESSION['soyad'];
$sorgu = $conn->query("SELECT * FROM kullanicilar where ad='$ad' && soyad='$soyad' && yetki='1'" );
$adminsay= mysqli_num_rows($sorgu);

if($adminsay==0){

    header('Location:../login/yetkiyok.php');
}

 
else if ($_GET) 
{
    // veritabanı bağlantımızı sayfamıza ekliyoruz.
    $sorgu = $conn->query("SELECT * FROM tarihi_cami WHERE id =" . (int)$_GET['id']);
    $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    unlink('images/'.$sonuc["foto"]); //eski dosya siliniyor.

if ($conn->query("DELETE FROM tarihi_cami WHERE id =".(int)$_GET['id'])) // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
{
	header("location:tarihi_cami.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>