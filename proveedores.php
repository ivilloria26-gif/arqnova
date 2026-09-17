<?php

require "conexion.php";

$sql = "SELECT * FROM proveedores";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Hornitzaileak</title>
</head>
<body>

<h1>Hornitzaileak</h1>

<table border="1">
    <tr>
        <th>Izena</th>
        <th>Emaila</th>
        <th>Telefonoa</th>
    </tr>

    <?php foreach ($resultado as $proveedor) { ?>
        <tr>
            <td><?php echo $proveedor["nombre"]; ?></td>
            <td><?php echo $proveedor["email"]; ?></td>
            <td><?php echo $proveedor["telefono"]; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>