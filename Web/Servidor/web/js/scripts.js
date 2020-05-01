

        
        $( document ).ready(function() {


            if (detectCookie("accesibility")){
            modoAltoContraste();
        }
        else{
            modoNormal();
        }

 
    

        var scroll_start = 0;
        var startchange = $('#donwload-button');
        var offset = startchange.offset();
            if (startchange.length){
        $(document).scroll(function() { 
    
                    scroll_start = $(this).scrollTop();
                    if(scroll_start > offset.top) {

                        /*$("#minijuegos-title").addClass('fade-in-element');
                        $("#minijuegos-title").removeClass('hidden');*/

                        if (detectCookie("accesibility")){
                            $('.navbar').css('background-color', 'black');
                        }
                       else{
                        $(".navbar").css('background-color', '#591D77');
                       }
                    } else {
                        /*$("#minijuegos-title").removeClass('fade-in-element');
                        $("#minijuegos-title").addClass('hidden');*/

                        if (detectCookie("accesibility")){
                            $('.navbar').css('background-color', 'black');
                        }
                       else{
                        $('.navbar').css('background-color', 'transparent');
                       }
                       
                    }
                });
            }
        });


        $('#mode').change(function() {
            if(this.checked) { 
                modoNormal();
            }
            else{
                modoAltoContraste();
            }
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


        function modoAltoContraste(){



            //Poner el menu a contraste alto
            $(".navbar").css({"background-color": "black"});
            $("a").css({"color": "yellow"});
        
            $("#donwload-button").css({"background-color": "yellow","border-color":"yellow"});
            $("#descarga").css({"color": "black"});

            $("#button-red").css({"background-color": "yellow","border-color":"yellow"});
            $("#button-red").css({"color": "black"});

            //Poner ela pagina a alto contraste 
            $(".container-fluid").css({"background-color": "black","color":"yellow"});
            $(".leer-mas").css({"color": "blue"});

            //Poner el footer a alto contraste 
            $(".page-footer").css({"background-color": "black","color":"yellow"});
            $(".list-group-item").css({"background-color": "black","color":"yellow"});

            $('#mode').prop('checked', false);
            $('.table').css({"color":"yellow"});
            $('.table .thead-dark th').css({"color":"yellow"});

            $('#animation1').attr("src","./imagenes/animation2.gif");

            

            $('.nav-link').hover(function(){
                $(this).css({"color": "dimgray"});
            }, function(){
                $(this).css({"color": "yellow"});
            });

            $('.nav-link').focus(function(){
                $(this).css({"color": "dimgray"});
            }, function(){
                $(this).css({"color": "yellow"});
            });

            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            //Volver a modo normal 
            $(".navbar").css({"background-color": "rgba(0, 0, 0, 0.83)"});
            $("a").css({"color": "#F2F1EF"});

            $("#descarga").css({"color": "#fefefe"});
            $("#donwload-button").css({"background-color": "#c82333","border-color":"#bd2130"});
            
            $("#button-red").css({"background-color": "#c82333","border-color":"#bd2130"});
            $("#button-red").css({"color": "#fefefe"});

            $(".container-fluid").css({"background-color": "#9932CC","color":"#fefefe"});

            $(".page-footer").css({"background-color": "#591D77","color":"#fefefe"});
            $(".list-group-item").css({"background-color": "#9932CC","color":"#fefefe"});


            $(".leer-mas").css({"color": "#9932CC"});

            $("#reg").css({"color": "black"});
            $("#a-login").css({"color": "black"});

            $('.table').css({"color":"#fefefe"});
            $('.table .thead-dark th').css({"color":"#fefefe"});

            $('#animation1').attr("src","./imagenes/animation.gif");

            $('.nav-link').hover(function(){
                $(this).css({"color": "#9932CC"});
            }, function(){
                $(this).css({"color": "#fefefe"});
            });

            $('.nav-link').focus(function(){
                $(this).css({"color": "#9932CC"});
            });
            $('.nav-link').focusout(function(){
                $(this).css({"color": "#fefefe"}); 
            });

            $('#mode').prop('checked', true);


            removeCookie("accesibility");
        }

  

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

    