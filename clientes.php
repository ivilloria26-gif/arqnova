<?php

require "conexion.php";

$sql = "SELECT * FROM clientes";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Bezeroak</title>
</head>
<body>

<a href="index.php">Hasiera</a>
<br><br>

<h1>Bezeroak</h1>

<table border="1">
    <tr>
        <th>Izena</th>
        <th>Emaila</th>
        <th>Telefonoa</th>
    </tr>

    <?php foreach ($resultado as $cliente) { ?>
        <tr>
            <td><?php echo $cliente["nombre"]; ?></td>
            <td><?php echo $cliente["email"]; ?></td>
            <td><?php echo $cliente["telefono"]; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>