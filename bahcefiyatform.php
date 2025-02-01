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
			$sql="select * from manav"; 
			$result=mysqli_query($baglanti,$sql); 
			while($row=mysqli_fetch_assoc($result))
			{
				if($_SESSION["kullanici"]==$row["kullanici_adi"])
				{	
				break;
				}	
			}
			date_default_timezone_set('Europe/Istanbul');
			$saat=date("H");
			$fiyat=$_POST["fiyat"];
			$adet=$row["adet"];
			$adet+=($adet/10);
			$adet= (int) $adet;
			$kat1=$fiyat/10;
			$kat2=$adet/100;
			$tukenme=$kat1*$kat2;
			$yeni= (int) $tukenme;
			if($yeni-$tukenme!=0 || $yeni==0)
			{
				$yeni+=1;
			}
			$saat+=$yeni+3;
			$bitis=mktime($saat);
			$zaman = gmdate("Y-m-d H:i:s", $bitis);
			$ekle=mysqli_query($baglanti,"UPDATE  bahce SET fiyat='$fiyat', sure='$zaman' WHERE kullanici_adi='$_SESSION[kullanici]'");
			if($ekle)
			{
			header("Location:dükkanlarım.php");	
			}
		}
?>