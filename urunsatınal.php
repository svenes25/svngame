<?php
	
	include("baglan.php");
	session_start();
	ob_start();
	if($_SESSION["kullanici"]==NULL)
	{
		header("Location:hatasayfasi.php");
	}
?>
<html>

	<head>
	
		<title>SVNGame</title>
		
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
		
		@media(min-width:900)
		{
			box-sizing:border-box;
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
		
		.button:hover{
			
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			
		}
		
	</style>

	<body>
	
		<ul>
		
			<li>
				<a href="hesap.php"><b style='color:aqua'><?php echo "Hesap Bilgileri: ".$_SESSION["kullanici"];?></b></a>
			</li>
			
			<li >
				<b style='color:yellow'><?php $sql="select * from kullanicilar WHERE kullanici_adi='$_SESSION[kullanici]'"; 
								$result=mysqli_query($baglanti,$sql);
								$balance=mysqli_fetch_assoc($result);
								echo $balance["bakiye"]." OP";?></b>
			</li>
			
			<li>
				<a href="urunsatınal.php"><b class="active">Ürün Satın Al</b></a>
			</li>
			
			<li>
				<a href="dükkanlarım.php"><b style='color:#ffe1ff'>Dükkanlarım</b></a>
			</li>
			
			<li>
				<a href="satınal.php"><b style='color:#00ff00'>Dükkan Satın Al</b></a>
			</li>
			
			<li>
				<a href="sss.php"><b style="color:orange">S.S.S</b></a>
			</li>
			
			<li style="float:right">
				<a href="cikis.php"><b style='color:red'>Çıkış Yap</b></a>
			</li>
		
		</ul>
			
			<br><br><br><br>
			
			<div class="dukkan">
			
				<div class="dukkanadı"><h3 style="color:red" align="center">Ürünler</h3></div>
				
					<div class="dukkanarayuz">
				
						<table border="solid" width="200px" align="center">
								<?php
								echo "<form action='urunsatınal.php' method='POST'>";
								echo "<tr>";
								echo "<th colspan='4'><label for='dukkan'>Dükkan Seç:</label>
										<select name='dukkan'>
										<option value=''>---------</option>
										<option value='meyve'>Manav</option>
										<option value='gübre'>Bahçe</option>
										<option value='yem'>Çiftlik</option></th>"	;
								echo "<th colspan='2'><input type='submit' value='Seç' name='filtre' class='button'></th>";
								echo "</tr>";
								echo "</form>";
								if(isset($_POST["filtre"]))
								{

									echo "<form action='urunsatınalform.php' method='POST'>";
									echo "<tr>
										<th>Kullanıcı</th>
										<th>Ürün</th>
										<th>Adet</th>
										<th>Fiyat</th>
										<th>Miktar</th>
										<th>Satın AL</th>
									</tr>";
										
										$urunsec="select * from urunsat";
										$sira=mysqli_query($baglanti,$urunsec);
										$deger=mysqli_num_rows($sira);
										$al=array();
										$input=array();
										$op=array();
										if($deger)
										{
											$i=1;
											while($satir=mysqli_fetch_assoc($sira))
											{
												if($_POST["dukkan"]==$satir["urun"])
												{
													$al[$i]= $i.'miktar';
													$user[$i]=$satir['kullanici_adi'];
													$urun[$i]=$satir["urun"];
													$adet[$i]=$satir["adet"];
													$fiyat[$i]=$satir["fiyat"];
													if($adet[$i]==0)
													{
														continue;
													}
													echo "<tr>";
													echo "<th name='$user[$i]'>$satir[kullanici_adi]</th>";
													echo "<th name='$urun[$i]'>$satir[urun]</th>";
													echo "<th name='$adet[$i]'>$satir[adet]</th>";
													echo "<th name='$fiyat[$i]'>$satir[fiyat]</th>";
													echo "<div name='clearfix'></div>";
													echo "<th><input type='hidden' value='$fiyat[$i]' name='$i.miktar'><input type='hidden' value='$adet[$i]' name='$i.adet'><input type='number' value='miktar' name='$i' min='1' max='$satir[adet]'></th>";
													echo "<div name='clearfix'></div>";
													echo "<th><input type='hidden' value='$urun[$i]' name='$i.urun'><input type='hidden' value='$user[$i]' name='$i.user'><input type='submit' value='Satın AL' name='$al[$i]' class='button'></th>";
													echo "</tr>";
												}
												$i++;
											}
										}
										else
										{
											echo "Şuan Satışta Ürün Bulunmamakta";
										}
								}	
								?>
						</table>
						
					</div>
			
			</div>
		
		</table>
		
		
		
		
	</body>
	
</html>