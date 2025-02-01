<!DOCTYPE html>

<html>

	<head>

		<title>Giriş Ekranı</title>
		
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
		
		@media(min-width:900)
		{
			box-sizing:border-box;
		}
		
		li:last-child 
		{
			border-right: none;
		}
		
		li b:hover:not(.active) {
			
			background-color: #111;
			animation-name: example;
			animation-duration: 2s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
			
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
			border-radius: 15px 15px 50px 50px;
			width: 100%;
		}
		
		.button:hover{
			
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
			
		}
		
		
	
	</style>
	
	<body>
	
		<ul>
		
			<li>
				<b style="color:aqua">Hesap Bilgileri</b>
			</li>
			
			<li >
				<b style='color:yellow'>000000 OP</b>
			</li>
			
			<li>
				<b style='color:#ffcc99' >Ürün Satın Al</b>
			</li>
			
			<li>
				<b style='color:#ffe1ff'>Dükkanlarım</b>
			</li>
			
			<li>
				<b style='color:#00ff00'>Dükkan Satın Al</b>
			</li>
			
			<li>
				<b style='color:orange'>S.S.S</b>
			</li>
			
			<li style="float:right">
				<b class="active">Giriş Yap</b>
			</li>
		
		</ul>
			
		<br><br><h1 style="color:#00ffff"; align="center" >SVNGame'e Hoş Geldiniz.</h1>
	
	<div class="dis">
		<div class="anasayfa-kullanıcı-paneli">
			
			<div class="giris">	
				<div class="form-baslık" style="color:white">Giriş Yap</div>
					<form method="POST" action="girisform.php">
						<input type="text"; placeholder="Kullanıcı Adı"; name="Kullanici">
						
						<input type="password"; placeholder="Şifre"; name="Sifre">
						
						<input type="submit" value="Giriş Yap" name="GirisYap" class="button">
						<!--<a target="_blank" href="şifremiunuttum.html">Şifremi Unuttum</a>-->
					</form>
			</div>
			
	
			<div class="kayıt-ol">
			<div class="form-baslık" style="color:white">Kayıt Ol</div>
				<form method="POST" action="kayıtform.php">
						<input type="text"; placeholder="İsim"; name="Isim">
						
						<input type="text"; placeholder="Soyisim"; name="Sisim">
						
						<input type="text"; placeholder="Kullanıcı Adı"; name="Kadi">
						
						<input type="email"; placeholder="E-Mail"; name="email">
						
						<input type="password"; placeholder="Şifre"; name="sifre">
						
						<input type="password"; placeholder="Şifre Tekrar"; name="sifretekrar">
						
						<input type="submit" value="Kayıt Ol" name="KayıtOl" class="button">
				</form>
						
			</div>
		
		</div>
	
	</div>

	</body>

</html>