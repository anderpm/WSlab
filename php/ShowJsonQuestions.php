<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="x1">
  <div>
  <center><table name="taula" id="taula" border="1"><tr><th>Egilea</th><th>Enuntziatua</th><th>Erantzun zuzena</th><tr>
  <?php
    
    $data = file_get_contents("../json/Questions.json");
    $array = json_decode($data);
    
    //echo '<body>';
    //echo '<p><center><table name="taula" id="taula" border="1"><tr><th>Egilea</th><th>Enuntziatua</th><th>Erantzun zuzena</th><tr>';
    foreach($array->assessmentItems as $assessmentItems){
    $egilea = $assessmentItems->author;
    $enuntziatua=$assessmentItems->itemBody->p;
    $zuzena=$assessmentItems->correctResponse->response;
    echo '<tr><td>' . $egilea . '</td><td>' . $enuntziatua . '</td><td>' . $zuzena . '</td></tr>';
    }
    //echo '</table></center>';
    //echo '</body>';

  ?>

  </table></center>
  </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
