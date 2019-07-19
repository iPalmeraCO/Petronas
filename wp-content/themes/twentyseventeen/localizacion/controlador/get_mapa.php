<?php	
include("../class/functionsubicate.php");
/*
if (isset($_POST['categoria'])){
	$categoria = $_POST['categoria'];
}
if (isset($_POST['departamento'])){
	$departamento = $_POST['departamento'];
}
if (isset($_POST['municipio'])){
	$municipio = $_POST['municipio'];
}*/
if (isset($_REQUEST['tipo'])){
  $tipo = $_REQUEST['tipo'];
}
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// if (isset($_REQUEST['site'])){
//   $site = $_REQUEST['site'];
// }
if (isset($_REQUEST['latub'])){
  $latub = $_REQUEST['latub'];
}
if (isset($_REQUEST['longub'])){
  $longub = $_REQUEST['longub'];
}

// $f = new functionsubicate($site,$tipo); 
$f = new functionsubicate($tipo);  

//$puntos = $f->get_mapa($categoria,$departamento,$municipio);
$puntos = $f->get_mapafull();
header("Content-type: text/xml");
$node = $dom->createElement("marker");
$newnode = $parnode->appendChild($node); 
$newnode->setAttribute("lat", $latub);
$newnode->setAttribute("lng", $longub);
$newnode->setAttribute("categoria", 4); 
$newnode->setAttribute("pais", 'miubicacion');
$newnode->setAttribute("departamento", 'miubicacion');
$newnode->setAttribute("municipio", 'miubicacion');
foreach ($puntos as $p) {	
  $numpais = 0;
  if ($p->pais == 'Costa Rica'){
    $numpais = 1;
  }else if ($p->pais == 'El Salvador') {
    $numpais = 2;
  }else if ($p->pais == 'Guatemala') {
    $numpais = 3;
  }else if ($p->pais == 'Honduras') {
    $numpais = 4;
  }else{
      $numpais = 5;
  }
  $coor = explode(",", $p->coordenadas);	
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$p->id);
  $newnode->setAttribute("nombre",$p->nombre);
  $newnode->setAttribute("pais", $numpais);
  $newnode->setAttribute("departamento", $p->departamento);
  $newnode->setAttribute("municipio", $p->municipio);
  $newnode->setAttribute("telefono", $p->telefono);
  $newnode->setAttribute("direccion", $p->direccion);
  $newnode->setAttribute("categoria", $p->categoria);  
  $newnode->setAttribute("lat", $coor[0]);
  $newnode->setAttribute("lng", $coor[1]);
  
 }

 echo $dom->saveXML();

?>