$(document).ready(function() {
    
    $("#botoia").click(function () {

        var badago = false;

        var cadena = $.getJSON("../json/Users.json", function (data){
            for (l in data.erabiltzaileak) {
                if( ((data.erabiltzaileak[l].eposta).localeCompare($('#eposta').val())) == 0){
                    $('#tlf').val(data.erabiltzaileak[l].telefonoa);
                    $('#izena').val(data.erabiltzaileak[l].izena);
                    $('#abizena').val(data.erabiltzaileak[l].abizena1 + ' ' + data.erabiltzaileak[l].abizena2);
                    badago = true;
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