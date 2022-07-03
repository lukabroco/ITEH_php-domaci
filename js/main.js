
function validateForm(){
    var naziv = document.forms["unosAuta"]["naziv"].value;
    var cena = document.forms["unosAuta"]["cena"].value;
    var godiste = document.forms["unosAuta"]["godiste"].value;
    if(naziv===""||cena===""||godiste===""){
         alert("Polja ne smeju biti prazna");
         return false;
    }
   
}