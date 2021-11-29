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
      
	$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
       
	$sql = "SELECT * FROM questions;";
	$res = mysqli_query($kon, $sql);

	if(!$kon->query($sql)){
		die('Errorea:' . $kon->error);
	}
	
       
	echo '<table border=3> <tr> <th>EPOSTA</th> <th>GALDERA</th> <th>ZUZENA</th> <th>OKERRA1</th> <th>OKERRA2</th> <th>OKERRA3</th> 
          <th>ZAILTASUNA</th> <th>GAIA</th></tr>';
	
	while($row= $res->fetch_object()){
          echo'<tr><td>'.$row->eposta.'</td><td>'.$row->galdera.'</td><td>'.$row->eZuzen.'</td><td>'.$row->eOker1.'</td><td>'.$row->eOker2.'</td><td>'.$row->eOker3.'</td><td>'.$row->zailtasuna.'</td><td>'.$row->gaia.'</td></tr>';
        }
	echo '</table>';

	$res->close();
        $kon->close();
        
      ?>
	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
