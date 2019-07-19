<?php 
	/**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: geolocalizacion
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */
	// $site = check_current_site();
  $coord = "15.7226319, -91.35608,8";
	$depn = "Departamento";
	$munn = "Municipio";
?>
<style type="text/css">
  #myMap {
    width: 100%;
    height: 400px;
    overflow: hidden;
}
</style>
<script type="text/javascript">
	var base = window.location.origin+"/petronas";
	var tema    = "/wp-content/themes/twentyseventeen/localizacion";
	var baseurl = base + tema;

// var site    = "<?php echo $site; ?>";
var coord    = "<?php echo $coord; ?>";
function listar_categorias() {  
  var pais = $("#pais").val();  
  jQuery.ajax({
        url: baseurl+"/controlador/get_categorias.php",
        type: 'POST',
        data: {pais :pais , tipo : 1},
        context: document.body, 
        beforeSend:function(){
            
        },
         success:function(result){    
            $('#municipios').html("");  
            $('#departamentos').html(""); 
            $('#categoria').html(result);  
        },
      });
}
function listar_departamentos() {  
  var pais = $("#pais").val();
  // var categoria = $("#categoria").val();  
  jQuery.ajax({
        url: baseurl+"/controlador/get_departamentos.php",
        type: 'POST',
        // data: {pais :pais , categoria :categoria, tipo : 1},
        data: {pais :pais , tipo : 1},
        context: document.body, 
        beforeSend:function(){
            
        },
         success:function(result){    
            $('#municipios').html("");  
            $('#departamentos').html(result);  
        },
      });
}

function listar_municipios() {  
  var pais = $("#pais").val();
  // var categoria = $("#categoria").val();  
  var departamento = $("#departamentos").val();  
  
  jQuery.ajax({
        url: baseurl+"/controlador/get_municipios.php",
        type: 'POST',
        // data: {pais :pais , categoria :categoria, departamento:departamento, tipo:1},
        data: {pais :pais , departamento:departamento, tipo:1},
        context: document.body, 
        beforeSend:function(){
            
        },
         success:function(result){          
          
            $('#municipios').html(result);  
        },
      });
}

  var gmarkers = [];
  var map="";
  var prev_infowindow =false; 
  function googleMap() {
  // Targeting Map Div
  var mapCanvas = document.getElementById('myMap');

  // Map Region Latitude and Longitude 
  var commaPos = coord.indexOf(',');
  var coordinatesLat = parseFloat(coord.substring(0, commaPos));
  var coordinatesLong = parseFloat(coord.substring(commaPos + 1, coord.length));

  var latLng = new google.maps.LatLng(coordinatesLat, coordinatesLong); 

// Map General Options
var mapOptions = {    
  center: latLng,
  zoom: 5,      
  mapTypeId: google.maps.MapTypeId.ROADMAP,    
  backgroundColor:"#2C2C2C",
  disableDefaultUI:true,
  zoomControl: true,
}

  // Creating the Custom Google Map
   map = new google.maps.Map(mapCanvas, mapOptions);

var latub   = $('#posicionlatitud').val();
var longub  = $('#posicionlongitud').val();
console.log('latitud: '+latub);
console.log('longitud: '+longub);
jQuery.get(base+"/wp-content/themes/twentyseventeen/localizacion/controlador/get_mapa.php?tipo=1&latub="+latub+"&longub="+longub+"", function (xml) {
  
        $(xml).find("marker").each(function () { /*loop*/
           
           var lat = $(this).attr('lat');
           var lng = $(this).attr('lng');
           var title = $(this).attr('nombre');
           var direccion = $(this).attr('direccion');
           var webpage = $(this).attr('telefono');
           var city=  $(this).attr('municipio');
           var dep =  $(this).attr('departamento');
           var pais =  $(this).attr('pais');
           var t = $(this).attr('categoria');
           var content =  "<p><strong>"+title+"</strong></p><p>"+direccion+"</p><p>Teléfono: "+webpage+"</p><p>"+city+"</p>";
           var base    = window.location.origin+"/petronas/";
           var icon=base+gettype(t);           
           var id = $(this).attr('id');           
           var infoWindow = new google.maps.InfoWindow({
           content: content
           });
      
           var marcador = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            map: map,
            title: title,
            icon: icon
            })
           var infowindow = new google.maps.InfoWindow();
           marcador.mycategory = t;
           marcador.departamento = dep;
           marcador.pais = pais;
           marcador.webpage = webpage;
           marcador.content= content;
           marcador.city=city;
           marcador.lat=lat;
           marcador.lng=lng;
           gmarkers.push(marcador);
           
            google.maps.event.addListener(marcador, 'click', (function(marcador,content) {
              return function() {
                if( prev_infowindow ) {
                  prev_infowindow.close();
                }
                var adminhtml="";
                 /*if (admin==true){
                  adminhtml=" <br> <a href='/admin-mapa?id="+id+"'> Editar </a>";

                  } */ 
                infowindow.setContent(content+adminhtml);
                /*var html = mostrarinfo(title,icon,webpage);
                document.getElementById("informacion").innerHTML=html;*/
                prev_infowindow = infowindow;
                 if (t !=4) {
                  infowindow.open(map, marcador);
                 }
                
              }
            })(marcador, content));


        });/** end loop*/
         
        }); 

}
google.maps.event.addDomListener(window, 'load', googleMap);


