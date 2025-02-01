<?php
session_start();
if($_SESSION["kullanici"]==NULL)
{
	header("Location:hatasayfasi.php");
}
?>
<html>

	<head>
		<title>Svngame</title>
		<link rel="stylesheet" href="oyun.css">
	</head>
	
	<body background="wp.jpg">
	
		<div class="dukkan">
			
			<div class="dukkanadı" align="center">
			
				<div class="Manav-Baslık" >Manav</div>
				
					<div class="dukkanarayuz">
					
						<img src="manav.png" class="manav-resmi"><br>
						<a>Meyve ve sebze alarak dükkanınızı doldurun.<br>
						Bunları satıp kar elde edin ve gelişiminizi arttırın.</a>
					
					</div>
					
					<br>
					<form method="POST" action="dilkform.php">
					<div name="clearfix"></div>
					<input type="submit" value="Satın Al" name="ManavAl" class="ManavSatınAl">
					</form>
			</div>
		
		</div>
	
	</body>
	
</html>