
<?php

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];

    $sql = "INSERT INTO estudiantes (nombre, apellido, dni, email)
            VALUES (:nombre, :apellido, :dni, :email)";

    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":nombre" => $nombre,
        ":apellido" => $apellido,
        ":dni" => $dni,
        ":email" => $email
    ]);

    echo "Estudiante registrado correctamente.";
}

?>

<form action="index.php" method="POST">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" maxlength="80" required>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" maxlength="80" required>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" inputmode="numeric" pattern="[0-9]{7,8}" maxlength="8" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" maxlength="254" required>

    <button type="submit">Registrar estudiante</button>

</form>
