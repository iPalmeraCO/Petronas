<?php	
include("../class/functionsubicate.php");

if (isset($_POST['pais'])){
	$pais = $_POST['pais'];
}

$tipo = 1;
if (isset($_POST['tipo'])){
	$tipo = $_POST['tipo'];
}



$f = new functionsubicate($tipo);		
$categorias = $f->consultar_categorias($pais);

echo "<option value=0>Seleccione ...</option>";
foreach ($categorias as $cat) {	
	$name='';
	if ($cat->categoria == 1) {
			$name = 'Distribuidores';
		}else if ($cat->categoria == 2) {
			$name = 'Centros de servicio';
		}else{
			$name = 'Venta de repuestos';
		}
	echo "<option value='$cat->categoria'> $name </option>";
 }


?>