<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php
	if(isset($_SESSION['kau'])){
	    $kau = $_SESSION['kau'];
	    echo "<div>"; 
	    echo "<h2>Quiz: galderen jokoa</h2><br>";
	    echo "</div>";
	}else{
	    echo "<div>"; 
	    echo "<h2>Quiz: galderen jokoa</h2><br>";
	    echo "</div>";
	}
    ?>
    
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
