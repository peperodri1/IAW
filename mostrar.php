<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <style>
        body {
            font-family: tahoma, verdana;
            background-color: #f4f6f8;
            padding: 40px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px 16px;
            text-align: left;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        th {
            background-color: #00796b;
            color: white;
            font-weight: bold;
        }
    </style>
    
</body>
</html>
<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "marketing";

$conexion = new mysqli($host, $usuario, $clave, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$c = $_GET['codigo'];

if ($c == '') {
    die("No se ha proporcionado un código de cliente.");
}
// ojo esto es nuevo no lo hemos dado en clase, El operador ?? en PHP se llama “null coalescing operator” (operador de fusión de null).  
//Su función es dar un valor por defecto si una variable no está definida o es null.
if ($_GET['borrar']  ?? 0) {
    $sql = "DELETE FROM clientes WHERE ID='$c'";
    $conexion->query($sql);
    $l = mysqli_affected_rows($conexion);

    if ($l == 1) {
        header("Location: index4.php");
        exit;
    } else {
        echo "<center><h1>No se ha podido borrar el registro</h1></center>";
        exit;
    }
}

$sql = "SELECT * FROM clientes WHERE ID='$c'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 0) {
    die("No se encontró ningún cliente con ese ID.");
}

$fila = $resultado->fetch_array();

echo "
<h2><center>Detalles del Cliente</center></h2>
<center>
<table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>CÓDIGO</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>DIRECCIÓN</th>
        <th>CIUDAD</th>
        <th>TELÉFONO</th>
        <th>EMAIL</th>
    </tr>
    <tr>
        <td>{$fila[0]}</td>
        <td>{$fila[1]}</td>
        <td>{$fila[2]}</td>
        <td>{$fila[3]}</td>
        <td>{$fila[4]}</td>
        <td>{$fila[5]}</td>
        <td>{$fila[6]}</td>
    </tr>
</table>
<br>
<a href='index4.php'><button>Volver</button></a>
<a href='?codigo={$fila[0]}&borrar=1' onclick=\"return confirm('¿Seguro que deseas borrar este cliente?');\">
    <button style=\"background-color:red;color:white;\">Borrar</button>
</a>
</center>
";
?>
