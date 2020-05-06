
        function modoAltoContraste(){


            
            $('#mode').prop('checked', false);

            $(".navbar").addClass("body-oscuro");
            $("#button-red").addClass("btn-oscuro");
            $(".container-fluid").addClass("body-oscuro");
            $(".page-footer").addClass("body-oscuro");
            $(".list-group-item").addClass("body-oscuro");
            $('.table').addClass("color-yellow");
            $('th').addClass("color-yellow");
            $('.nav-link').addClass("nav-link-oscuro");
            $(".reg").addClass("link-yellow-underline");
            $("footer a").addClass("link-yellow");

            $('#animation1').attr("src","./imagenes/animation2.gif");


            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            //Volver a modo normal 
  
            $(".navbar").removeClass("body-oscuro");
            $("#button-red").removeClass("btn-oscuro");
            $(".container-fluid").removeClass("body-oscuro");
            $(".page-footer").removeClass("body-oscuro");
            $(".list-group-item").removeClass("body-oscuro");
            $('.table').removeClass("color-yellow");
            $('th').removeClass("color-yellow");
            $('.nav-link').removeClass("nav-link-oscuro");
            $(".reg").removeClass("link-yellow-underline");
            $("footer a").removeClass("link-yellow");

            $('#animation1').attr("src","./imagenes/animation.gif");


            $('#mode').prop('checked', true);


            removeCookie("accesibility");
        }

          

/*CONTROL DEL HEADER*/
var scroll_start = 0;
var startchange = $('footer');
var offset = startchange.offset();
if (startchange.length){
$(document).scroll(function() { 

    scroll_start = $(this).scrollTop();
    if(scroll_start > offset.top) {

       $(".cartas-minijuegos").show( "slide", 1000 );

        if (detectCookie("accesibility")){
            $(".navbar").addClass("body-oscuro");
        }
        else{
            $(".navbar").addClass("navbar-morado-claro");
        }
    } else {

        if (detectCookie("accesibility")){
            $(".navbar").addClass("body-oscuro");
        }
        else{
            $(".navbar").removeClass("navbar-morado-claro");
        }
        
    }
});
    };