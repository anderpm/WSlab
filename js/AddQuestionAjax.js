$(document).ready(function() {
    
    $("#bidali").click(function () {

        var form = document.getElementById('galderenF');
        data = new FormData(form);

        $.ajax({
            type: "POST",
            cache: false,
            url: "../php/AddQuestionWithImage.php",
            processData: false,
            contentType: false,
            data: data,   
            success: function (datuak) { 
                $("#output").html(datuak);
                var ema = $("#output").html(datuak).text();
                if(ema.includes("Galdera ondo bidali da")){
                    $("#output").html('<p>Galdera ondo jaso da DBan.<br>Galdera ondo jaso da XML fitxategian.<br>Galdera ondo jaso da JSON fitxategian.</p>');
                }else{
                    $("#output").html('<p>Errorea gertatu da.</p>');
                }
            }
        });
        
    })

});
