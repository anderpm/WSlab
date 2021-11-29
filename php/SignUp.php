<html>
<head>
  <?php include '../html/Head.html'?>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <script type="text/javascript" src="../js/isInWS.js"></script>
  <style>
	#image {
	    max-height: 200px;
	};
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php'?>
  <section class="main" id="s1">
    <?php
    function test_input($data) {
	$data = trim($data);
	return $data;
    }
    
    $validate = true;

    //include '../php/ClientVerifyEnrollment.php';
    if(isset($_POST['erreg'])){
	$mota = test_input($_POST['mota']);
	$eposta = test_input($_POST['eposta']);
	$deiturak = test_input($_POST['deiturak']);
	$pass1 = test_input($_POST['pwd']);
	$pass2 = test_input($_POST['pwd2']);

	$irregex = "/^[a-z A-Z]+(\.[a-z A-Z]+)@(ehu\.)((eus)|(es))$/";
	$ir2regex = "/^[a-z A-Z]+@(ehu\.)((eus)|(es))$/";
	$ikregex = "/^[a-z A-Z]+[0-9]{3}@(ikasle\.ehu\.)((eus)|(es))$/";
	$deiturakregex = "/^[a-z A-Z]{2,}\s[a-z A-z]{2,}$/";


	if($mota == 0){
	    $validate = false;
	    echo '<script type ="text/JavaScript">';  
	    echo 'alert("Erabiltzaile mota zehaztu behar da!")';
	    echo '</script>';
	}else if($mota == 1 && $validate == true){
	    if(!preg_match($irregex, $eposta) and !preg_match($ir2regex, $eposta)){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Irakasle eposta gaizki!")';
		echo '</script>';
	    }
	}else if($mota == 2 && $validate == true){
	    if(!preg_match($ikregex, $eposta)){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Ikasle eposta gaizki!")';
		echo '</script>';
	    }
	}    

	if($eposta == "" && $validate == true){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Eposta eremua hutsik dago!")';
		echo '</script>';
	}
	//if(enrollment() == "EZ" && $validate == true){
	//    $validate = false;
	//    echo '<script type ="text/JavaScript">';  
	//    echo 'alert("Ez da unibertsitateko ikaslea!")';
	//    echo '</script>';
	//}
	
	if(strlen($deiturak) == 0 && $validate == true){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Deiturak eremua hutsik dago!")';
		echo '</script>';
	}else if(!preg_match($deiturakregex, $deiturak) && $validate == true){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Deiturak bi hitz izan behar dute!")';
		echo '</script>';
	}

	if($pass1 != $pass2 && $validate == true){
		$validate = false;
		echo '<script type ="text/JavaScript">';  
		echo 'alert("Pasahitzak ez dira berdinak!")';
		echo '</script>';
	}


	if($validate == true){
	    //konexioa datu basera
	    $kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

		$cr = hash('sha256', $pass1);

	    $file = $_FILES['irudia']['name'];
	    if(strlen($file) == 0){
		$sql = "INSERT INTO users (eposta, deiturak, pasahitza, mota, argazkia) VALUES ('$eposta', '$deiturak', '$cr', $mota, NULL)";
	    }else{

	    $irudia = mysqli_real_escape_string($kon, file_get_contents($_FILES['irudia']['tmp_name']));
	    //$irudia = file_get_contents($_FILES['irudia']['tmp_name']);
	    $iruditam = $_FILES['irudia']['size'];
	   

	    if($iruditam > "65536"){
		echo "Irudiaren tamaina handiegia da datu basean sartzeko. (Max. 64KiB) . <br>";
		echo "<p>Saiatu berriro Erregistratzen <a href='SignUp.php'>hemen sakatuz</a></p><br>";
		exit();
	    }
	    
		$sql = "INSERT INTO users (eposta, deiturak, pasahitza, mota, argazkia) VALUES ('$eposta', '$deiturak', '$cr', $mota, '$irudia')";
	    }
	    if(!$kon->query($sql)){
		die('Errorea:' . $kon->error);
	    }

	    $kon->close();
	    echo '<script language="javascript">window.location.href="LogIn.php"</script>';
	}
    }
    ?>
    <div>
	<?php
	    if(isset($_GET['sesioa'])){
		$erab = $_GET['sesioa'];
	    }
	    if(isset($_GET['eposta'])){
		$z_eposta = $_GET['eposta'];
	    }
	?>

	<form id="signup" name="signup" method=POST enctype=multipart/form-data action="SignUp.php">
	    
	    <!--Erabiltzaile mota aukeratzeko-->
	    <label for="mota">Erabiltzaile mota zehaztu: *</label>
	    <select id="mota" name="mota" value="<?php echo $mota;?>">
	    <option value="0">-</option>
	    <option value="1">Irakasle</option>
	    <option value="2">Ikasle</option>
	    <option value="3">Admin</option>
	    </select><br>

	    <!--Eposta sartzeko eremua-->
	    <label for="eposta">Eposta: *</label>   
	    <input type="text" id="eposta" name="eposta" onblur="enrollment()"><div name="wserakutsi" id="wserakutsi"> </div><br>
	    <!--<input type="text" id="eposta" name="eposta" value="<?php echo $eposta;?>" onblur="enrollment()"><div name="wserakutsi" id="wserakutsi"> </div><br>-->

	    <!--Deitural sartzeko eramua-->
	    <label for="deiturak">Deiturak: *</label>
	    <input type="text" id="deiturak" name="deiturak" value="<?php echo $deiturak;?>"></input><br>

	    <!--Eposta sartzeko eremua-->
	    <label for="pwd">Pasahitza: *</label>   
	    <input type="password" id="pwd" name="pwd" value="<?php echo $pass1;?>"><br>
	    
	    <!--Eposta sartzeko eremua-->
	    <label for="pwd2">Errepikatu pasahitza: *</label>   
	    <input type="password" id="pwd2" name="pwd2" value="<?php echo $pass2;?>"><br>

	    <label for="irudia">Irudia:</label>
	    <input type="file" name="irudia" accept=".jpg,.png,.jpeg" id="irudia" size="40" onchange="loadFile(event)"><br>
	    <img id="image" name="image" /><br>	

	    <input type="submit" name="erreg" id="erreg" value="Erregistratu">
	    <input type="reset" name="clear" id="clear" onclick="garbituIrudia();" value="Garbitu eremuak" >
	</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>