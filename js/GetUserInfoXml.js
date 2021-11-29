$(document).ready(function() {
    
    $("#botoia").click(function () {
        
        $.get('../xml/Users.xml', function(datuak){
            var eposta = $(datuak).find('eposta');
            var telefonoa = $(datuak).find('telefonoa');
            var izena = $(datuak).find('izena');
            var abizena1 = $(datuak).find('abizena1');
            var abizena2 = $(datuak).find('abizena2');
            var badago = false;

            for (var i = 0; i < eposta.length; i++){
                if( ((eposta[i].childNodes[0].nodeValue).localeCompare($('#eposta').val())) == 0){
                    $('#tlf').val(telefonoa[i].childNodes[0].nodeValue);
                    $('#izena').val(izena[i].childNodes[0].nodeValue);
                    $('#abizena').val(abizena1[i].childNodes[0].nodeValue + ' ' + abizena2[i].childNodes[0].nodeValue);
                    badago = true
                }
            }

            if(badago == false){
                $('#tlf').val('');
                $('#izena').val('');
                $('#abizena').val('');
                alert('Eposta hau ez dago UPV/EHUn erregistratua. Arren, beste bat sartu.');
            }

        })
           
    })

});