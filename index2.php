<!DOCTYPE html>
<html lang="es">
<head>
    <script>

        function comprar(){
            alert("No esta a la venta");

        }
        function borrar(){
            alert ("No hay existencias")
        }
    </script>
    <meta charset="UTF-8">
    <title>Base de datos Fontaneria</title>
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
</head>
<body>
    <center>
        <h1>Base de datos  Fontaneria</h1>
        <table width="80%">
            <tr>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Stock Minimo</th>
                 <th>Comprar</th>
                  <th>Borrar</th>
              


            </tr>
            <?php
                $host = "localhost";
                $usuario = "root";
                $clave = "";
                $bd = "fontaneria";

                $conexion = new mysqli($host, $usuario, $clave, $bd);

                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                $sql = "SELECT * FROM productos";
                $res = $conexion->query($sql);
                $c=0;
                while ($fila = $res->fetch_array()) {
                    echo "<tr><td>" . $fila[0] . "</td><td>" . $fila[1] . "</td><td>" . $fila[2] ."</td><td><img src='carro.png' width='25' onClick='comprar()'></td><td><img src='borrar.jpg' onClick='borrar()' width='25'></td></tr>";
                    $c++;

}
                echo "hay $c Registros";
                
            
                
            ?>
        </table>
    </center>
</body>
</html>
