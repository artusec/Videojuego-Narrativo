$(document).ready(function() {
    $(".btn-delete-actual").each(function(){
        $(this).click(function(){
            var id = this.id;
            var url = "ajax/borrarPartidaActual.php?id=" + id;
            $.get(url,borrar);
        });
    });

    function borrar(data,status){
        if( status === "success"){
            if(data !== "error"){
                console.log(data);
                $('#'+data+"_partida").remove();
            }
            else{
                console.log(data);
            }
        }
    }
});