<?php

require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

   $sql = "DELETE FROM articulos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$id]);

    echo "Artikulua ezabatu da";
}

$sql = "SELECT * FROM articulos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Artikulua ezabatu</title>
</head>
<body>

<h1>Artikulua ezabatu</h1>

<form method="POST">
    <label>Artikulua:</label>

    <select name="id">
        <?php foreach ($resultado as $articulo) { ?>
            <option value="<?php echo $articulo["id"]; ?>">
                <?php echo $articulo["nombre"]; ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit">Ezabatu</button>
</form>

</body>
</html>