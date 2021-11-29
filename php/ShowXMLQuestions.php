<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="x1">
  <div>
  <?php
    $xml=simplexml_load_file("../xml/Questions.xml") or die("Error: Cannot create object");
    echo '<table border="1"> <tr><th>Egilea</th><th>Enuntziatua</th><th>Erantzun zuzena</th></tr>';
    foreach($xml->assessmentItem as $assessmentItem){
      echo '<tr><td>'.$assessmentItem['author'].'</td><td>'.$assessmentItem->itemBody->p.'</td><td>'.$assessmentItem->correctResponse->response.'</td></tr>'; 
    }
    echo '</table>';
  ?>
  </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
