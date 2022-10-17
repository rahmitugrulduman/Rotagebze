
<?php
$server="localhost";
$kullaniciadi="root";
$sifre="";
$db="rotagebze";
$conn= new mysqli($server,$kullaniciadi,$sifre,$db);

if($conn -> connect_error)
{
    die("baglanti hatası : ".$conn-> connect_error);
}
?>