function gettype(num){
  var icono="wp-content/themes/twentyseventeen/localizacion/images/repuestosp.png";
  if (num==1){
  var icono="wp-content/themes/twentyseventeen/localizacion/images/distribuidoresp.png";
  }else if (num==2){
    var icono="wp-content/themes/twentyseventeen/localizacion/images/talleresp.png";
  }else if (num==4) {
    var icono="wp-content/themes/twentyseventeen/localizacion/images/ubicacionusuario.png";
  }
  return icono;
}

function gettypestring(num){
  
  if (num==1){
  var icono="Bar Restaurant";
  }else if (num==2){
    var icono="Retailer";
  }else if (num==3){
    var icono="Wholesale";
  }
  return icono;
}

function buscar(){

  if ($(".category:checked").length != 0){

  }
}

function actualizar_mapa(){

  // if ($("#categoria").val() != "") {
  //   boxclick($("#categoria").val());      
  // }else{
  //   boxclick(-1);
  // }

  // if ($("#departamentos").val() != "") {
  //   filtrardepartamento($("#departamentos").val());     
  // }

  // if ($("#municipios").val() != "") {
  //   filtrarmunicipios($("#municipios").val());      
  // }

  console.log('entro');
  if ($("#municipios").val() != "" && $("#municipios").val() != 0 && $("#municipios").val() != null) {
    filtrarmunicipios($("#municipios").val());     
    console.log('municipio'); 
  }else if ($("#departamentos").val() != "" && $("#departamentos").val() != 0 && $("#departamentos").val() != null) {
    filtrardepartamento($("#departamentos").val());
    console.log('departamento');
  // }else if ($("#categoria").val() != "" && $("#categoria").val() != 0 && $("#categoria").val() != null) {
  //   filtrarcategoria($("#categoria").val(), $("#pais").val() );
  //   console.log('categoria');
  }else if ($("#pais").val() != "" && $("#pais").val() != 0 && $("#pais").val() != null) {
     filtrarporpais($("#pais").val());
     console.log('pais');
  }else{
    boxclick(-1);
    console.log('else');
  }
  

}
 function show(category) {
 
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == category || category == -1) {
            gmarkers[i].setVisible(true);
          }
        }

        
          showlist(category);
       
        // == check the checkbox ==
       // document.getElementById(category+"box").checked = true;
      }

      function filtrarporpais(pais) {
        lat = 0;
        lon = 0;
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].pais == pais ||  gmarkers[i].pais == 'miubicacion') {
            if (lat == 0) {
              lat = gmarkers[i].lat;
            }
            if (lon == 0) {
              lon = gmarkers[i].lng
            }
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
        ZoomAndCenterdos(lat, lon, 7);
      }

      function filtrarcategoria(categoria, pais) {
        lat = 0;
        lon = 0;
        for (var i=0; i<gmarkers.length; i++) {
          if ((gmarkers[i].mycategory == categoria && gmarkers[i].pais == pais) ||  gmarkers[i].mycategory == 4) {
            if (lat == 0) {
              lat = gmarkers[i].lat;
            }
            if (lon == 0) {
              lon = gmarkers[i].lng
            }
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
        ZoomAndCenterdos(lat, lon, 7);
      }

       function filtrardepartamento(departamento) {
        lat = 0;
        lon = 0;
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].departamento == departamento ||  gmarkers[i].departamento == 'miubicacion') {
            if (lat == 0) {
              lat = gmarkers[i].lat;
            }
            if (lon == 0) {
              lon = gmarkers[i].lng
            }
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
        ZoomAndCenterdos(lat, lon, 8);
      }

       function filtrarmunicipios(municipios) {
        lat = 0;
        lon = 0;
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].city == municipios ||  gmarkers[i].city == 'miubicacion' ) {
            if (lat == 0) {
              lat = gmarkers[i].lat;
            }
            if (lon == 0) {
              lon = gmarkers[i].lng
            }
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
        ZoomAndCenterdos(lat, lon, 12);
      }

      // == hides all markers of a particular category, and ensures the checkbox is cleared ==
      function hide(category) {
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == category) {
            gmarkers[i].setVisible(false);
          }
        }
        // == clear the checkbox ==
       // document.getElementById(category+"box").checked = false;
        //// == close the info window, in case its open on a marker that we just hid
        //infowindow.close();
      }

      // == a checkbox has been clicked ==
      function boxclick(category) {        
         for (i=1;i<=3;i++){
          hide(i);
         }
          show(category);     
      }


      function showlist(c,city){
        var html="<div id='list'>";
         for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == c && gmarkers[i].city == city) {
            html+="<div class='item'>";
            var img = gettype(c);
           
            
            html+="<div class='col2'>"+ gmarkers[i].title+"<br>"+gmarkers[i].content+ " <br> <a href='"+ gmarkers[i].webpage+"' > "+gmarkers[i].webpage+" </a> </div>" ;
           // html+="<div class='col2'><a href='"+ gmarkers[i].webpage+"' > "+gmarkers[i].webpage+" </a> </div>" ;
            html+="</div>";
          }

          
        }
       $("#informacion").html(html);

        
      }
      
        function mostrarinfo(title,icon,webpage){
            html="<div class='item'>";            

            html+="<div class='col2'>"+ title+" <br> <a href='"+ webpage+"' > "+webpage+" </a>  </div>" ;
            //html+="<div class='col2'><a href='"+ webpage+"' > "+webpage+" </a> </div>" ;
            html+="</div>";

            return html;
      }
      
      function abrirmarcador(i){
  google.maps.event.trigger(gmarkers[i],"click");
      $('html,body').animate({
        scrollTop: $("#contentArea").offset().top
    }, 2000);
      
      
      }
      
      function searchmap(){
var city= $("#city").val();
var categories = $("#categoriess").val();
  for (var i=0; i<gmarkers.length; i++) {
            gmarkers[i].setVisible(false);
          
        }
        
        cont=0;
  for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == categories && gmarkers[i].city == city) {
            gmarkers[i].setVisible(true);
            if (cont==0){
            var latLng = new google.maps.LatLng(gmarkers[i].lat,gmarkers[i].lng); 
             map.setZoom(8);
            map.setCenter(latLng);

        cont=cont+1;
            }
         
          }
        }

