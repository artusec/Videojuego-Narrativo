
<script>

        $( document ).ready(function() {
            if (detectCookie("accesibility")){
            modoAltoContraste();
        }
        else{
            modoNormal();
        }
        });


        function modoAltoContraste(){

            //Poner el menu a contraste alto
            $(".nav").css({"background-color": "black"});
            $("a").css({"color": "yellow"});
        

            //Poner ela pagina a alto contraste 
            $(".container-fluid").css({"background-color": "black","color":"yellow"});
            $(".leer-mas").css({"color": "yellow"});
            $("#descarga").css({"color": "white"});

            //Poner el footer a alto contraste 
            $(".page-footer").css({"background-color": "black","color":"yellow"});
            $(".list-group-item").css({"background-color": "black","color":"yellow"});

            $('#mode').prop('checked', false);
        
            $('.nav-link').css({"background-color": "black"})

            $('.nav-link').hover(function(){
                $(this).css({"background-color": "dimgray"});
            }, function(){
                $(this).css({"background-color": "black"});
            });

            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            //Volver a modo normal 
            $(".nav").css({"background-color": "#591D77"});
            $("a").css({"color": "#F2F1EF"});
            $("#descarga").css({"color": "#fefefe"});

            $(".container-fluid").css({"background-color": "#9932CC","color":"#fefefe"});

            $(".page-footer").css({"background-color": "#591D77","color":"#fefefe"});
            $(".list-group-item").css({"background-color": "#9932CC","color":"#fefefe"});

            $('.nav-link').css({"background-color": "#591D77"})

            $(".leer-mas").css({"color": "#9932CC"});

            $("#reg").css({"color": "black"});
            $("#a-login").css({"color": "black"});

            $('.nav-link').hover(function(){
                $(this).css({"background-color": "#9932CC"});
            }, function(){
                $(this).css({"background-color": "#591D77"});
            });

            $('#mode').prop('checked', true);


            removeCookie("accesibility");
        }

  

        function increaseSize(){
           var size = $("*").css('font-size');
           currentSize = parseFloat(size);
           newFontSize = (currentSize + 10) + 'px';
           console.log(newFontSize);
           $("*").css({"font-size":newFontSize})
        }

        function decreaseSize(){
             var size = $("*").css('font-size');
             currentSize = parseFloat(size);
             newFontSize = (currentSize - 10) + 'px';
             console.log(newFontSize);
             $("*").css({"font-size":newFontSize})

        }

        $('#mode').change(function() {
                    if(this.checked) { 
                        console.log("change");
                        modoNormal();
                    }
                    else{
                        modoAltoContraste();
                    }
                });

</script>