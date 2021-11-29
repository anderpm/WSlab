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
	    if(isset($_GET['sesioa'])){
		$erab = $_GET['sesioa'];
		$epost = $_GET['eposta'];
	    }
		function test_input($data) {
			$data = trim($data);
			return $data;
		}


		$send = true;
		$z_email = $z_galdera = $z_zuzen = $z_oker1 = $z_oker2 = $z_oker3 = $z_zail = $z_arloa = "";

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$z_email = test_input($_POST["eposta"]);
			$z_galdera = test_input($_POST["galdera"]);
			$z_zuzen = test_input($_POST["zuzen"]);
			$z_oker1 = test_input($_POST["oker1"]);
			$z_oker2 = test_input($_POST["oker2"]);
			$z_oker3 = test_input($_POST["oker3"]);
			$z_zail = test_input($_POST["zail"]);
			$z_arloa = test_input($_POST["arloa"]);

			if(strlen($z_email)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Emaila jarri behar da")';
				echo '</script>';
				$send = false;
			}/* else if(strcmp($z_email, $epost) != 0){
				echo $z_email . " = " . $epost;
				echo '<script type = "text/JavaScript">';
				echo 'alert("Eposta ez da zuzena, erabili zure erabiltzailea!")';
				echo '</script>';
				$send = false;
			}*/else if((preg_match("/([a-z A-Z]+[0-9]{3}@(ikasle.ehu.)+[eus|es])/", $z_email))){
				echo '<script type = "text/JavaScript">';
				echo 'console.log("Eposta onartuta1")';
				echo '</script>';
			} else if((preg_match("/([a-z A-Z]+(\.[a-z A-Z]|[a-z A-Z])+@(ehu\.)+[eus|es])/", $z_email))){
				echo '<script type = "text/JavaScript">';
				echo 'console.log("Eposta onartuta2")';
				echo '</script>';
			} else{
				echo '<script type = "text/JavaScript">';
				echo 'alert("Eposta ondo jarri")';
				echo '</script>';
				$send = false;
			}

			if(strlen($z_galdera)<10){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Galdera gutxienez 10eko luzera izan behar du")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_zuzen)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Erantzun zuzena jarri behar da")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_oker1)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Erantzun okerra jarri behar da")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_oker2)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Erantzun okerra jarri behar da")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_oker3)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Erantzun okerra jarri behar da")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_zail)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Zailtasuna jarri behar da")';
				echo '</script>';
				$send = false;
			}
			else if(strlen($z_arloa)==0){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Arloa jarri behar da")';
				echo '</script>';
				$send = false;
			}
			
			if($send == true){
				echo '<script type = "text/JavaScript">';
				echo 'alert("Galdera ondo jaso da")';
				echo '</script>';
			}
		}

		if($send == true){
		//Konexioa ireki
		$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);

		if(empty($_FILES['irudia']['name'])){
			$sql = "INSERT INTO questions (eposta, galdera, eZuzen, eOker1, eOker2, eOker3, zailtasuna, gaia) VALUES ('$_POST[eposta]', '$_POST[galdera]', '$_POST[zuzen]', '$_POST[oker1]', '$_POST[oker2]', '$_POST[oker3]', $_POST[zail], '$_POST[arloa]')";
		} else {
			$irudia = mysqli_real_escape_string($kon, file_get_contents($_FILES['irudia']['tmp_name']));
			//$irudia = file_get_contents($_FILES['irudia']['tmp_name']);
			$iruditam = $_FILES['irudia']['size'];
	
			if($iruditam > "65536"){
				echo "Irudiaren tamaina handiegia da datu basean sartzeko. (Max. 64KiB) . <br>";
				echo '<p>Saiatu berriro galdera sartzen <a href="QuestionFormWithImage.php">hemen sakatuz</a></p><br>';
				exit();
			}

			$sql = "INSERT INTO questions (eposta, galdera, eZuzen, eOker1, eOker2, eOker3, zailtasuna, gaia, argazkia) VALUES ('$_POST[eposta]', '$_POST[galdera]', '$_POST[zuzen]', '$_POST[oker1]', '$_POST[oker2]', '$_POST[oker3]', $_POST[zail], '$_POST[arloa]', '$irudia')";
		}
		
	    if(!$kon->query($sql)){
		die('Errorea:' . $kon->error);
	    }

		$kon->close();
				    //echo '<script language="javascript">window.location.href="QuestionFormWithImage.php?sesioa='.$erab.'</script>';

		    //------------------------ XML -------------------------
		   


		    
		    $xml = simplexml_load_file('../xml/Questions.xml');

		    if(!isset($xml)){
			echo '<script type = "text/JavaScript">';
			echo 'alert("XML fitxategia ez da aurkitu")';
			echo '</script>';
		    }


		    $assessmentItem = $xml->addChild('assessmentItem');
		    		    
		    $itemBody = $assessmentItem->addChild('itemBody');
		    $itemBody->addChild('p', $_POST['galdera']);
		    
		    $assessmentItem->addAttribute('author', $_POST['eposta']);
		    $assessmentItem->addAttribute('subject', $_POST['arloa']);

		    $correctResponse = $assessmentItem->addChild('correctResponse');
		    $correctResponse->addChild('response', $_POST['zuzen']);

		    $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
		    $incorrectResponses->addChild('response', $_POST['oker1']);
		    $incorrectResponses->addChild('response', $_POST['oker2']);
		    $incorrectResponses->addChild('response', $_POST['oker3']);

		    
		    $domxml = new DOMDocument('1.0');

		    $domxml->preserveWhiteSpace = false;

		    $domxml->formatOutput = true;


		    $domxml->loadXML($xml->asXML());

		    $domxml->save('../xml/Questions.xml');
		    

		    //------------------------ XMLN'T -------------------------
		    //------------------------ JSON -------------------------
		    $data = file_get_contents('../json/Questions.json');

		    if(!isset($data)){
			echo '<script type = "text/JavaScript">';
			echo 'alert("JSON fitxategia ez da aurkitu")';
			echo '</script>';
		    }

		    $array = json_decode($data);
		    $galdera = new stdClass();
		    $galdera->subject=$_POST['arloa'];
		    $galdera->author=$_POST['eposta'];
		    $galdera->itemBody=array('p'=>$_POST['galdera']);
		    $galdera->correctResponse=array('response'=>$_POST['zuzen']);
		    $galdera->incorrectResponse=array('response'=>array($_POST['oker1'], $_POST['oker2'], $_POST['oker3']));
		    $galderaarray[0] = $galdera;
		    array_push($array->assessmentItems, $galderaarray[0]);
		    $jsonData = json_encode($array);
		    $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
		    $jsonData = str_replace(',', ','.PHP_EOL, $jsonData);
		    $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
		    file_put_contents("../json/Questions.json", $jsonData);

		    //------------------------ JSON'T -------------------------
		echo "Galdera ondo bidali da";
		echo "<p>Galdera berri bat gahitzeko <a href='QuestionFormWithImage.php?sesioa=".$erab."&eposta=".$epost."'>hemen sakatu</a></p><br>";
		echo "<p>Irudirik gabe galderak ikusteko <a href='ShowQuestions.php?sesioa=".$erab."'>hemen</a></p><br>";
		echo "<p>Galderak irudiekin ikusteko <a href='ShowQuestionsWithImage.php?sesioa=".$erab."'>hemen</a></p><br>";
		}else{
		    echo "<p>Galdera zuzentzeko sakatu <a href='QuestionFormWithImage.php?sesioa=".$erab."&eposta=".$z_email."&galdera=".$z_galdera."&zuzen=".$z_zuzen."&oker1=".$z_oker1."&oker2=".$z_oker2."&oker3=".$z_oker3."&arloa=".$z_arloa."'>hemen sakatu</a></p><br>";


		}
		

	?>
	        </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
