
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
        
            $("#donwload-button").css({"background-color": "yellow","border-color":"yellow"});
            $("#descarga").css({"color": "black"});

            //Poner ela pagina a alto contraste 
            $(".container-fluid").css({"background-color": "black","color":"yellow"});
            $(".leer-mas").css({"color": "blue"});

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

            $('.nav-link').focus(function(){
                $(this).css({"background-color": "dimgray"});
            });
            $('.nav-link').focusout(function(){
                $(this).css({"background-color": "black"}); 
            });

            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            //Volver a modo normal 
            $(".nav").css({"background-color": "#591D77"});
            $("a").css({"color": "#F2F1EF"});

            $("#descarga").css({"color": "#fefefe"});
            $("#donwload-button").css({"background-color": "#c82333","border-color":"#bd2130"});
            

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

            $('.nav-link').focus(function(){
                $(this).css({"background-color": "#9932CC"});
            });
            $('.nav-link').focusout(function(){
                $(this).css({"background-color": "#591D77"}); 
            });

            $('#mode').prop('checked', true);


            removeCookie("accesibility");
        }

  

        function increaseSize(){


           var sizeBody = $(".container-fluid").css('font-size');
           currentSize = parseFloat(sizeBody);
           newFontSize = (currentSize + 1) + 'px';
           $("*").css({"font-size":newFontSize});

           $(".Name-font").css({"font-size":"50px"})
           $("h1").css({"font-size":" 2em"})
        }

        function decreaseSize(){
             var size = $("*").css('font-size');
             currentSize = parseFloat(size);
             newFontSize = (currentSize - 1) + 'px';

             $("*").css({"font-size":newFontSize})
            $(".Name-font").css({"font-size":"50px"})
            $("h1").css({"font-size":" 2em"})
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