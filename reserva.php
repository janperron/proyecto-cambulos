<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplaza con tu usuario de base de datos
$password = ""; // Reemplaza con tu contraseña de base de datos
$dbname = "cambulos"; // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$identificacion = $_POST['identificacion'];
$vehiculo = $_POST['vehiculo'];
$placa = $_POST['placa'];
$fechaHoraLlegada = $_POST['fecha-hora-llegada'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$destino = $_POST['destino'];
$cant_personas = $_POST['cant_personas'];
$cantidad_ninos = isset($_POST['cantidad-ninos']) ? htmlspecialchars($_POST['cantidad-ninos']) : NULL;
$rango_edades = isset($_POST['rango-edades']) ? htmlspecialchars($_POST['rango-edades']) : NULL;

// Consulta para insertar los datos en la base de datos
$sql = "INSERT INTO reservas (nombres, apellidos, identificacion, vehiculo, placa, fecha_hora_llegada, email, ciudad, telefono, destino, cant_personas, cantidad_ninos, rango_edades) 
        VALUES ('$nombre', '$apellidos', '$identificacion', '$vehiculo', '$placa', '$fechaHoraLlegada', '$email', '$ciudad', '$telefono', '$destino', '$cant_personas', '$cantidad_ninos', '$rango_edades')";

if ($conn->query($sql) === TRUE) {
    header("Location: inicio.html"); // Redirige automáticamente
    exit(); // Asegúrate de salir del script después de la redirección
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
