

          /*CONTROL DEL HEADER*/
        var scroll_start = 0;
        var startchange = $('main');
        var offset = startchange.offset();
        if (startchange.length){
            $(document).scroll(function() { 
                scroll_start = $(this).scrollTop();
                if(scroll_start > offset.top){
                    $(".cartas-minijuegos").show( "slide", 1000 );
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
        };


        function modoAltoContraste(){


            $('#mode').prop('checked', false);
     
            $(".navbar").addClass("body-oscuro");
            $(".container-fluid").addClass("body-oscuro");
            $(".page-footer").addClass("body-oscuro");
            $(".list-group-item").addClass("body-oscuro");
            $(".leer-mas").addClass("link-black");
            $("#descarga").addClass("btn-oscuro");
            $(".card").addClass("color-black");
            $("footer a").addClass("link-yellow");
            $('.nav-link').addClass("nav-link-oscuro");
            $(".Name-font1").addClass("color-yellow");
            $(".breadcrumb").addClass("body-oscuro");
            $("body").addClass("body-oscuro");
            $(".breadcrumb a").addClass("link-yellow");
            $(".links").addClass("link-yellow-underline");

            $('#top-icon').attr("src","./imagenes/top-yellow.png");
            $('#unity').attr("src","./imagenes/unity2.png");
            
           

            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            
            $(".navbar").removeClass("body-oscuro");
            $(".container-fluid").removeClass("body-oscuro");
            $(".page-footer").removeClass("body-oscuro");
            $(".list-group-item").removeClass("body-oscuro");
            $(".leer-mas").removeClass("link-black");
            $("#descarga").removeClass("btn-oscuro");
            $(".card").removeClass("color-black");
            $("footer a").removeClass("link-yellow");
            $('.nav-link').removeClass("nav-link-oscuro");
            $(".Name-font1").removeClass("color-yellow");
            $(".breadcrumb").removeClass("body-oscuro");
            $("body").removeClass("body-oscuro");
            $(".breadcrumb a").removeClass("link-yellow");
            $(".links").removeClass("link-yellow-underline");

            
            $('#top-icon').attr("src","./imagenes/top.png");
            $('#unity').attr("src","./imagenes/unity.png");


            $('#mode').prop('checked', true);


            removeCookie("accesibility");
        }
