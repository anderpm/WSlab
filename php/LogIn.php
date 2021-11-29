<html>
<head>
  <?php include '../html/Head.html'?>
  <!--<script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuestionJQ.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <style>
	#image {
	    max-height: 200px;
	};
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<?php
	include '../php/DbConfig.php';
	echo '<h2>Hasi Saioa</h2>';
	if(isset($_POST['login'])){

		$eposta = $_POST['eposta'];	
		$pass = $_POST['pass'];	

		$cr = hash('sha256', $pass);
		//echo "<script>console.log('$cr' );</script>";

		$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
       
		$sql = "SELECT * FROM users WHERE eposta='$eposta' AND pasahitza='$cr'";
		$res = mysqli_query($kon, $sql);
	
		if(!$kon->query($sql)){
			die('Errorea:' . $kon->error);
		}
    
		$numrows = mysqli_num_rows($res);

		if($numrows != 0){
		    while($row= $res->fetch_object()){
			$izena = $row->deiturak;
			$epost = $row->eposta;
			$mota = $row->mota;
			$permu = $row->permu;
		    }
		    session_start();
		    $_SESSION['eposta'] = $epost;
		    $_SESSION['deiturak'] = $izena;
		    $_SESSION['mota'] = $mota;
		    $_SESSION['kau'] = "BAI";
			if($permu == ON){
				if($mota == 1 || $mota == 2){
					echo '<script language="javascript">window.location.href="HandlingQuizesAjax.php"</script>';
				}else{
					echo '<script language="javascript">window.location.href="Layout.php"</script>';
					//echo '<script language="javascript">window.location.href="Layout.php?sesioa='.$izena.'&eposta='.$epost.'"</script>';
				}
			}else{
				echo '<script type ="text/JavaScript">';  
				echo 'alert("Datu horiekin ez zaude erregistratuta! Saiatu berriro")';
				echo '</script>';
			}
		}else{
			
			$_SESSION['kau'] = "EZ";
			echo '<script type ="text/JavaScript">';  
			echo 'alert("Errorea, Erabiltzailea edo pasahitza ez dira zuzenak!")';
			echo '</script>';
		}

		
			
		$res->close();
		$kon->close();
	}
	?>
	<form id="loginF" name="loginF" method=POST enctype=multipart/form-data>
	    
	    <!--Eposta sartzeko eremua-->
	    <label for="eposta">Eposta: *</label>   
	    <input type="text" id="eposta" name="eposta"><br>

	    <!--Testerako galdera sartzeko eramu handia-->
	    <label for="pass">Pasahitza: *</label>
	    <input type="password" id="pass" name="pass"></input><br>

	    <input type="submit" value="Bidali" name="login">
	    <input type="reset" name="clear" id="clear" value="Garbitu" >
	    <!--<input type="reset" name="clear" id="clear" onclick="garbitudena();" value="Garbitu" >-->
	</form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
