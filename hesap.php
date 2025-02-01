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
			padding: 15px 32px;
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
		
		@media(min-width:900)
		{
			box-sizing:border-box;
		}
	
	</style>
	
	<body>
		
		<ul>
		
			<li>
				<a href="hesap.php"><b class='active'><?php echo "Hesap Bilgileri: ".$_SESSION["kullanici"];?></b></a>
			</li>
			
			<li >
				<b style='color:yellow'><?php $sql="select * from kullanicilar WHERE kullanici_adi='$_SESSION[kullanici]'"; 
								$result=mysqli_query($baglanti,$sql);
								$balance=mysqli_fetch_assoc($result);
								echo $balance["bakiye"]." OP";?></b>
			</li>
			
			<li>
				<a href="urunsatınal.php"><b style='color:#ffcc99' >Ürün Satın Al</b></a>
			</li>
			
			<li>
				<a href="dükkanlarım.php"><b style='color:#ffe1ff'>Dükkanlarım</b></a>
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
			
			<table border='solid' width='200px' align='center'>
			
						<form action='hesapform.php' method='POST'>
						<tr>
						<th>Kullanıcı Adı</th>
						<th>İsim</th>
						<th>Soyisim</th>
						<th>Eposta</th>
						<th>Şifre</th>
						</tr>
						<tr><?php
						$sql="select * from kullanicilar"; 
						$result=mysqli_query($baglanti,$sql); 
						$count=mysqli_num_rows($result); 
						if($count)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								if($_SESSION["kullanici"]==$row["kullanici_adi"])
								{	
								echo "<th>".$row['kullanici_adi']."</th>";
								echo "<th>".$row["isim"]."</th>";
								echo "<th>".$row["soyisim"]."</th>";
								echo "<th>".$row["email"]."</th>";
								break;
								}
							}
						}
						?>
						
						<th><input type='password' name='sifre'>
						<input type='password' name='sifretekrar'>
						<input type='submit' value='Değiştir' class='button'></th>
						</tr>
						</form>
			</table>
		
	</body>

</html>