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
							$urunsec="select * from urunsat";
							$sira=mysqli_query($baglanti,$urunsec);
							$deger=mysqli_num_rows($sira);
								for($k=0;$k<=$deger;$k++)
								{	
									if(@$_POST[$k.'miktar'])
									{
										$miktar= (int) $_POST[$k];
										$fiyat= (int) $_POST[$k."_miktar"];
										$adet= (int) $_POST[$k."_adet"];
										$para = $fiyat*$miktar;
										$urun= (string) $_POST[$k."_urun"];
										$user= (string) $_POST[$k."_user"];
										if($para>$row["bakiye"])
										{
											echo "<script  type='text/javascript'>
												confirm('Yetersiz Bakiye İşlem Gerçekleştirilemiyor');
													</script>";
					
										}
										else
										{	
											if($urun=="meyve")
											{
												$dukkan="manav";
												$urun1="meyve";
											}
											else if($urun=="gübre")
											{
												$dukkan="bahce";
												$urun1="meyve";
											}
											else if($urun=="yem")
											{
												$dukkan="ciftlik";
												$urun1="gübre";
											}
											else
											{
												echo "<script  type='text/javascript'>
												confirm('Geçerli Ürün Bulunamadı');
													</script>";
			
											}
											$sorgu="select * from $dukkan";
											$s1=mysqli_query($baglanti,$sorgu);
											$kontrol=0;
											while($s2=mysqli_fetch_assoc($s1))
											{
												if($_SESSION["kullanici"]==$s2["kullanici_adi"])
												{
													$kontrol=1;
													if($s2["adet"]==0)
													{
														$eskipara="select * from kullanicilar";
														$bakiye=mysqli_query($baglanti,$eskipara);
														$fiyatkonrol=0;
														while($row2=mysqli_fetch_assoc($bakiye))
														{
															if($_SESSION["kullanici"]==$row2["kullanici_adi"])
															{
																$yenipara=$row2["bakiye"]-$para; 
																$GuncelleAl= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$yenipara' WHERE kullanici_adi = '$_SESSION[kullanici]' ");
																if($miktar<>0)
																{
																	$ekle=mysqli_query($baglanti,"UPDATE  $dukkan SET urun='$urun1',adet='$miktar' WHERE kullanici_adi='$_SESSION[kullanici]'");
																	if($ekle)
																	{
																		$konum=$dukkan.'fiyat.php';
																		header("Location:$konum");
																	}
																}
															}
															
															if($user==$row2["kullanici_adi"])
															{
															
																$yenipara=$row2["bakiye"]+$para;
																$GuncelleAl= mysqli_query($baglanti,"UPDATE kullanicilar SET bakiye = '$yenipara' WHERE kullanici_adi = '$user' ");
																$yeniadet=$adet-$miktar;
																
																$GuncelleAdet= mysqli_query($baglanti,"UPDATE urunsat SET adet ='$yeniadet' WHERE kullanici_adi = '$user' AND urun='$urun'");
																/*if($yeniadet<=0)
																{
																	$UrunSil= mysqli_query($baglanti,"DELETE from urunsat  WHERE adet = '$yeniadet' ");
																}*/
															}
														}
													}
													else
													{
														echo "<script  type='text/javascript'>
															confirm('Henüz Satılan Ürünleriniz Bulunmakta');
																</script>";
														break;
													}
												}
												
											}
											if($kontrol==0)
											{
												echo "<script  type='text/javascript'>
													confirm('Kullanıma Uygun Alanınız Bulunmamakta');
														</script>";	
											}
										}
									}
								}
	echo "<a href='urunsatınal.php' class='button'>Geri Dönmek İçin</a>"
?>