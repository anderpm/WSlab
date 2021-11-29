//Aldagai honen bidez, eremuren bat akatsa daukanean, ez ditu besteak aztertutko.
var check = true;

/*
 * Funtzio honen bidez, epostaren eremua hutsik dagoen edo posta helbidea 
 * behar den bezala idatzita dagoela begiratuko du.
 */
function validateEposta(){
    var eposta = document.galderenF.eposta.value;
    var ikregex = /([a-z A-Z]+[0-9]{3}@(ikasle.ehu.)+[eus|es])/;
    var irregex = /([a-z A-Z]+(\.[a-z A-Z]|[a-z A-Z])+@(ehu\.)+[eus|es])/;

    if(eposta.length == 0){
	alert("Eposta eremua hutsik!");
	console.log("Eposta eremua hutsik");
	check = false;
    }else{
	if(ikregex.test(eposta)){
	    console.log("Eposta onartuta");
	    check = true;
	}else{
	    if(irregex.test(eposta)){
		console.log("Eposta onartuta");
		check = true;
	    }else{
		alert("Eposta okerra!");
		console.log("Eposta okerra!");
		check = false;
	    }
	}
    }
}

/*
 * Funtzio honen bidez, zailtasun maila zuzen aukeratu dela begiratuko da.
 */
function validateZailtasuna(){
    var zail = document.galderenF.zail.value;
    
    if(zail < 1 && check == true){
	alert("Aukertu zailtasun maila bat!");
	console.log("Zailtasun maila gaizki aukeratua");
	check = false;
    }
}

/*
 * Funtzio honen bidez, galdera idazteko eremua hutsik ez dagoela begiratuko da.
 * Hutsik ez badago, galderak 10 karaktere baino gehiago izan behar ditu.
 */
function validateGaldera(){
    var gal = document.galderenF.galdera.value;

    if(check == true){
	if(gal.length == 0){
	    alert("Galdera eremua bete gabe!");
	    console.log("Galdera eremua bete gabe");
	    check = false;
	}else{ 
	    if(gal.length < 10){
		alert("Galdera motzegia idatzi duzu!");
		console.log("Galdera motza");
		check = false;
	    }
	}
    }
}

/*
 * Funtzio honen bidez, formularioko eremuak behar diren baldintzak betetzen
 * dituen bagiratuko da. 
 */
function validate(){
    //Eposta balidatu
    validateEposta();
    //Galdera balidatu
    validateGaldera();
    
    var zuzen = document.galderenF.zuzen.value;
    var oker1 = document.galderenF.oker1.value;
    var oker2 = document.galderenF.oker2.value;
    var oker3 = document.galderenF.oker3.value;
    var arloa = document.galderenF.arloa.value;
   
    //Erantzun zuzena balidatu
    if(zuzen.length == 0 && check == true){
	alert("Ez duzu erantzun zuzena sartu!");
	console.log("Zuzen eremua hutsik");
	check = false;
    }
    //Erantzun okerra balidatu
    if(oker1.length == 0 && check == true){
	alert("Ez duzu erantzun okerra sartu!");
	console.log("Oker1 eremua hutsik");
	check = false;
    }
    //Erantzun okerra balidatu
    if(oker2.length == 0 && check == true){
	alert("Ez duzu erantzun okerra sartu!");
	console.log("Oker2 eremua hutsik");
	check = false;
    }
    //Erantzun okerra balidatu
    if(oker3.length == 0 && check == true){
	alert("Ez duzu erantzun okerra sartu!");
	console.log("Oker3 eremua hutsik");
	check = false;
    }
    //Zailtasuna balidatu
    validateZailtasuna();
    //Arloa balidatu
    if(arloa.length == 0 && check == true){
	alert("Ez duzu galderaren arlorik sartu!");
	console.log("Arloaren gaia falta da");
	check = false;
    }
    return check;
}

function garbitudena(){
    console.log("Datuak garbituta");

    //ERemu guztiak hustu
    document.galderenF.eposta.value = "";
    document.galderenF.galdera.value = "";
    document.galderenF.zuzen.value = "";
    document.galderenF.oker1.value = "";
    document.galderenF.oker2.value = "";
    document.galderenF.oker3.value = "";
    document.galderenF.zail.value = "";
    document.galderenF.arloa.value = "";

    //irudia kendu
    var file = document.getElementById('image');
    file.src = "";
}
