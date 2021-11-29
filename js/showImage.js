/*
 * Funtzio honen bidez, igotako irudia hartu eta pantailaratuko da.
 */
document.getElementById('files').onchange = function (){
    var src = URL.createObjectURL(this.files[0])
    document.getElementById('image').src = src;
}
