$(document).ready(function(){
    
function getName()
{
    var email = document.getElementById('eposta').value;
    var galdera_kont = 0;
    var nire_gal = 0;
    //alert(email);
     $.ajax({
          type: "GET",
          url: "../json/Questions.json",
          success: function(data){
	    $.each( data.assessmentItems, function( key, val ) {
		    //alert(val.author);
		    if(val.author == email){
			nire_gal = nire_gal + 1;
		    }
		    galdera_kont = galdera_kont + 1;
	    });
	    $('#galderakont').html(nire_gal);
	    $('#galderak').html(galdera_kont);

	    }



     });
}


    

    window.setInterval(getName,  1000);

    //$.getJSON('../json/Questions.json', {tags: "eposta", tagmode: "any", format: "json" }).done(function( datuakJson ){
    //    alert (datuakJson);
    //    $.each( datuakJson.items, function( i, item ) {
    //    if ( strcmp(item, epost) ) {return false;}

    //}
    //});
    //});
});
