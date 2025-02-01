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
	ob_start();
	include("baglan.php");
	if(isset($_POST["GirisYap"]))
	{
		session_start();
		$kadi=$_POST["Kullanici"];
		$sifre=$_POST["Sifre"];
		$sql="select * from kullanicilar where kullanici_adi='$kadi' and sifre='$sifre'";
		$result=mysqli_query($baglanti,$sql);
		$count=mysqli_num_rows($result);
		if($count)
		{
			session_start();
			$_SESSION["login"]="true";
			$_SESSION["kullanici"]=$kadi;
			$_SESSION["sifre"]=$sifre;
			header("Location:dkontrol.php");
		}
		else
		{
			if($kadi=="" or $sifre=="")
			{
				echo "<script  type='text/javascript'>
				confirm('Lütfen Kullanıcı Adı Veya Şifreyi Boş Bırakmayınız');
					</script>";
			}
			else
			{
				echo"<script  type='text/javascript'>
				confirm('Kullanıcı Adı Veya Şifre Yanlış');
					</script>";
			}
		echo "<a href='index.php' class='button'>Geri Dönmek İçin</a>";
		}
	ob_end_flush();
	}
?>