<html>
	<head>
		
		<?php
		echo "<title>Manav</title>";
		?>
		<link rel="stylesheet" href="oyun.css">

	</head>

	<style>
	
		body{
			background: url(wp.jpg) no-repeat center center  fixed; background-size: cover
		}
			
		ul {
		
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
			position: fixed;
			top: 0;
			width: 100%;

		}	

		li {
			float: left;
			border-right: 1px solid gray;
		}
		
		li b:hover:not(.active) {
			
			background-color: #111;
			animation-name: example;
			animation-duration: 2s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
			
		}
		
		.active {
			
			background-color: white;
			color black;
			
		}
		
		li b {
			
			display: inline-block;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		
		}
		
		li:last-child 
		{
			border-right: none;
		}
		
		@keyframes example {
		 
		from   {background-color: #111;}
		to {background-color: white;}
		}
		
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
		
		@media(min-width:900)
		{
			box-sizing:border-box;
		}
		
		.button:hover{
			
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			
		}
	
	</style>
<?php
	session_start();
	include("baglan.php");
	
?>
	<body>
		
			<ul>
		
			<li>
				<a href="hesap.php"><b style="color:aqua"><?php echo "Hesap Bilgileri: ".$_SESSION["kullanici"];?></b></a>
			</li>
			
			<li >
				<b style='color:yellow'><?php $sql="select * from kullanicilar WHERE kullanici_adi='$_SESSION[kullanici]'"; 
								$result=mysqli_query($baglanti,$sql);
								$balance=mysqli_fetch_assoc($result);
								echo $balance["bakiye"]." OP";?></b>
			</li>
			
			<li>
				<a href="urunsatınal.php"><b style='color:#ffcc99'>Ürün Satın Al</b></a>
			</li>
			
			<li>
				<a href="dükkanlarım.php"><b class="active">Dükkanlarım</b></a>
			</li>
			
			<li>
				<a href="satınal.php"><b style='color:#00ff00'>Dükkan Satın Al</b></a>
			</li>
			
			<li>
				<a href="sss.php"><b style='color:orange'>S.S.S</b></a>
			</li>
			
			<li style="float:right">
				<a href="cikis.php"><b style='color:red'>Çıkış Yap</b></a>
			</li>
		
		</ul>
			
			<br><br><br><br>
		
		<div class="dukkan">
		
			<div class="dukkanadı"><h3 style="color:red" align="center">Manav</h3></div>
			
			<div class="dukkanarayuz">
				
				<img src="manav.png" class="dukkanresim">
				<?php
				$sql1="select * from manav";
				$result1=mysqli_query($baglanti,$sql1); 
				$count1=mysqli_num_rows($result1);
				$anlık= time();
				$anlık+=10800;
				$anlık= gmdate("Y-m-d H:i:s", $anlık);
				if($count1)
				{
					while($row1=mysqli_fetch_assoc($result1))
					{
						if($_SESSION["kullanici"]==$row1["kullanici_adi"])
						{	
							break;
						}
					}
					if($row1['adet']==0)
					{
						echo "<br><br><a>Şuan Dükkanınız Boş Lütfen Ürün Satın Alın</a>";
						echo "<br><br><a href='urunsatınal.php'>Ürün Satın Al</a>";
					}
					else if($row1['sure']<=$anlık)
					{
						$sql="select * from kullanicilar"; 
						$result=mysqli_query($baglanti,$sql);
						while($row=mysqli_fetch_assoc($result))
						{
							if($_SESSION["kullanici"]==$row["kullanici_adi"])
							{	
							break;
							}
						}
						
						$yenipara=$row1["fiyat"]*$row1["adet"];
						$yenipara+=$row["bakiye"];
						$Guncelleurun= mysqli_query($baglanti,"UPDATE manav SET adet = 0 WHERE kullanici_adi = '$_SESSION[kullanici]' ");
						$Guncellepara= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$yenipara' WHERE kullanici_adi = '$_SESSION[kullanici]' ");
						echo "<br><br><a>Şuan Dükkanınız Boş Lütfen Ürün Satın Alın</a>";
						echo "<br><br><a href='urunsatınal.php'>Ürün Satın Al</a>";
					}
					else
					{
						$sure=$row1['sure'];
						$urun=$row1['urun'];
						$adet=$row1['adet'];
						$fiyat=$row1['fiyat'];
						echo "<h3>Ürün</h3>";
						echo "<a>$urun: $adet adet</a><br>";
				
						echo "<h3>Fiyat</h3>";
						echo "<a>$urun: $fiyat OP</a><br>";
						
						echo "<h3>Tükenme</h3>";
						echo "<a>$urun: $sure </a><br>";

						echo "<br><br><a href='manavfiyat.php' class='button'>Fiyat Güncelle</a><br>";
						echo "<a style='color:red'>Güncelleme İşleminden Sonra Tükenme Bilgileri Değişebilir.</a>";
						
					}
				}

				
				?>
			</div>
		</div>
		
	</body>
</html>