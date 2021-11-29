<?php


    $soapclient = new SoapClient('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl');

    if(isset($_GET['email'])){
	$emaitza = $soapclient->egiaztatuE($_GET['email']);
    }//else
	//$emaitza = $soapclient->egiaztatuE("ufernandez027@ikasle.ehu.eus");
	
    if($emaitza == "BAI"){
        echo '<p style="color:green">' . "WS irakasgaian matrikulatuta dago!" . '</p>';
    }else{
        echo '<p style="color:red">' . "Ez dago WS irakasgaian matrikulatuta!" . '</p>';
    }

?>
