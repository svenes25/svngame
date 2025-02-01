<?php
	ob_start();
	include("baglan.php");
	if(isset($_POST["KayıtOl"]))
	{
		$isim=$_POST["Isim"];
		$sisim=$_POST["Sisim"];
		$kadi=$_POST["Kadi"];
		$email=$_POST["email"];
		$sifre=$_POST["sifre"];
		$tsifre=$_POST["sifretekrar"];
		if($sifre<>$tsifre)
		{
			echo "<script  type='text/javascript'>
				confirm('Lütfen Şifre Ve Şifreyi Tekrarı Aynı Giriniz');
					</script>";
		}
		else
		{
		if($isim<>"" and $sisim<>"" and  $kadi<>"" and $email<>"" and $sifre<>"" and $tsifre<>""){
		$ekle="insert into kullanicilar(kullanici_adi,isim,soyisim,email,sifre) values('$kadi','$isim','$sisim','$email','$sifre')";
		$calistirekle = mysqli_query($baglanti,$ekle);
		if($calistirekle)
		{
			echo "<script  type='text/javascript'>
				confirm('Kayıt Başarılı');
					</script>";
		}
		else
		{
			echo "<script  type='text/javascript'>
				confirm('Lütfen Farklı Bir Kullanıcı Adı Deneyiniz');
					</script>";
		}
		mysqli_close($baglanti);
		}
		else
		{
			echo "<script  type='text/javascript'>
				confirm('Lütfen Bilgileri Eksiksiz Giriniz');
					</script>";
		}
		echo "<a href='index.php'>Geri Dönmek İçin</a>";
		}
		ob_end_flush();
	}
	
?>