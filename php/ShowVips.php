<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <!--<script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>-->
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
	    if(isset($_GET['sesioa'])){
		$erab = $_GET['sesioa'];
		$epost = $_GET['eposta'];
	    }
	    if(isset($_GET['eposta'])){
		$z_eposta = $_GET['eposta'];
	    }
	?>

	<h1>Uneko VIPak zerrendatzeko REST bezeroa:</h1>

	<?php
		$curl = curl_init();
		$url = "https://sw.ikasten.io/~T58/Rest/vipusers.php";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$str = curl_exec($curl);
		echo $str;
	?>
		
	</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
