<?php	
include("../class/functionsubicate.php");

if (isset($_POST['categoria'])){
	$categoria = $_POST['categoria'];
}
if (isset($_POST['departamento'])){
	$departamento = $_POST['departamento'];
}
if (isset($_POST['pais'])){
	$pais = $_POST['pais'];
}
$tipo = 1;
if (isset($_POST['tipo'])){
	$tipo = $_POST['tipo'];
}

$f = new functionsubicate($tipo);		
$municipios = $f->consultar_municipios($categoria,$departamento, $pais);

echo "<option value=0>Seleccione ...</option>";
foreach ($municipios as $mun) {
	print_r($mun)		;
	echo "<option value='$mun->municipio'> $mun->municipio </option>";
 }

?>