<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $nombre = $_POST["nombre"];

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

$sql = "UPDATE articulos
        SET nombre = ?, precio = ?, stock = ?
        WHERE id = ?";

$stmt = $conexion->prepare($sql);
$stmt->execute([$nombre, $precio, $stock, $id]);

    echo "Artículo actualizado";
}
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Artikulua editatu</title>
</head>
<body>

<h1>Artikulua editatu</h1>

<form method="POST">
<label>Artículo:</label>
<select name="id">
    <?php
    $resultado = $conexion->query("SELECT * FROM articulos");

    foreach ($resultado as $articulo) {
        echo "<option value='" . $articulo["id"] . "'>";
        echo $articulo["nombre"];
        echo "</option>";
    }
    
    ?>
</select><br><br>
<label>Nombre nuevo:</label>
<input type="text" name="nombre"><br><br>

    <label>Prezio berria:</label>
    <input type="number" step="0.01" name="precio"><br><br>

    <label>Stock berria:</label>
    <input type="number" name="stock"><br><br>

    <button type="submit">Eguneratu</button>
</form>

</body>
</html>