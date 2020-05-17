
$(document).ready(function() {  

    Array.prototype.forEach.call(radios, function(el, i){
        

        var label = el.nextSibling.nextSibling;
        label.addEventListener("click", function(event){
            do_something(label.querySelector('span').textContent);
        });

    });
    $(".rating input").keypress(function(e){
        if((e.keyCode ? e.keyCode : e.which) == 13){
            var puntuacion = $(this).attr('id')[4];
            puntuacion += " Estrellas";
            do_something(puntuacion);
        }
    });
});
function borrar(data,status){
    if( status === "success"){
        if(data !== "error"){
            $('#estrellas').remove();
        }
        else{
            console.log(data);
        }
    }
}