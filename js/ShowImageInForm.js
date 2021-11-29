function loadFile(event){
    var file = document.getElementById('image');
    file.src = URL.createObjectURL(event.target.files[0]);
}

function garbituIrudia(){
    var file = document.getElementById('image');
    file.src = "";
}
