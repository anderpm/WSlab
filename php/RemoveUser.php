<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php'?>
  <section class="main" id="s1">
    <div>
	
	<?php

	    if(isset($_GET['eposta'])){
		$eposta = $_GET['eposta'];
	    }
		//Konexioa ireki
		$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);


		$sql = 'DELETE FROM users WHERE eposta="'.$eposta.'"';		
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