showlist(categories,city);
      }
      
  function ZoomAndCenter() {
        var latub   = $('#posicionlatitud').val();
        var longub  = $('#posicionlongitud').val();
        map.setCenter(new google.maps.LatLng(latub, longub));
        map.setZoom(15);
      }
  function ZoomAndCenterdos(lat, lon, zoom) {
    map.setCenter(new google.maps.LatLng(lat, lon));
    map.setZoom(zoom);
  }
</script>
<div class="formulario-2">
<div class="">
<p><label for="pais">País<br>
  <span class="wpcf7-form-control-wrap todos">
    <!-- <select onchange="listar_categorias()" name="pais" id="pais" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false"> -->
      <select onchange="listar_departamentos()" name="pais" id="pais" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">
      <option value="">Seleccione una opción</option>
      <!-- <option value="1">Costa Rica</option>
      <option value="2">El Salvador</option>   -->      
      <option value="3">Guatemala</option>
      <option value="4">Honduras</option>
      <!-- <option value="5">Nicaragua</option> -->
    </select></span> </label>
</p>
</div>
<!-- <div class="">
<p><label for="categoria">Categoría<br>
  <span class="wpcf7-form-control-wrap todos">
    <select onchange="listar_departamentos()" name="categoria" id="categoria" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">
      <!- - <option value="">Seleccione una opción</option>
      <option value="1">Distribuidores</option>
      <option value="2">Centros de servicio</option>        
      <option value="3">Venta de repuestos</option> - ->
    </select></span> </label>
</p></div> -->
<div class="">
<p><label for="departamentos"><?php echo $depn; ?><br>
    <span class="wpcf7-form-control-wrap todos">
      <select onchange="listar_municipios()" name="departamentos" id="departamentos" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">
      </select>
    </span> 
  </label>
</p></div>
<div class="">
<p><label for="municipios"><?php echo $munn; ?><br>
    <span class="wpcf7-form-control-wrap todos">
      <select name="municipios" id="municipios" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">     
      </select></span> </label>
</p></div>

</div>


<div class="cont-btn-ubicanos">

<div class="">
<div class="cont-boton">
<div class="border-btn">
<input type="button" onclick="actualizar_mapa()" value="BUSCAR" class="wpcf7-form-control wpcf7-submit boton-ubica" title="buscar"><span class="ajax-loader"></span>
</div>
</div>
</div>

<div class="">
<div class="cont-boton a5">
<div class="border-btn a2 btn-azul2">
  <a href="javascript:ZoomAndCenter()" class="boton-ubica a1">
    <div class="texto-btn">UBÍCATE</div>
  </a>
</div>
</div>
</div>

</div>


<div id="myMap"></div>