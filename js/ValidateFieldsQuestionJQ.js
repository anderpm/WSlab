$(document).ready(function(){
    $('#galderenF').submit(function(){
	var eposta = $('#eposta').val();
	var epostaER = /([a-z A-Z]+[0-9]{3}@(ikasle.ehu.)+[eus|es])/;
	var epostaER2 = /([a-z A-Z]+(\.[a-z A-Z]|[a-z A-Z])+@(ehu\.)+[eus|es])/;
	var galdera = $('#galdera').val();
	var zuzen = $('#zuzen').val();
	var oker1 = $('#oker1').val();
	var oker2 = $('#oker2').val();
	var oker3 = $('#oker3').val();
	var zail = $('#zail').val();
	var arloa = $('#arloa').val();
        
	if($.trim(eposta).length == 0){
	    alert('Eposta jarri behar da');
	    return false;
	}
	if(epostaER.test(eposta)){
	    console.log("Eposta onartuta1");
	}
	else if (epostaER2.test(eposta)){
	    console.log("Eposta onartuta2");
	}else{
	    alert("Eposta ondo jarri");
	    return false;
	}		
	    
	


	//Galdera balidatu
	if($.trim(galdera).length == 0){
	    alert('Galdera jarri behar da');
	    return false;
	}
	if($.trim(galdera).length < 10){
	    alert('Galdera gutxienez 10eko luzera izan behar du');
	    return false;
	}
	//Erantzun zuzena balidatu
	if($.trim(zuzen).length == 0){
	    alert('Erantzun zuzena jarri behar da');
	    return false;
	}
	//Erantzun okerra 1 balidatu
	if($.trim(oker1).length == 0){
	    alert('Erantzun okerra jarri behar da');
	    return false;
	}

	//Erantzun okerra 2 balidatu
	if($.trim(oker2).length == 0){
	    alert('Erantzun okerra jarri behar da');
	    return false;
	}
	//Erantzun okerra 3 balidatu
	if($.trim(oker3).length == 0){
	    alert('Erantzun okerra jarri behar da');
	    return false;
	}

	//Zailtasuna balidatu
	if(zail == 0){
	    alert('Zailtasuna jarri behar da');
	    return false;
	}

	//Arloa balidatu
	if($.trim(arloa).length == 0){
	    alert('Arloa jarri behar da');
	    return false;

	}
    });

    $('#clear').click(function(){
	console.log("Datuak garbituta");
	
	var eposta = $('#eposta').val();
	var epostaER = /([a-z A-Z]+[0-9]{3}@(ikasle.ehu.)+[eus|es])/;
	var epostaER2 = /([a-z A-Z]+(\.[a-z A-Z]|[a-z A-Z])+@(ehu\.)+[eus|es])/;
	var galdera = $('#galdera').val();
	var zuzen = $('#zuzen').val();
	var oker1 = $('#oker1').val();
	var oker2 = $('#oker2').val();
	var oker3 = $('#oker3').val();
	var zail = $('#zail').val();
	var arloa = $('#arloa').val();
        


	eposta = "";
	galdera = "";
	zuzen = "";
	oker1 = "";
	oker2 = "";
	oker3 = "";
	zail = "";
	arloa = "";
	

	//irudia kendu
	$('#image').attr('src', '');
	//var file = $('#image').attr('src');
	//alert(file);
	//file = "";
    });
});
