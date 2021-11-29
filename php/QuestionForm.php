<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

	<form id="galderakF" name="galderakF" method=POST enctype=multipart/form-data onsubmit="validate();">
	    
	    <!--Eposta sartzeko eremua-->
	    <label for="eposta">Eposta: *</label>   
	    <input type="text" id="eposta" name="eposta"><br>

	    <!--Testerako galdera sartzeko eramu handia-->
	    <label for="galdera">Galdera: *</label>
	    <input type="text" id="galdera" name="galdera"></input><br>

	    <!--Erantzun zuzena sartzeko eremua-->
	    <label for="zuzen">Erantzun zuzena: *</label>
	    <input type="text" id="zuzen" name="zuzen"></input><br> 

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker1">Erantzun oker bat sartu: *</label>
	    <input type="text" id="oker1" name="oker1"></input><br>

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker2">Erantzun oker bat sartu: *</label>
	    <input type="text" id="oker2" name="oker2"></input><br>

	    <!--Erantzun oker bat sartzeko eremua-->
	    <label for="oker3">Erantzun zuzena: *</label>
	    <input type="text" id="oker3" name="oker3"></input><br>

	    <!--Zailtasuna aukeratzeko-->
	    <label for="zail">Galderaren zailtasuna zehaztu: *</label>
	    <select id="zail" name="zail">
	    <option value="1">Txikia</option>
	    <option value="2">Ertaina</option>
	    <option value="3">Handia</option>
	    </select><br>

	    <!--Galderaren gai arloa zehazteko eremua-->
	    <label for="arloa">Galderaren gai-arloa: *</label>
	    <input type="text" id="arloa:" name="arloa" ><br>

	    <!--Irudia igotzeko eremua-->
	    <label for="Irudia">Irudia:</label>
	    <input type="file" name="Irudia" size="40"><br>

	    <input type="submit">
	</form>


	  Irudirik gabeko galdera baten datuak erabiltzaileak sar ditzan <br/>
      beharrezkoa den formularioa eta scriptak (gidoia/k) gehitu
	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
