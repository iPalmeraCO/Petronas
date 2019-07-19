<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K58FV69');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="https://fonts.googleapis.com/css?family=Montserrat:700|Mukta:400,700|Roboto+Condensed:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mukta:400,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://i.icomoon.io/public/temp/da1bf3ed40/UntitledProject/style.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script id='chat-24-widget-code' type="text/javascript">
  !function (e) {
    var t = {};
    function n(c) { if (t[c]) return t[c].exports; var o = t[c] = {i: c, l: !1, exports: {}}; return e[c].call(o.exports, o, o.exports, n), o.l = !0, o.exports }
    n.m = e, n.c = t, n.d = function (e, t, c) { n.o(e, t) || Object.defineProperty(e, t, {configurable: !1, enumerable: !0, get: c}) }, n.n = function (e) {
      var t = e && e.__esModule ? function () { return e.default } : function () { return e  };
      return n.d(t, "a", t), t
    }, n.o = function (e, t) { return Object.prototype.hasOwnProperty.call(e, t) }, n.p = "/packs/", n(n.s = 0)
  }([function (e, t) {
    window.chat24WidgetCanRun = 1, window.chat24WidgetCanRun && function () {
      window.chat24ID = "06eca515d876cf6243c0e60a81d70181", window.chat24io_lang = "es";
      var e = "https://livechat.chat2desk.com.mx", t = document.createElement("script");
      t.type = "text/javascript", t.async = !0, fetch(e + "/packs/manifest.json?nocache=" + (new Date()).getTime()).then(function (e) {
        return e.json()
      }).then(function (n) {
        t.src = e + n["widget.js"];
        var c = document.getElementsByTagName("script")[0];
        c ? c.parentNode.insertBefore(t, c) : document.documentElement.firstChild.appendChild(t);
        var o = document.createElement("link");
        o.href = e + n["widget.css"], o.rel = "stylesheet", o.id = "chat-24-io-stylesheet", o.type = "text/css", document.getElementById("chat-24-io-stylesheet") || document.getElementsByTagName("head")[0].appendChild(o)
      })
    }()
  }]);

</script>
<?php wp_head(); ?>
</head>
<script type="text/javascript">
	$( document ).ready(function() {		
		setTimeout(function(){ $('#chat_whatsapp').attr('href',$('#chat-24-icon-2').attr('href')); }, 2500);
		 if (navigator.geolocation) { 
		 	console.log('si');
		 		navigator.geolocation.getCurrentPosition(mostrarPosicion, mostrarErrores, opciones);
		 	} else { 
		 	    console.log('El explorador NO soporta geolocalización'); 
		 	}
	});

	function mostrarPosicion(posicion) {
		    var latitud = posicion.coords.latitude;
		    var longitud = posicion.coords.longitude;
		    var precision = posicion.coords.accuracy;
		    var fecha = new Date(posicion.timestamp);
		    $('#posicion').append("Latitud: " + latitud + "");
		    $('#posicion').append("Longitud:" + longitud + "");
		    $('#posicion').append("Precisión: " + precision + " metros "); 
		    $('#posicion').append("Fecha: " + fecha + "");  
		    $('#posicionlatitud').val(latitud);
		    $('#posicionlongitud').val(longitud);
		}

	 	function mostrarErrores(error) {
	 	    switch (error.code) {
	 	        case error.PERMISSION_DENIED:
	 	            console.log('Permiso denegado por el usuario'); 
	 	            break;
	 	        case error.POSITION_UNAVAILABLE:
	 	            console.log('Posición no disponible');
	 	            break; 
	 	        case error.TIMEOUT:
	 	            console.log('Tiempo de espera agotado');
	 	            break;
	 	        default:
	 	            console.log('Error de Geolocalización desconocido :' + error.code);
	 	    }
	 	}

	 	var opciones = {
	 	    enableHighAccuracy: true,
	 	    timeout: 10000,
	 	    maximumAge: 1000
	 	};
		
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    $( document ).ready(function() {
	    $( "#nameuser" ).keypress(function(event) {
		  return soloLetras(event);
		});
		$( "#teluser" ).keypress(function(event) {
		  return solonumeros(event);
		});
	});
    
</script>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K58FV69"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<style type="text/css">
		#chat-24-inner-container{
			display: none;
		}
	</style>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
<!-- Barra superior -->
	<div class="bg-barra-sup">
		<div class="container alinear separacion">
			
			<div class="alinear none">
				<p style="margin-right: 10px !important;">Correo de contacto:</p>
				<div class="header__content__phone">
				<p>
					<?php
					$correo1 = get_theme_mod('correo1');
					echo $correo1;
					?>
				</p>
				<p>
				<?php
					$correo2 = get_theme_mod('correo2');
					echo $correo2;
					?>
				</p>
				</div>
			</div>

			<div class="alinear">
				<a href="https://www.pli-petronas.com/en/" target="_blank" class="mar-r">
					<div class="petro-global">Petronas Global</div>
				</a>
				<a target="_blank" href="https://www.facebook.com/petronas/" class="b none"><i class="fab fa-facebook-square"></i></a>
				<!-- <a target="_blank" href="https://twitter.com/Petronas" class="b none"><i class="fab fa-twitter-square"></i></a> -->
				<!-- <a target="_blank" href="https://www.linkedin.com/company/petronas" class="b none"><i class="fab fa-linkedin-square"></i></a> -->
				<!-- <a target="_blank" href="#" class="b none"><i class="fab fa-instagram"></i></a> -->
			</div>

		</div>
	</div>

<!-- Menu -->
	
	<div class="container header bg-menu" id="logo">

			<?php the_custom_logo(); ?>	

			<form action="/petronas">
				<div class="alinear">
					<input type="search" id="miBusqueda" name="s">
					<button class="header__button__search"><span class="header__icon__search"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/01/search.png" alt=""></span><span class="header__text__search">Buscar</span></button>
				</div>
			</form>

			<!-- <form action="/Petronas" method="get">
				<div class="alinear">
					<input type="search" id="miBusqueda" name="q">
					<button class="header__button__search"><span class="header__icon__search"><img src="/wp-content/uploads/2019/01/search.png" alt=""></span><span class="header__text__search">Buscar</span></button>
				</div>
			</form> -->


	</div>	

	
	<?php if ( has_nav_menu( 'top' ) ) : ?>

		<div class="alinear menu-back">	

			<div class="navigation-top alinear-menu container">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
			</div>
		</div>

	<?php endif; ?>
	
	</header><!-- #masthead -->

	<!-- BOTONES REDES -->
	<div class="cont-btnsredes">
		<div class="cont-messenger"><a href="http://m.me/PetronasCA/" target="_blank"><img src="https://grupouma.com/petronas/wp-content/uploads/2019/02/Grupo-371.svg" alt=""></a></div>
		<div class="cont-whats"><a id="chat_whatsapp" href="#" target="_blank"><img src="https://grupouma.com/petronas/wp-content/uploads/2019/02/Grupo-372.svg" alt=""></a></div>
	</div>
	<!-- FIN BOTONES REDES -->
	<div id="posicion" style="display: none;"></div>
  	<input type="hidden" name="posicionlatitud" id="posicionlatitud">
  	<input type="hidden" name="posicionlongitud" id="posicionlongitud">
	<div class="site-content-contain">
		<div id="content" class="site-content">