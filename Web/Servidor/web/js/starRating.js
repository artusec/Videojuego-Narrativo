
$(document).ready(function() {  

    Array.prototype.forEach.call(radios, function(el, i){
        var label = el.nextSibling.nextSibling;
        label.addEventListener("click", function(event){
            do_something(label.querySelector('span').textContent);
        });
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