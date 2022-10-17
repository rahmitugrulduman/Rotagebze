<?php require('ayarlar.php'); ?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php 
			if ($_SESSION['giris']){ ?>
				<div class="container">
					<h1>PHP Yetki Sistemi</h1>
					<hr>
					<div class="k_style">Hoş geldin <span><?php echo $_SESSION['kullanici_isim'] ?></span> <span>[ <?php echo yetki_tag($_SESSION['kullanici_yetki']) ?> ]</span></div>
					<div class="moduller">
						<div><a href="index.php">Anasayfa</a></div>
						<?php if (yetki_kontrol($_SESSION['kullanici_yetki'], 'makale')){?>
							<div>Makaleler</div>
						<?php } if (yetki_kontrol($_SESSION['kullanici_yetki'], 'yorum')){?>
							<div>Yorumlar</div>
						<?php } if (yetki_kontrol($_SESSION['kullanici_yetki'], 'mail')){?>
							<div>Mailler</div>
						<?php } if (yetki_kontrol($_SESSION['kullanici_yetki'], 'uyelik')){?>
							<div><a href="index.php?page=yetki">Yetki Ayarları</a></div>
							<div><a href="index.php?page=uye">Üyeler</a></div>
						<?php }?>
						<div><a href="membership.php?cikis=cikis">Çıkış Yap</a></div>
					</div>
					<div class="page">
						<?php 
							if ($_GET['page']){
								require ('sayfalar/'.$_GET['page'].'.php'); 
							}else{ ?>
								<h1>Anasayfa</h1>
								İlk açılan sayfa.
							<?php
							}
						?>
					</div>
				</div>
			<?php
			}else{
				header("Location: membership.php?type=login");
			}
		?>
	</body>
</html>