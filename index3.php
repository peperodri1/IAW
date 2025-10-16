<!DOCTYPE html>
<html lang="es">
<head>
    <script>

        function enviar(mail){
            alert("Correo enviado a" + mail);

        }
        
    </script>
    <meta charset="UTF-8">
    <title>Base de datos Marketing clientes</title>
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
        <h1>Base de datos  Marketing</h1>
        <table width="80%">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Nacimiento</th>
                 <th>Enviar Correo</th>
                  
              


            </tr>
            <?php
                $host = "localhost";
                $usuario = "root";
                $clave = "";
                $bd = "marketing";

                $conexion = new mysqli($host, $usuario, $clave, $bd);

                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                $sql = "SELECT * FROM clientes";
                $res = $conexion->query($sql);
                $c=0;
                while ($fila = $res->fetch_array()) {
echo "<tr><td>" . $fila[0] . "</td><td>" . $fila[1] . "</td><td>" . $fila[2] . "</td><td><center><img src='correo.png' width='25' onClick='enviar(\"" . $fila[6] . "\")'></td></tr></center>";
                    $c++;}
               
                
            ?>
        </table>
    </center>
</body>
</html>
