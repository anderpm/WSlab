var xhro = new XMLHttpRequest();

xhro.onreadystatechange= function (){
    if((xhro.readyState == 4)&&(xhro.status==200)){
	document.getElementById("taulaErakutsi").innerHTML = xhro.responseText;
    }
}


function datuakEskatu(){
    xhro.open("GET", '../php/JSONtaula.php', true);
    xhro.send(null);
}
