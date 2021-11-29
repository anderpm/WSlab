var xhro = new XMLHttpRequest();

xhro.onreadystatechange= function (){
    if((xhro.readyState == 4)&&(xhro.status==200)){
	
	//document.getElementById("wserakutsi").innerHTML = "WS irakasgaian matrikulatuta dago!";
	document.getElementById("wserakutsi").innerHTML = xhro.responseText;
    }
}


function enrollment(){
    var email = document.signup.eposta.value;
    xhro.open("GET", "../php/ClientVerifyEnrollment.php?email=" + email, true);
    xhro.send(null);
}
