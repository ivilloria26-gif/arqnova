<?php

require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    if ($nombre == "" || $email == "" || $telefono == "") {
    echo "Bete eremu guztiak";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Emaila ez da zuzena";
    exit;
}

  $sql = "INSERT INTO proveedores (nombre, email, telefono)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->execute([$nombre, $email, $telefono]);

    echo "Bezeroa gehitu da";
}
?>


<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Hornitzaile berria</title>
</head>
<body>

<a href="index.php">Hasiera</a>
<br><br>
<h1>Hornitzaile berria</h1>

<form method="POST">
    <label>Izena:</label>
    <input type="text" name="nombre"><br><br>

    <label>Emaila:</label>
    <input type="email" name="email"><br><br>

    <label>Telefonoa:</label>
    <input type="text" name="telefono"><br><br>

    <button type="submit">Gehitu</button>
</form>

</body>
</html>