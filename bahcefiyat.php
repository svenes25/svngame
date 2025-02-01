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
	
		<title>SVNGAME</title>
		<link rel="stylesheet" href="oyun.css">
		
	</head>
	
	<style>
	
		body{
			background: url(wp.jpg) no-repeat center center  fixed; background-size: cover
		}
		
		.button {
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
		
		@media(min-width:900)
		{
			box-sizing:border-box;
		}
	
	</style>
	
	<body>
		<table border='solid' width='200px' align='center'>
			
			<form method='POST' action="bahcefiyatform.php">
			<tr>
			<th>Fiyat Girin</th>
			</tr>
			<tr>
			<th><input type="number" min=1, name="fiyat"><br><input type='submit' value='Değiştir' name='buton' class="button"></th>
			</tr>
			
		</table>
	
	</body>

</html>