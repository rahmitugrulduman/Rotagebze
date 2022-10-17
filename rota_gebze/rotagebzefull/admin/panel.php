<?php
session_start();
if($_SESSION["ad"]=="")
{
  header("location:../login/panelgiris.php");//bu doğru olan
}
?>



<?php include "navbar_sol.php"; ?>

<?php include "goruntule.php"; ?>




<?php include "footer.php"; ?>