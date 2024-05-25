<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Por lo general, localhost si estás en el mismo servidor
$username = "USUARIO";
$password = "123456";
$database = "formulario"; // Nombre de la base de datos

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $edad = $_POST["Edad"];
    $correo = $_POST["Correo"];
    $contrasena = $_POST["Contrasena"];

    // Query para insertar datos en la tabla "datos"
    $sql = "INSERT INTO datos (Nombre, Apellido, Edad, Correo, Contrasena) VALUES ('$nombre', '$apellido', '$edad', '$correo', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
