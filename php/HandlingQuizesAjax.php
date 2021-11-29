<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <!--<script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/JsonQuestionsCounter.js"></script>
  <script type="text/javascript" src="../js/AddQuestionAjax.js"></script>
  <link rel="shortcut icon" href="#">

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
	<input type=button value="Ikusi JSON galderak" onclick="datuakEskatu()"><br>
	<div>
	    <span>Nire Galderak / Galderak guztira: </span><span name="galderakont" id="galderakont"></span><span>/</span><span name="galderak" id="galderak"></span>
	</div>
    </div>

    <div>
	<?php
	    if(isset($_GET['sesioa'])){
		$erab = $_GET['sesioa'];
		$epost = $_GET['eposta'];
	    }
	    if(isset($_SESSION['eposta'])){
		$z_eposta = $_SESSION['eposta'];
		$z_galdera = $_GET['galdera'];
		$z_zuzen = $_GET['zuzen'];
		$z_oker1 = $_GET['oker1'];
		$z_oker2 = $_GET['oker2'];
		$z_oker3 = $_GET['oker3'];
		$z_arloa = $_GET['arloa'];
	    }
	?>
	    <form id="galderenF" name="galderenF" method=POST enctype=multipart/form-data action="AddQuestionWithImage.php">

	    <!--Eposta sartzeko eremua-->
	    <label for="eposta">Eposta: *</label>   
	    <input type="text" id="eposta" name="eposta" value="<?php echo $z_eposta;?>"><br>

	    <!--Testerako galdera sartzeko eramu handia-->
	    <label for="galdera">Galdera: *</label>
	    <input type="text" id="galdera" name="galdera" value="<?php echo $z_galdera;?>"></input><br>

	    <!--Erantzun zuzena sartzeko eremua-->
	    <label for="zuzen">Erantzun zuzena: *</label>
	    <input type="text" id="zuzen" name="zuzen" value="<?php echo $z_zuzen;?>"></input><br> 

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker1">Erantzun oker bat sartu: *</label>
	    <input type="text" id="oker1" name="oker1" value="<?php echo $z_oker1;?>"></input><br>

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker2">Erantzun oker bat sartu: *</label>
	    <input type="text" id="oker2" name="oker2" value="<?php echo $z_oker2;?>"></input><br>

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker3">Erantzun oker bat sartu: *</label>
	    <input type="text" id="oker3" name="oker3" value="<?php echo $z_oker3;?>"></input><br>

	    <!--Zailtasuna aukeratzeko-->
	    <label for="zail">Galderaren zailtasuna zehaztu: *</label>
	    <select id="zail" name="zail">
	    <option value="0">-</option>
	    <option value="1">Txikia</option>
	    <option value="2">Ertaina</option>
	    <option value="3">Handia</option>
	    </select><br>

	    <!--Galderaren gai arloa zehazteko eremua-->
	    <label for="arloa">Galderaren gai-arloa: *</label>
	    <input type="text" id="arloa" name="arloa" value="<?php echo $z_arloa;?>"><br>

	    <!--Irudia igotzeko eremua-->
	    <label for="irudia">Irudia:</label>
	    <input type="file" name="irudia" accept=".jpg,.png,.jpeg" id="irudia" size="40" onchange="loadFile(event)"><br>
	    <img id="image" name="image" /><br>	

	    <input type="button" name="bidali" id="bidali" value="Bidali">
	    <input type="reset" name="clear" id="clear" value="Garbitu" >
	    <!--<input type="reset" name="clear" id="clear" onclick="garbitudena();" value="Garbitu" >-->
	</form>
	<div id="output" name="output">
		<?php echo "<p>Bidalketaren feedbacka...</p>"; ?>
	</div>

    </div>
    <div id="taulaErakutsi" name="taulaErakutsi">
    </div>

  </section>
  <?php include '../html/Footer.html' ?>

</body>

</html>
