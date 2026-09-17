<?php

require "conexion.php";

$sql = "SELECT * FROM articulos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Artikuluak</title>
</head>
<body>

<h1>Artikuluak</h1>

<table border="1">
    <tr>
        <th>Izena</th>
        <th>Prezioa</th>
        <th>Stocka</th>
    </tr>

    <?php foreach ($resultado as $articulo) { ?>
        <tr>
            <td><?php echo $articulo["nombre"]; ?></td>
            <td><?php echo $articulo["precio"]; ?> €</td>
            <td><?php echo $articulo["stock"]; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>