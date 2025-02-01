<?php
session_start();
if($_SESSION["kullanici"]==NULL)
{
	header("Location:hatasayfasi.php");
}
ob_start();
include("baglan.php");
$manav=75000;
if(isset($_POST["ManavAl"]))
{
	$kadi=$_SESSION['kullanici'];
	$sql1="select * from manav";
	$result1=mysqli_query($baglanti,$sql1);
	$ekle="insert into manav (kullanici_adi,urun,adet,fiyat,sure) values('$kadi','','','','')";
	$sql="select * from kullanicilar";
	$result=mysqli_query($baglanti,$sql); 
	$calistirekle = mysqli_query($baglanti,$ekle);
	while($row1=mysqli_fetch_assoc($result1))
	{
		if($row1["kullanici_adi"]==$_SESSION["kullanici"])
		{
			header("Location:dükkanlarım.php");
		}
	}
	if($calistirekle)
	{	
		echo "<script  type='text/javascript'>
			confirm('Başarıyla Dükkan Satın Alındı');
			</script>";
		while($row=mysqli_fetch_assoc($result))
		{
			if($_SESSION["kullanici"]==$row["kullanici_adi"])
			{
				$yenipara=$row["bakiye"]-$manav;
				$Guncelle= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$yenipara' WHERE kullanici_adi = '$kadi' ");
				header("Location:dükkanlarım.php");	
			}
		}
	}
	else
	{
		echo "<script  type='text/javascript'>
			confirm('Malesef Dükkan Satın Alınamadı');
				</script>";
	}
}
?>