<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia a tu servidor si es necesario
$username = "root"; // Cambia al nombre de usuario de tu base de datos
$password = ""; // Cambia a la contraseña de tu base de datos
$dbname = "cambulos"; // Cambia al nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['Apellidos']);
    $identificacion = $conn->real_escape_string($_POST['identificacion']);
    $direccion = $conn->real_escape_string($_POST['direccion']);
    $tipo_evento = $conn->real_escape_string($_POST['tipo_evento']);
    $fecha_hora_llegada = $conn->real_escape_string($_POST['fecha-hora-llegada']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $cant_personas = $conn->real_escape_string($_POST['cant_personas']);

    // Crear la consulta SQL para insertar los datos
    $sql = "INSERT INTO eventos (nombres, apellidos, identificacion, direccion, tipo_evento, fecha_hora_llegada, email, telefono, cant_personas)
            VALUES ('$nombre', '$apellidos', '$identificacion', '$direccion', '$tipo_evento', '$fecha_hora_llegada', '$email', '$telefono', '$cant_personas')";

    // Ejecutar la consulta y verificar si se ha insertado correctamente
    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
