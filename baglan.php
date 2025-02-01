<?php

	$host = "92.204.219.117";
	$kullaniciadi = "kzzn6o8q0vnr";
	$parola = "Bademli25";
	$vt = "uyelik";
	
	$baglanti = mysqli_connect($host,$kullaniciadi,$parola,$vt);
	mysqli_set_charset($baglanti,"UTF8");
	
	if($baglanti)
	{

	}
	else
	{
			echo "<script  type='text/javascript'>
				confirm('Bağlantıda Hata Oluştu');
				</script>";
	}
?>