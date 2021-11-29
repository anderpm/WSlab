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

	<form id="vipF" name="vipF" method="POST" enctype="multipart/form-data" action="<?php echo "DeleteVip.php?sesioa=".$erab."&eposta=".$epost?>">
	<label for="email"> Email* :</label>   
	<input type="text" id="email" name="email"></input>
	<input type="submit" name="bidali" id="bidali" value="VIPa ezabatu"></input><br>

	<?php
		if(isset($_POST['email'])){
		    $email = $_POST['email'];
		    $curl = curl_init();
		    $url = "https://sw.ikasten.io/~T58/Rest/vipusers.php?id=$email";
		    curl_setopt($curl, CURLOPT_URL, $url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		    $str = curl_exec($curl);
		    echo $str;
		    curl_close($curl);
		}
	?>
		
	</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
