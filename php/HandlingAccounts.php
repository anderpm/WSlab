<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="shortcut icon" href="#">

</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php'?>
  <section class="main" id="s1">

    <div>
     <?php
      
	$kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
	
	$sql = "SELECT * FROM users WHERE mota=1 or mota=2;";
	$res = mysqli_query($kon, $sql);

	if(!$kon->query($sql)){
		die('Errorea:' . $kon->error);
	}
	
       
	echo '<table border=3> <tr> <th>EPOSTA</th> <th>DEITURAK</th> <th>PASAHITZA</th> <th>MOTA</th> <th>ARGAZKIA</th> <th>PERMUTATU</th> <th>EZABATU</th> </tr>';
	
	
	//echo '<script>';
	//echo '<echo 'function ezabatu(eposta){';
	//echo '<echo 'var url = "RemoveUser.php?eposta=" + eposta;';
	//echo '<echo 'window.location.href=url;';
	//echo '<echo '}';    
	//echo '<echo '</script>';
	
	while($row= $res->fetch_object()){
	  echo'<tr><td>'.$row->eposta.'</td>';
	  echo'<td>'.$row->deiturak.'</td>';
	  echo '<td>'.$row->pasahitza.'</td>';
	  echo '<td>'.$row->mota.'</td>';
	  echo '<td>'. '<img src="data:image/jpeg;base64,'.base64_encode( $row->argazkia ).'" width="50"/>'. '</td>';
	  echo '<td>'. '<form action="ChangeUserState.php?eposta='. $row->eposta .'&permu='.$row->permu.'" method="post"><input type="submit" name="permu" id="permu" value="'.$row->permu.'"> </form>'.'</td>';
	  //echo '<td>'. '<input type="button" name="permu" id="permu" value="'.$row->permu.'">'.'</td>';
	  echo '<td>'. '<form action="RemoveUser.php?eposta='. $row->eposta .'" method="post"><input type="submit" name="permu" id="permu" value="Ezabatu"> </form>'.'</td></tr>';
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
