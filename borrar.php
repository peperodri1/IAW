<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "marketing";

$conexion = new mysqli($host, $usuario, $clave, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$c = $_GET['codigo'] ?? '';

if ($c == '') {
    die("<center><h2>No se ha recibido ningún código válido.</h2></center>");
}


$sql = "DELETE FROM clientes WHERE ID='$c'";
$conexion->query($sql);


$l = mysqli_affected_rows($conexion);

if ($l == 1) {

    header("Location: index4.php");
    exit;
} else {
    echo "<center><h1>No se ha podido borrar el registro</h1></center>";
}

$conexion->close();
?>
