<?php

require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nombre = trim($_POST["nombre"]);
$precio = $_POST["precio"];
$stock = $_POST["stock"];

if ($nombre == "" || $precio == "" || $stock == "") {
    echo "Bete eremu guztiak";
    exit;
}
    if (!is_numeric($precio) || !is_numeric($stock)) {
    echo "Prezioa eta stocka zenbakiak izan behar dira";
    exit;
}
if ($precio < 0 || $stock < 0) {
    echo "Prezioa eta stocka ezin dira negatiboak izan";
    exit;
}

 $sql = "INSERT INTO articulos (nombre, precio, stock)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->execute([$nombre, $precio, $stock]);

    echo "Artikulua gehitu da";
}
?>  

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Artikulu berria</title>
</head>
<body>
<a href="index.php">Hasiera</a>
<br><br>

<h1>Artikulu berria</h1>

<form method="POST">
    <label>Izena:</label>
    <input type="text" name="nombre"><br><br>

    <label>Prezioa:</label>
    <input type="number" step="0.01" name="precio"><br><br>

    <label>Stocka:</label>
    <input type="number" name="stock"><br><br>

    <button type="submit">Gehitu</button>
</form>

</body>
</html>