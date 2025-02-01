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
								$sql="select * from kullanicilar"; 
								$result=mysqli_query($baglanti,$sql); 
								while($row=mysqli_fetch_assoc($result))
								{
									if($_SESSION["kullanici"]==$row["kullanici_adi"])
									{	
										break;
									}
								}			
								if(isset($_POST["Manav"]))
								{	
									$sql1="select * from manav"; 
									$result1=mysqli_query($baglanti,$sql1); 
									$sahiplik=0;
									while($row1=mysqli_fetch_assoc($result1))
									{
									if($_SESSION["kullanici"]==$row1["kullanici_adi"])
									{	
										echo "<script  type='text/javascript'>
											confirm('Zaten 1 Manavınız Bulunmakta');
												</script>";
										$sahiplik=1;
										break;
									}
									}
									$fiyat=100000;
									if($fiyat<=$row["bakiye"] && $sahiplik==0)
									{
										echo "<script  type='text/javascript'>
											confirm('Başarıyla Alındı');
												</script>";
										$bakiye=$row["bakiye"]-$fiyat;
										$ekle="insert into manav (kullanici_adi,urun,adet,fiyat,sure) values('$_SESSION[kullanici]','','','','')";
										$ekleurun="insert into urunsat (kullanici_adi,urun,adet,fiyat) values('$_SESSION[kullanici]','meyve','','')";
										$calistir=mysqli_query($baglanti,$ekle);
										$calistirurun=mysqli_query($baglanti,$ekleurun);
										$Guncelle= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$bakiye' WHERE kullanici_adi = '$_SESSION[kullanici]' ");
									}
								}
								if(isset($_POST["Bahce"]))
								{
									$sql1="select * from bahce"; 
									$result1=mysqli_query($baglanti,$sql1); 
									$sahiplik=0;
									while($row1=mysqli_fetch_assoc($result1))
									{
									if($_SESSION["kullanici"]==$row1["kullanici_adi"])
									{	
										echo "<script  type='text/javascript'>
											confirm('Zaten 1 Bahçeniz Bulunmakta');
												</script>";
										$sahiplik=1;
										break;
									}
									}
									$fiyat=150000;
									if($fiyat<=$row["bakiye"] && $sahiplik==0)
									{
										echo "<script  type='text/javascript'>
											confirm('Başarıyla Alındı');
												</script>";
										$bakiye=$row["bakiye"]-$fiyat;
										$ekle="insert into bahce (kullanici_adi,urun,adet,fiyat,sure) values('$_SESSION[kullanici]','','','','')";
										$ekleurun="insert into urunsat (kullanici_adi,urun,adet,fiyat) values('$_SESSION[kullanici]','meyve','','')";
										$calistir=mysqli_query($baglanti,$ekle);
										$calistirurun=mysqli_query($baglanti,$ekleurun);
										$Guncelle= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$bakiye' WHERE kullanici_adi = '$_SESSION[kullanici]' ");
									}
								}
								if(isset($_POST["Ciftlik"]))
								{	
									$sql1="select * from ciftlik"; 
									$result1=mysqli_query($baglanti,$sql1); 
									$sahiplik=0;
									while($row1=mysqli_fetch_assoc($result1))
									{
									if($_SESSION["kullanici"]==$row1["kullanici_adi"])
									{	
										echo "<script  type='text/javascript'>
											confirm('Zaten 1 Çiftliğiniz Bulunmakta');
												</script>";
										$sahiplik=1;
										break;
									}
									}
									$fiyat=225000;
									if($fiyat<=$row["bakiye"] && $sahiplik==0)
									{
										echo "<script  type='text/javascript'>
											confirm('Başarıyla Alındı');
												</script>";
										$bakiye=$row["bakiye"]-$fiyat;
										$ekle="insert into ciftlik (kullanici_adi,urun,adet,fiyat,sure) values('$_SESSION[kullanici]','','','','')";
										$ekleurun="insert into urunsat (kullanici_adi,urun,adet,fiyat) values('$_SESSION[kullanici]','gübre','','')";
										$calistir=mysqli_query($baglanti,$ekle);
										$calistirurun=mysqli_query($baglanti,$ekleurun);
										$Guncelle= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$bakiye' WHERE kullanici_adi = '$_SESSION[kullanici]' ");
									}
								}
							echo "<a href='satınal.php'>Geri Dönmek İçin</a>"
							?>