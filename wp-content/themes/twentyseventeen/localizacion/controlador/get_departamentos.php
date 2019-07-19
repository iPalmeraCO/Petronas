<?php	
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../class/functionsubicate.php");

if (isset($_POST['categoria'])){
	$categoria = $_POST['categoria'];
}

if (isset($_POST['pais'])){
	$pais = $_POST['pais'];
}
$tipo = 1;
if (isset($_POST['tipo'])){
	$tipo = $_POST['tipo'];
}



$f = new functionsubicate($tipo);		
$departamentos = $f->consultar_departamentos($categoria, $pais);

echo "<option value=0>Seleccione ...</option>";
foreach ($departamentos as $dep) {		
	echo "<option value='$dep->departamento'> $dep->departamento </option>";
 }

?>