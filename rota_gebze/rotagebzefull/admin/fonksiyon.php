<?php 
ob_start();
session_start();

function giriskontrol() {
$ad=$_SESSION['ad'];
$soyad=$_SESSION['soyad'];
$sorgu = $conn->query("SELECT * FROM kullanicilar where ad='$ad' && soyad='$soyad'" );
$adminsay= mysql_num_rows($sorgu);

if($adminsay==0){

    header('Location:../login/panelgiris.php');
}
}
function yetkikontrol() {
    $ad=$_SESSION['ad'];
    $soyad=$_SESSION['soyad'];
    $sorgu = $conn->query("SELECT * FROM kullanicilar where ad='$ad' && soyad='$soyad' && yetki='1'" );
    $adminsay= mysql_num_rows($sorgu);
    
    if($adminsay==0){
    
        header('Location:../login/yetkiyok.php');
    }
    }
?>