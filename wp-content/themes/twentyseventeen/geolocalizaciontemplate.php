<?php
   /**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: geolocalizaciontemplate
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */

   

$site = check_current_site();
$coord = "15.7226319, -91.35608,8";
$depn = "Departamento";
$munn = "Municipio";
switch ($site) {
  case 'guatemala':
    $coord = "15.7226319, -91.35608,8";
    break;
  case 'elsalvador':
    $coord = "13.7483455,-89.4907039,9";
    break;  
   case 'costarica':
    $coord = "9.7939225,-84.2878388";
    $depn = "Provincia";
    $munn = "Cantón";
    break;   
    case 'honduras':
    $coord = "15.2215302,-87.3305247,8";
    break; 
    case 'nicaragua':
    $coord = "12.8665139,-86.1389436,8";
    break; 
}

?>
<style type="text/css">
  #myMap {
    width: 100%;
    height: 400px;
    overflow: hidden;
}
</style>
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

<script type="text/javascript">

var base    = window.location.origin+"/petronas";
var tema    = "/wp-content/themes/twentyseventeen/localizacion";
var baseurl = base + tema;
var site    = "<?php echo $site; ?>";
var coord    = "<?php echo $coord; ?>";
function listar_departamentos() {  
  var categoria = $("#categoria").val();  
  jQuery.ajax({
        url: baseurl+"/controlador/get_departamentos.php",
        type: 'POST',
        data: {categoria :categoria, site : site, tipo : 1},
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
  var categoria = $("#categoria").val();  
  var departamento = $("#departamentos").val();  
  
  jQuery.ajax({
        url: baseurl+"/controlador/get_municipios.php",
        type: 'POST',
        data: {categoria :categoria, departamento:departamento, site:site, tipo:1},
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
  zoom: 8,      
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
jQuery.get(base+"/wp-content/themes/twentyseventeen/localizacion/controlador/get_mapa.php?site="+site+"&tipo=1&latub="+latub+"&longub="+longub+"", function (xml) {
  
        $(xml).find("marker").each(function () { /*loop*/
           
           var lat = $(this).attr('lat');
           var lng = $(this).attr('lng');
           var title = $(this).attr('nombre');
           var direccion = $(this).attr('direccion');
           var webpage = $(this).attr('telefono');
           var city=  $(this).attr('municipio');
           var dep =  $(this).attr('departamento');
           var t = $(this).attr('categoria');
           var content =  "<p><strong>"+title+"</strong></p><p>"+direccion+"</p><p>Teléfono: "+webpage+"</p><p>"+city+"</p>";
           var base    = window.location.origin+"/";
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
/*
map.set('styles', [
{
  "featureType": "landscape",
  "elementType": "geometry.fill",
  "stylers": [
    { "color": "#3b3b3b" }
  ]
},{
  "featureType": "poi",
  "elementType": "geometry.fill",
  "stylers": [
    { "color": "#292929" }
  ]
},{
  "featureType": "poi",
  "elementType": "geometry.stroke",
  "stylers": [
    { "color": "#343434" }
  ]
},{
  "featureType": "transit",
  "elementType": "geometry.fill",
  "stylers": [
    { "color": "#292929" }
  ]
},{
  "featureType": "road",
  "elementType": "geometry",
  "stylers": [
    { "color": "#808080" }
  ]
},{
  "elementType": "labels.text.fill",
  "stylers": [
    { "color": "#9e9e9e" }
  ]
},{
  "elementType": "labels.text.stroke",
  "stylers": [
    { "color": "#1e1e1e" }
  ]
}
]);*/






}
google.maps.event.addDomListener(window, 'load', googleMap);


function gettype(num){
  var icono="wp-content/themes/twentyseventeen/localizacion/images/repuestos.png";
  if (num==1){
  var icono="wp-content/themes/twentyseventeen/localizacion/images/distribuidores.png";
  }else if (num==2){
    var icono="wp-content/themes/twentyseventeen/localizacion/images/talleres.png";
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
  if ($("#categoria").val() != "") {
    boxclick($("#categoria").val());      
  }else{
    boxclick(-1);
  }

  if ($("#departamentos").val() != "") {
    filtrardepartamento($("#departamentos").val());     
  }

  if ($("#municipios").val() != "") {
    filtrarmunicipios($("#municipios").val());      
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

       function filtrardepartamento(departamento) {
 
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].departamento == departamento) {
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
      }

       function filtrarmunicipios(municipios) {
 
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].city == municipios ||  gmarkers[i].city == 'miubicacion' ) {
            gmarkers[i].setVisible(true);
          }else{
            gmarkers[i].setVisible(false);
          }
        }
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
      
  

</script>
<div class="formulario-2">
<div class="">
<p><label>Categoría<br>
    <span class="wpcf7-form-control-wrap todos">
      <select onchange="listar_departamentos()" name="categoria" id="categoria" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">
        <option value="">Seleccione una opción</option>
        <option value="1">Distribuidores</option>
        <option value="2">Centros de servicio</option>        
        <option value="3">Venta de repuestos</option>
      </select></span> </label>
</p></div>
<div class="">
<p><label><?php echo $depn; ?><br>
    <span class="wpcf7-form-control-wrap todos">
      <select onchange="listar_municipios()" name="departamentos" id="departamentos" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">
      </select>
    </span> 
  </label>
</p></div>
<div class="">
<p><label><?php echo $munn; ?><br>
    <span class="wpcf7-form-control-wrap todos">
      <select name="municipios" id="municipios" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required campo-form-2" aria-required="true" aria-invalid="false">     
      </select></span> </label>
</p></div>
<div class="">
<p style="color:#fff">&gt;</p>
<div class="cont-boton">
<div class="border-btn">
<input type="button" onclick="actualizar_mapa()" value="BUSCAR" class="wpcf7-form-control wpcf7-submit boton"><span class="ajax-loader"></span>
</div>
</div>
</div>
</div>

<div id="myMap"></div>



<?php 

  

/*

     $ipaddress = '';
     if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
     else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
     else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
     else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
     else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
     else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
     else
        $ipaddress = 'UNKNOWN';

     $ipaddress;





    $url = 'http://www.geoplugin.net/json.gp?ip='.$ipaddress; 
    $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   $data = curl_exec($ch);
   curl_close($ch);
    $details    =   $data; 
    $v = json_decode($details);
    $mycountry = $v->geoplugin_countryName;
    echo $mycountry;*/

?>