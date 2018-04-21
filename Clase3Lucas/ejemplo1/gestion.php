<?php
require"clases/estacionamiento.php";
require_once ('clases/vehiculo.php');

$patente=$_POST['patente'];
$accion=$_POST['estacionar'];

if($accion=="ingreso")
{
	$ahora = date("Y-m-d H:i:s");
	$vehiculo = new Vehiculo($patente, $ahora);
	$vehiculo->Estacionar();
}
else
{
	Vehiculo::Sacar($patente);
		//var_dump($datos);
}

header("location:index.php");
?>
