<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="shortcut icon" href="#">

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php'?>
  <section class="main" id="s1">
    <div>
	
	<?php
		echo "<script>console.log('AA' );</script>";

	    if(isset($_GET['eposta'])){
		$eposta = $_GET['eposta'];
		$permu = $_GET['permu'];
	    }
		//Konexioa ireki
		$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

		echo "<script>console.log('$permu');</script>";


		if($permu == "ON"){
			$sql = 'UPDATE `users` SET `permu`= "OFF" WHERE eposta = "'.$eposta.'"';
		} else{
			$sql = 'UPDATE `users` SET `permu`= "ON" WHERE eposta = "'.$eposta.'"';
		}


		//$sql = 'DELETE FROM users WHERE eposta="'.$eposta.'"';		
		if(!$kon->query($sql)){
		    die('Errorea:' . $kon->error);
		}

		$kon->close();
		echo '<script language="javascript">window.location.href="KudeatuErabiltzaileak.php"</script>';

	?>
	        </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

