$(document).ready(function() {
    $(".btn-delete").each(function(){
        $(this).click(function(){
            var id = this.id;
            var url = "ajax/borrarPartida.php?id=" + id;
            $.get(url,borrar);
        });
    });

    function borrar(data,status){
        if( status === "success"){
            if(data !== "error"){
                $('#'+data).remove();
            }
            else{
                console.log(data);
            }
        }
    }
});