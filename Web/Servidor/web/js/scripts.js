
    
        $(document).ready(function() {

            
            $("#cabecera-logo").show( "drop", {direction: "up"}, 2000 );
            $(".cartas-prop").show( "slide", 1000 );
            $('.modal').modal('show');

        /*CONTROL DEL HEADER*/
        var scroll_start = 0;
        var startchange = $('main');
        var offset = startchange.offset();
        if (startchange.length){
            $(document).scroll(function() { 
                scroll_start = $(this).scrollTop();
                if(scroll_start > offset.top){
                    $("#minijuegos-title").show( "drop", {direction: "up"},1000 );
                    
                    
                    if (detectCookie("accesibility")){
                        $(".navbar").addClass("body-oscuro");
                    }
                    else{
                        $(".navbar").addClass("navbar-morado");
                    }
                }  else{
                    if (detectCookie("accesibility")){
                        $(".navbar").addClass("body-oscuro");
                    }
                    else{
                        $(".navbar").removeClass("navbar-morado");
                    }

                } 
            
            });


            if (detectCookie("accesibility")){
            modoAltoContraste();
            }
            else{
                modoNormal();
            }

         

                $('input:checkbox').keypress(function(e){
                    if((e.keyCode ? e.keyCode : e.which) == 13){
                        $(this).trigger('click');
                    }
                });

            };
/* CONTROL DE CONTRASTES*/

$('#mode').change(function() {
    if(this.checked) { 
        modoNormal();
    }
    else{
        modoAltoContraste();
    }
});

});




        function cambioContraste(){
            if (detectCookie("accesibility")){
                modoNormal();
                $('#icono-cambiante').attr("src","./imagenes/hcontrast.png");
            }
            else{
                modoAltoContraste();
                $('#icono-cambiante').attr("src","./imagenes/ncontrast.png");
            }
        }


    
        