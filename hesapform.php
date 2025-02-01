<head>

	<title>SVNGame</title>

</head>

<style>

	.button {
			background-color: #008CBA;
			border: none;
			color: white;
			padding: 8px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 25px;
		}
		
		.button:hover{
			
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			
		}

</style>

<?php
	include("baglan.php");
	session_start();
	ob_start();
	if($_SESSION["kullanici"]==NULL)
	{
	header("Location:hatasayfasi.php");
	}
			
				if(isset($_POST["buton"]))
				{
					$sifre=$_POST["sifre"];
					$stekrar=$_POST["sifretekrar"];
					if($sifre<>$stekrar)
					{
						echo "<script  type='text/javascript'>
							confirm('Lütfen Şifre Ve Şifreyi Tekrarı Aynı Giriniz');
								</script>";
					}
					else
						if($sifre<>"" and $stekrar<>"")
						{
							$kadi=$_SESSION["kullanici"];
							$Guncelle= mysqli_query($baglanti,"UPDATE kullanicilar SET sifre = '$sifre' WHERE kullanici_adi = '$kadi' ");
							if($Guncelle)
							{
								echo "<script  type='text/javascript'>
									confirm('Şifre Başarıyla Değiştirildi');
										</script>";
							}
							else
							{
								echo "<script  type='text/javascript'>
									confirm('Şifre Malesef Değiştirilemedi');
										</script>";
							}
						}
						else
						{
							echo "<script  type='text/javascript'>
								confirm('Lütfen Bilgileri Eksiksiz Giriniz');
									</script>";
						}
				echo "<a href='hesap.php' class='button'>Geri Dönmek İçin</a>";
				}
			
			?>