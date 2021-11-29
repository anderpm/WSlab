<!DOCTYPE html>
<html>
<head>
    <?php include '../html/Head.html'?>
	<style> 
            #Unai {
                float:left; 
                width:50%;
                height:280px;
            }
		#Ander {
                float:right; 
                width:50%;
                height:280px;
            }
	</style>		
</head>
<body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
	<div>
	<h2>EGILEEN DATUAK</h2><br><br><br>
	<div id = "Unai">
	    <h3>Unai Fernandez</h3>
	    <br>
	    <p>Espezialitatea:</p>
	    <p>Konputagailuen Igeniaritza</p>
	    <p>Irun, Gipuzkoa</p><br>
		<img src="../images/Unai.jpg" alt="Unai avatar" width="94" height="66">
	</div>
	<div id = "Ander">
	    <h3>Ander Pollacino</h3>
	    <br>
	    <p>Espezialitatea:</p>
	    <p>Software Ingeniaritza</p>
	    <p>Donostia, Gipuzkoa</p><br>
		<img src="../images/Ander.jpg" alt="Ander avatar" width="88" height="88">
	</div>
	</div>
    </section>
    <?php include '../html/Footer.html' ?>
</body>
</html>
