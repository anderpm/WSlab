<div id='page-wrap'>
<header class='main' id='h1'>
  <?php include '../php/DbConfig.php'?>
  <?php
    session_start();
    if(isset($_SESSION['eposta'])){
      $erab = $_SESSION['eposta'];
      if(strlen($erab) != 0){

        $kon = new mysqli($zerbitzaria, $erabiltzailea, $gakoa, $db);
        $sql = "SELECT * FROM questions;";
        $res = mysqli_query($kon, $sql);
        if(!$kon->query($sql)){
          die('Errorea:' . $kon->error);
        }
        $row= $res->fetch_object();
        $irudia = $row -> argazkia;
        $res->close();
        $kon->close();

        if($irudia != null){
          echo '<img src="data:image/jpg;base64,'.base64_encode($irudia).'"width="45"/>';
          echo " ";
        }
        echo $erab." ";
        echo "(".'<span class="right"><a href="LogOut.php">Logout</a></span>'.")";
      }
    }else{
      echo '<span class="right"><a href="SignUp.php">Erregistratu</a></span>';
      echo " ";
      echo '<span class="right"><a href="LogIn.php">Login</a></span>';
      echo '<span class="right" style="display:none;"><a href="/logout">Logout</a></span>';
    }
  ?>
</header>

<?php
session_start();
if(isset($_SESSION['eposta'])){
  $erab = $_SESSION['deiturak'];
  $epost = $_SESSION['eposta'];
  $mota = $_SESSION['mota'];
  //Ikaslea bada
  if($mota == 2){
      echo "<nav class='main' id='n1' role='navigation'>";
      echo "<span><a href='Layout.php'>Hasiera</a></span>";
      echo "<span><a href='HandlingQuizesAjax.php'>Galderak AJAX</a></span>";
      echo "<span><a href='Credits.php'>Kredituak</a></span>";
      echo "</nav>";
  }

  //Irakaslea bada
  if($mota == 1){
    if(strlen($erab) != 0){
	$email = $epost;
        $curl = curl_init();
        $url = "https://sw.ikasten.io/~T58/Rest/vipusers.php?id=$email";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $str = curl_exec($curl);
        if (strpos($str, 'ZORIONAK') !== false){
            echo "<nav class='main' id='n1' role='navigation'>";
	    echo "<span><a href='Layout.php'>Hasiera</a></span>";
	    echo "<span><a href='HandlingQuizesAjax.php'>Galderak AJAX</a></span>";
	    echo "<span><a href='IsVip.php'>VIPa da?</a></span>";
	    echo "<span><a href='AddVip.php'>Gehitu VIPa</a></span>";
	    echo "<span><a href='DeleteVip.php'>Ezabatu VIPa</a></span>";
	    echo "<span><a href='ShowVips.php'>Zerrendatu VIPak</a></span>";
	    echo "<span><a href='Credits.php'>Kredituak</a></span>";
	    echo "</nav>";
        }else{
	    echo "<nav class='main' id='n1' role='navigation'>";
	    echo "<span><a href='Layout.php'>Hasiera</a></span>";
	    echo "<span><a href='HandlingQuizesAjax.php'>Galderak AJAX</a></span>";
	    echo "<span><a href='AddVip.php'>Gehitu VIPa</a></span>";
	    echo "<span><a href='Credits.php'>Kredituak</a></span>";
	    echo "</nav>";
	}
    }
  }
  
  if($mota == 3){
    echo "<nav class='main' id='n1' role='navigation'>";
    echo "<span><a href='Layout.php'>Hasiera</a></span>";
    echo "<span><a href='Credits.php'>Kredituak</a></span>";
    echo "<span><a href='HandlingAccounts.php'>Kudeatu erabiltzaileak</a></span>";
  echo "</nav>";
  }
}else{
  echo "<nav class='main' id='n1' role='navigation'>";
  echo "<span><a href='Layout.php'>Hasiera</a></span>";
  echo "<span><a href='Credits.php'>Kredituak</a></span>";
  echo "</nav>";
}
?>
