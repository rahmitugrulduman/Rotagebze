<?php
session_start();
if($_SESSION["ad"]=="")
{
  header("location:../login/panelgiris.php");//bu doğru olan
}
?>
<?php 
 include "../login/baglanti.php";
if ($_GET) 
{
    // veritabanı bağlantımızı sayfamıza ekliyoruz.
    $sorgu = $conn->query("SELECT * FROM kullanicilar WHERE tc =" . $_GET['tc']);
    $sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    unlink('images/'.$sonuc["foto"]); //eski dosya siliniyor.

if ($conn->query("DELETE FROM kullanicilar WHERE tc =".$_GET['tc'])) // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
{
	header("location:kullanici.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>