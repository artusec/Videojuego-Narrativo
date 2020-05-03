

        
        $(document).ready(function() {

            
            $("#cabecera-logo").show( "drop", {direction: "up"}, 2000 );
            $(".cartas-prop").show( "slide", 1000 );

            if (detectCookie("accesibility")){
            modoAltoContraste();
            }
            else{
                modoNormal();
            }
 
        });



/* CONTROL DE CONTRASTES*/

        $('#mode').change(function() {
            if(this.checked) { 
                modoNormal();
            }
            else{
                modoAltoContraste();
            }});

        
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


/* BOTONES DE TAMAÑO DE TEXTO*/
      

        function increaseSize(){

           var sizeBody = $("#descarga").css('font-size');
            
        
           console.log(sizeBody); 

           switch(sizeBody){
            case '20px':
                sizeBody = 40;
                console.log(sizeBody);
              break;
            case '40px':
                alert("no se puede mas");
              break;
              case '10px':
                sizeBody = 32;
                break;
            default:
          } 
          console.log(sizeBody); 

           $("#descarga").css({"font-size":sizeBody});
    
        }

        function decreaseSize(){
             
            var size = $("#1").css('font-size');
             currentSize = parseFloat(size);
             newFontSize = (currentSize - 1) + 'px';

        }

    
        